import jsPDF from "jspdf";
import autoTable from 'jspdf-autotable';
import dompurify from 'dompurify';
import html2canvas from 'html2canvas';

export function tableToPDF(theGoodTable) {

    // COULEURS
    const vert = [44, 175, 56];
    const vertClair = [96, 183, 104];
    const vertFonce = [14, 104, 22];
    const rose = [214, 112, 131];
    const roseClair = [213, 170, 178];
    const blanc = [255, 255, 255];
    const noir = [48, 48, 48];

    // CONFIGURATION
    const options = {
        orientation: 'l',
        format: 'a4',
        unit: 'px',
    };

    const doc = new jsPDF( options );

    // NOM DU PDF
    const theGoodTableElement = theGoodTable.querySelector('.table--print');
    const theGoodTableTitle = theGoodTable.querySelector('.table--print-title').innerText.replace(/ /g,'-');


    doc.autoTable({
        html: theGoodTableElement,
        columnStyles: {
            0: {
                halign: 'left',
                fillColor: rose,
                textColor: noir,
                font: 'times',
                fontStyle: 'bold',
            },
            1: {
                halign: 'left',
                fillColor: roseClair,
                textColor: noir,
                font: 'times',
            },
            2: {
                halign: 'left',
                textColor: noir,
                font: 'times',
            },
            3: {
                halign: 'left',
                textColor: noir,
                font: 'times',
            },
        },
        margin: { top: 10 },
        didParseCell: function(data) {

            // TABLE #1
            // Modalite du sommeil
            if ( data.row.index >= 7 && data.row.index <= 9 && data.column.index === 0 ) {
                data.cell.styles.halign = 'right';
                data.cell.styles.fontStyle = 'italic';
                data.cell.styles.fillColor = roseClair;
            }
            // Souvenir du reve
            if ( data.row.index >= 11 && data.row.index <= 13 && data.column.index === 0 ) {
                data.cell.styles.halign = 'right';
                data.cell.styles.fontStyle = 'italic';
                data.cell.styles.fillColor = roseClair;
            }
            // WHITE AT THE END - COLUMN 1
            if ( data.row.index >= 14 && data.column.index === 0 ) {
                data.cell.styles.fillColor = blanc;
            }
            // WHITE AT THE END - COLUMN 2
            if ( data.row.index >= 14 && data.column.index === 1 ) {
                data.cell.styles.fillColor = blanc;
            }
            // ROSE FONCE MODALITE COLUMN 2
            if ( data.row.index === 6 && data.column.index === 1 ) {
                data.cell.styles.fillColor = rose;
            }
            // ROSE FONCE SOUVENIR COLUMN 2
            if ( data.row.index === 10 && data.column.index === 1 ) {
                data.cell.styles.fillColor = rose;
            }

            // DONNE DU COMPTE
            if ( data.row.index === 0 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vertFonce;
                data.cell.styles.fontStyle = 'bold';
            }

            // PSEUDO AGE GENRE
            if ( data.row.index >= 1 && data.row.index <= 3 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vert;
                data.cell.styles.fontStyle = 'bold';
            }
            // GENRE CENTRER
            if ( data.row.index === 3  && data.column.index === 2 ) {
                data.cell.styles.halign = 'center';
                data.cell.styles.fontStyle = 'bold';
            }

            // PHYSIOLOGIE RESSENTI ATTIRANCE
            if ( data.row.index >= 4 && data.row.index <= 7 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vertClair;
                data.cell.styles.halign = 'right';
            }

            // LANGUE & PAYS D'ENFANCE
            if ( data.row.index >= 8 && data.row.index <= 10 && data.column.index === 2 ) {
                data.cell.styles.fillColor = vert;
                data.cell.styles.halign = 'left';
                data.cell.styles.fontStyle = 'bold';
            }

            // MILIEUX
            if ( data.row.index === 10 && data.column.index === 2 && data.column.index === 3 ) {
                data.cell.styles.fillColor = vert;
                data.cell.styles.halign = 'center';
                data.cell.styles.fontStyle = 'bold';
            }

            // DATA LANGUE & PAYS & MILIEUX
            if ( data.row.index >= 8 && data.row.index <= 10 && data.column.index === 3 ) {
                data.cell.styles.fillColor = vertClair;
                data.cell.styles.halign = 'right';
            }
            // MILIEUX ORIGINE & ACTUELLE
            if ( data.row.index >= 11 && data.row.index <= 12 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vertClair;
                data.cell.styles.halign = 'right';
            }
            // RAPPORT AU TRAVAIL
            if ( data.row.index === 13 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vert;
                data.cell.styles.fontStyle = 'bold';
            }
            // RAPPORT AU TRAVAIL - PATRON - INDEPENDANT
            if ( data.row.index >= 14 && data.row.index <= 16 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vertClair;
                data.cell.styles.halign = 'right';
            }
            // RELATION A UN PAYSAGE
            if ( data.row.index === 17 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vert;
                data.cell.styles.fontStyle = 'bold';
            }
            // RELATION A UN PAYSAGE - DATAS
            if ( data.row.index >= 18 && data.row.index <= 27 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vertClair;
                data.cell.styles.halign = 'right';
            }
            // FOI
            if ( data.row.index === 28 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vert;
                data.cell.styles.fontStyle = 'bold';
            }
            // FOI - DATA
            if ( data.row.index >= 29 && data.row.index <= 30 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vertClair;
                data.cell.styles.halign = 'right';
            }
            // RELATION AU SOMMEIL
            if ( data.row.index === 31 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vert;
                data.cell.styles.fontStyle = 'bold';
            }
            // RELATION AU SOMMEIL - DATA
            if ( data.row.index >= 32 && data.row.index <= 33 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vertClair;
                data.cell.styles.halign = 'right';
            }
            // RELATION AU REVES
            if ( data.row.index === 34 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vert;
                data.cell.styles.fontStyle = 'bold';
            }
            // RELATION AU REVES - DATA
            if ( data.row.index >= 35 && data.row.index <= 36 && data.column.index >= 2 && data.column.index <= 3 ) {
                data.cell.styles.fillColor = vertClair;
                data.cell.styles.halign = 'right';
            }

        }
    });

    // EXPORT DU PDF
    doc.save(`${theGoodTableTitle}.pdf`);

}
