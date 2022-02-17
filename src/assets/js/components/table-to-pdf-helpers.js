// -----------------------------------------------------------------------------
//  Create dataset attributes based on the background-color of
//  Generated Table from the reve
// -----------------------------------------------------------------------------
const colorsSCSS = {
    roseClair: 'rgba(214, 112, 131, 0.2)',
    rose: 'rgba(214, 112, 131, 0.7)',
    roseFonce: 'rgb(214, 112, 131)',
    vertClair: 'rgba(44, 175, 56, 0.2)',
    vert: 'rgba(44, 175, 56, 0.7)',
    vertFonce: 'rgb(44, 175, 56)',
    conco: 'rgb(76, 165, 142)',
}

export function scssToJs() {
    const tables = document.querySelectorAll('.table--print');

    tables.forEach(table => {
        const tds = table.querySelectorAll('td');
        tds.forEach( td => {
            const bgc = getComputedStyle(td);
            const bgcValue = bgc.getPropertyValue('background-color');

            switch( bgcValue ) {
                case colorsSCSS.roseClair:
                    td.dataset.bgc = 'roseClair';
                    break;
                case colorsSCSS.rose:
                    td.dataset.bgc = 'rose';
                    break;
                case colorsSCSS.roseFonce:
                    td.dataset.bgc = 'roseFonce';
                    break;
                case colorsSCSS.vertClair:
                    td.dataset.bgc = 'vertClair';
                    break;
                case colorsSCSS.vert:
                    td.dataset.bgc = 'vert';
                    break;
                case colorsSCSS.vertFonce:
                    td.dataset.bgc = 'vertFonce';
                    break;
                case colorsSCSS.conco:
                    td.dataset.bgc = 'conco';
                    break;
                default:
                    break;
            }
        });
    });
}
// -----------------------------------------------------------------------------
//  TableToPDF helpers functions and storage
// -----------------------------------------------------------------------------

const roseClair = "FFA0B2";
const rose =  "#D67083";
const roseFonce = "#a24157";
const vertClair = "#68e267";
const vert = "#2CAF38";
const vertFonce = "#007e00";
const blanc = "#fcfcfc";
const noir = "#303030";
const bleu = "#256EFF";
const conco = "#2CAF38";
const rec = "#DB5931"


export const colors = {
    roseClair: [255, 160, 178],
    rose: [214, 112, 131],
    roseFonce: [162, 65, 87],
    vertClair: [104,226,103],
    vert: [44, 175, 56],
    vertFonce: [0, 126, 0],
    blanc: [252, 252, 252],
    noir: [48, 48, 48],
    bleu: [37, 110, 255],
    conco: [44, 175, 56],
    rec: [219, 89, 49],
}

// -----------------------------------------------------------------------------
// jsPDF configurations
// -----------------------------------------------------------------------------
export const options = {
    orientation: 'l',
    format: 'a4',
    unit: 'px',
};


export const styleDef = {
    textColor: colors.noir,
    lineColor: colors.noir,
    lineWidth: 1,
}

// -----------------------------------------------------------------------------
//  Download PDF
//  Add the dessin to the corresponding cell
// -----------------------------------------------------------------------------
export function addImageExternal(dim, doc) {
    if ( dim  ) {
        doc.addImage(dim.img.src, 'PNG', dim.dessin.x, dim.dessin.y, dim.dessin.width, dim.dessin.height);
    } else {
    }
}

// -----------------------------------------------------------------------------
//  Fill Cell with corresponding Colors
// -----------------------------------------------------------------------------
export function fillCellWithColors(data) {
    const cellColor = data.cell.raw.dataset.bgc;

    switch( cellColor ) {
        case 'roseClair':
            data.cell.styles.fillColor = colors.roseClair;
            break;
        case 'rose':
            data.cell.styles.fillColor = colors.rose;
            break;
        case 'roseFonce':
            data.cell.styles.fillColor = colors.roseFonce;
            break;
        case 'vertClair':
            data.cell.styles.fillColor = colors.vertClair;
            break;
        case 'vert':
            data.cell.styles.fillColor = colors.vert;
            break;
        case 'vertFonce':
            data.cell.styles.fillColor = colors.vertFonce;
            break;
        case 'conco':
            data.cell.styles.fillColor = colors.conco;
            break;
        default:
            break;
    }
}
// -----------------------------------------------------------------------------
//  Add the dessin to the corresponding cell
// -----------------------------------------------------------------------------
export function fillCellWithDessin(data, doc){
    if ( data.cell.raw.id === 'start-dessin' ) {
        const dataDessin = data.cell;
        const dim = {
            dessin: {
                height: dataDessin.height,
                width: dataDessin.width,
                x: dataDessin.x,
                y: dataDessin.y,
            },
            img: {
                container: document.querySelector('#start-dessin'),
                src: document.querySelector('#start-dessin img').src,
            }
        }

        doc.addImage(dim.img.src, 'PNG', dim.dessin.x, dim.dessin.y, dim.dessin.width, dim.dessin.height);
    }
}
