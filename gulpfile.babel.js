import gulp from 'gulp';
import browserSync from 'browser-sync';

import yargs from 'yargs';
import size from 'gulp-size';
import replace from 'gulp-replace';
import notify from 'gulp-notify';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import zip from 'gulp-zip';
import del from 'del';
import named from 'vinyl-named'
import info from './package.json';

// JS
import jshint from 'jshint';
import concat from 'gulp-concat';
import terser from 'gulp-terser';
import webpack from 'webpack-stream';

// POSTCSS
import sass from 'gulp-dart-sass';
import postcss from 'gulp-postcss';

// OPTIMISATION
import imagemin from 'gulp-imagemin';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import advanced from 'cssnano-preset-advanced';
import cleanCSS from 'gulp-clean-css';
import gzip from 'gulp-gzip';

const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

const server = browserSync.create();

// create a prod flag (--prod)
const PRODUCTION = yargs.argv.prod;

const path = {
    styles: {
        src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin.scss'],
        dest: 'dist/assets/css'
    },
    scripts: {
        src: ['src/assets/js/main.js', 'src/assets/js/home.js', 'src/assets/js/edit-reve.js'],
        dest: 'dist/assets/js'
    },
    images: {
        src: 'src/assets/images/**/*.{jpg,jpeg,png,svg,gif,mp4,json}',
        dest: 'dist/assets/images'
    },
    other: {
        src: ['src/assets/**/*', '!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
        dest: 'dist/assets'
    },
    package: {
        src: ['**/*', '!.DS_Store', '!node_modules{,/**}', '!packaged{,/**}', '!src{,/**}', '!.babelrc' , '!gitignore' , '!gulpfile.babel.js' , '!package.json' , '!package-lock.json'],
        dest: 'packaged'
    }
}

export const clean = () => del(['dist']);
export const styles = () => {
    return gulp.src(path.styles.src)
        .pipe(gulpif(!PRODUCTION,sourcemaps.init()))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION,
            postcss([
                autoprefixer ({
                    grid: true,
                    flexbox: true,
                }),
                cssnano ({
                    preset: "advanced",
                }),
            ])
        ))
        .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(size({
            title: 'SASS',
            pretty: true,
            gzip: true,
            showFiles: true,
            showTotal: true,
        }))
        .pipe(gulp.dest(path.styles.dest))
        .pipe(server.stream	());
}
export const scripts = () => {
    // this will take the scrpts from the source folder
    return gulp.src(path.scripts.src)
        .pipe(named())
        .pipe(sourcemaps.init())
        .pipe(webpack({
            module: {
                rules: [
                    {
                        test: /\.js$/,
                        enforce: 'pre',
                        exclude: /(node_modules|bower_components)/,
                        use: [
                            {
                                loader: 'babel-loader',
                                options: {
                                    presets: ['@babel/preset-env'],
                                }
                            },

                        ]
                    }
                ],
            },
            // plugins: PRODUCTION ? false : new BundleAnalyzerPlugin(),
            // plugins: [
            //     new BundleAnalyzerPlugin()
            // ],
            output: {
                filename: '[name].js',
            },
            // verify in google chrome inspector that JavaScript sourcemap is active
            devtool: !PRODUCTION ? 'inline-source-map' : false,
            mode: PRODUCTION ? 'production' : 'development', // add this

        }))
        .pipe(gulpif(PRODUCTION, terser({
            compress: {
                drop_console: true,
            }
        })))
        .pipe(gulpif(PRODUCTION, concat('main.js')))
        .pipe(size({
            title: 'JavaScript',
            pretty: true,
            gzip: true,
            showFiles: true,
            showTotal: true,
        }))
        .pipe(sourcemaps.write({ loadMaps: true }))
        .pipe(gulp.dest(path.scripts.dest));
}
export const images = () => {
    return gulp.src(path.images.src)
        .pipe(gulpif(PRODUCTION, imagemin()))
        .pipe(size({
            title: 'Images',
            pretty: true,
            gzip: true,
            showTotal: true,
        }))
        // .pipe(gulpif(PRODUCTION,
        //     gzip({
        //         append: false,
        // })))
        .pipe(gulp.dest(path.images.dest));
}
export const copy = () => {
    return gulp.src(path.other.src)
        .pipe(gulp.dest(path.other.dest));
}

export const serve = (done) => {
    server.init({
        proxy: "2021archireve.yo",
    });
    done();
}


export const watch = () => {
    // I will watch the src/assets/scss/blabla files and if any change I'll run the styles task
    gulp.watch('src/assets/scss/**/*.scss',  { interval: 750 }, styles);
    // I will watch the src/assets/js/blabla files and if any change I'll run the styles task
    gulp.watch(['src/assets/js/**/*.js', 'gulpfile.babel.js'],  { interval: 750 }, gulp.series(scripts, reload));
    // I will watch for any change for ALL php files
    gulp.watch('**/*.php',  { interval: 750 }, reload);
    // I will watch the path.images.src and if any changes I'll run the images task
    gulp.watch(path.images.src,  { interval: 750 }, gulp.series(copy, images, reload));
    // I will watch the path.other.src and if any changes I'll run the copy task
    gulp.watch(path.other.src,  { interval: 750 }, gulp.series(copy, reload));
}

export const reload = (done) => {
    server.reload();
    done();
}


export const compress = () => {
    return gulp.src(path.package.src)
        .pipe(replace('_themename', info.name))
        .pipe(zip(`${info.name}.zip`))
        .pipe(size({
            title: 'Compress',
            showFiles: true,
            showTotal: true,
        }))
        .pipe(gulp.dest(path.package.dest));
}

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), serve, watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));
export const bundle = gulp.series(build, compress);
export default dev;
