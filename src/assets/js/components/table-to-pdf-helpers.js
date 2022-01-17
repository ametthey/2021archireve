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

function componentToHex(c) {
    var hex = c.toString(16);
    return hex.length == 1 ? "0" + hex : hex;
}

function rgbToHex(r, g, b) {
    return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
}

function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

const colorsHexa =
    {
        "roseClair":"#efa0af",
        "rose":"#d67083",
        "roseFonce":"#9e5260",
        "vertClair":"#60b768",
        "vert":"#2caf38",
        "vertFonce":"#269530",
        "blanc":"#ffffff",
        "noir":"#0a0a0a",
        "bleu":"#256eff",
        "conco":"#2CAF38",
        "rec":"#DB5931"
    }



export const colors = {
    roseClair: [255, 227, 234],
    rose: [215, 133, 146],
    roseFonce: [158, 82, 96],
    vertClair: [218, 249, 217],
    vert: [44, 175, 56],
    vertFonce: [80, 123, 82],
    blanc: [255, 255, 255],
    noir: [10, 10, 10],
    bleu: [37, 110, 255],
    conco: [76, 165, 142],
    rec: [219, 218, 80],
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
    doc.addImage(dim.img.src, 'PNG', dim.dessin.x, dim.dessin.y, dim.dessin.width, dim.dessin.height);
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
