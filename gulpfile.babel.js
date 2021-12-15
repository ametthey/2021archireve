import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify'
import named from 'vinyl-named'
import browserSync from 'browser-sync';
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';

import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';
import purgecss from 'gulp-purgecss';

const server = browserSync.create();

// create a prod flag (--prod)
const PRODUCTION = yargs.argv.prod;

const path = {
    styles: {
        src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin.scss'],
        dest: 'dist/assets/css'
    },
    scripts: {
        src: ['src/assets/js/main.js' ,'src/assets/js/admin.js', 'src/assets/js/home.js', ],
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

export const serve = (done) => {
    server.init({
        proxy: "2021archireve.yo",
        /*
         * Disable cache via browsersync
         * https://www.udemy.com/course/the-complete-guide-to-building-premium-wordpress-themes/learn/lecture/11636118#questions/9850154
         */
        middleware: function(req, res, next) {
            res.setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
            res.setHeader('Expires', '0');
            res.setHeader('Pragma', 'no-cache');
            next();
        }
    });
    done();
}

export const reload = (done) => {
    server.reload();
    done();
}

// using del, we are cleaning the generated dist folder
export const clean = () => del(['dist']);
/*
 * create a task called css
 */
export const styles = () => {
    // this is the stream, it will locate the scss file
    return gulp.src(path.styles.src)
    // verify in Google Chrome inspector that CSS sourcemap is active
        .pipe(gulpif(!PRODUCTION,sourcemaps.init()))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, postcss([ autoprefixer () ]) ) )
        .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        // .pipe(purgecss({
        //     content: ['*.php', '**/*.php', '**/**/*.php', '**/**/**/*.php' ]
        // }))
        .pipe(gulp.dest(path.styles.dest))
        .pipe(server.stream	());
}

export const images = () => {
    return gulp.src(path.images.src)
        .pipe(gulpif(PRODUCTION, imagemin()))
        .pipe(gulp.dest(path.images.dest));
}

// watch the sass folder for any change and save it
// interval:750
// https://doc.xuwenliang.com/docs/nodejs/2190
export const watch = () => {
    // I will watch the src/assets/scss/blabla files and if any change I'll run the styles task
    gulp.watch('src/assets/scss/**/*.scss',  { interval: 750 }, styles);
    // I will watch the src/assets/js/blabla files and if any change I'll run the styles task
    gulp.watch('src/assets/js/**/*.js',  { interval: 750 }, gulp.series(scripts, reload));
    // I will watch for any change for ALL php files
    gulp.watch('**/*.php',  { interval: 750 }, reload);
    // I will watch the path.images.src and if any changes I'll run the images task
    gulp.watch(path.images.src,  { interval: 750 }, gulp.series(copy, images, reload));
    // I will watch the path.other.src and if any changes I'll run the copy task
    gulp.watch(path.other.src,  { interval: 750 }, gulp.series(copy, reload));
}

export const copy = () => {
    return gulp.src(path.other.src)
        .pipe(gulp.dest(path.other.dest));
}

export const scripts = () => {
    // this will take the scrpts from the source folder
    return gulp.src(path.scripts.src)
        .pipe(named())
        .pipe(webpack({
            module: {
                rules: [
                    {
                        test: /\.m?js$/,
                        exclude: /(node_modules|bower_components)/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: ['@babel/preset-env']
                            }
                        }
                    }
                ]
            },
            output: {
                filename: '[name].js'
            },
            // verify in google chrome inspector that JavaScript sourcemap is active
            devtool: !PRODUCTION ? 'inline-source-map' : false,
            mode: PRODUCTION ? 'production' : 'development' // add this

        }))
        .pipe(gulpif(PRODUCTION, uglify()))
    // this will output all the source scripts and "export" them into the dist/assets/js folder
        .pipe(gulp.dest(path.scripts.dest));
}

export const compress = () => {
    return gulp.src(path.package.src)
        .pipe(replace('_themename', info.name))
        .pipe(zip(`${info.name}.zip`))
        .pipe(gulp.dest(path.package.dest));
}

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), serve, watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));
// bundle for user
export const bundle = gulp.series(build, compress);

// here we configure the gulp dev task as the default one, so gulp dev = gulp
export default dev;
