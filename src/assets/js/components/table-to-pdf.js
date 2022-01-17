import jsPDF from "jspdf";
import autoTable from 'jspdf-autotable';
import dompurify from 'dompurify';
import html2canvas from 'html2canvas';
import { scssToJs, colors, styleDef, tableName,  options, addImageExternal, fillCellWithColors, fillCellWithDessin } from '../components/table-to-pdf-helpers.js';

// -----------------------------------------------------------------------------
// Create dataset with corresponding color to fill every cell
// with the matching colors from the table
// -----------------------------------------------------------------------------
window.addEventListener('load',scssToJs);

// -----------------------------------------------------------------------------
// Function for Viewer the PDF
// -----------------------------------------------------------------------------
export function tableToPDFViewer(theGoodTable) {
    const doc = new jsPDF( options );

    const tableName = {
        element: theGoodTable.querySelector('.table--print'),
        title: theGoodTable.querySelector('.table--print-title').innerText.replace(/ /g,'-'),
    }

    const embed = document.querySelector('.container--pdf-viewer embed');

    doc.autoTable({
        html: tableName.element,
        styles: styleDef,

        // Remplir le tableau avec les bonnes couleurs
        didParseCell: function(data) {
            fillCellWithColors(data);
        },

        // Ajouter l'image correspondant au dessin
        // https://codepen.io/someatoms/pen/vLYXWB?editors=1011
        didDrawCell: function(data) {
            fillCellWithDessin(data, doc);
        }
    });

    embed.src = doc.output('datauristring')
}

// -----------------------------------------------------------------------------
// Function to download the PDF
// -----------------------------------------------------------------------------
export function tableToPDF(theGoodTable) {
    const popupContainer = document.querySelector('.popup--download');
    const doc = new jsPDF( options );

    const tableName = {
        root: theGoodTable,
        element: theGoodTable.querySelector('.table--print'),
        title: theGoodTable.querySelector('.table--print-title').innerText.replace(/ /g,'-'),
    }

    let dataDessin, dim;

    doc.autoTable({
        html: tableName.element,
        styles: styleDef,

        // Remplir le tableau avec les bonnes couleurs
        didParseCell: function(data) {
            fillCellWithColors(data);
        },

        // Ajouter l'image correspondant au dessin
        // https://codepen.io/someatoms/pen/vLYXWB?editors=1011
        didDrawCell: function(data, doc) {
            // fillCellWithDessin(data, doc);
            if ( data.cell.raw.id === 'start-dessin' ) {
                dataDessin = data.cell;
                dim = {
                    dessin: {
                        height: dataDessin.height,
                        width: dataDessin.width,
                        x: dataDessin.x,
                        y: dataDessin.y,
                    },
                    img: {
                        container: tableName.element.querySelector('#start-dessin'),
                        src: tableName.element.querySelector('#start-dessin img').src,
                    }
                }

            }
        }
    });

    addImageExternal(dim, doc);
    // EXPORT DU PDF
    // doc.save(`${tableName.title}.pdf`);
    doc.save(`${tableName.title}.pdf`, {returnPromise:true})
        .then( executeAfterSavePDF( popupContainer ) );

    function executeAfterSavePDF( popupContainer ) {
        popupContainer.classList.add('downloaded');
        console.log('PDF is downloaded');
    }
}


