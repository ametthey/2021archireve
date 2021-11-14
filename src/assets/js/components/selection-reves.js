import jsPDF from "jspdf";
import autoTable from 'jspdf-autotable';
import dompurify from 'dompurify';
import html2canvas from 'html2canvas';

// https://github.com/thawkin3/html-to-pdf-demo/blob/master/scripts/pdfExportMethods.js
// https://github.com/parallax/jsPDF
// Ajouter à la pastille le nombre de rêve sélectionné
const home = document.querySelector('.is-home');

// document.addEventListener( 'load', (e) => {
    if ( home ) {
        const elementsSelected = document.querySelectorAll('.button--select-to-download');
        const popup = document.querySelector('.popup--download');
        const closeB = document.querySelector('.popup--download-close-button');
        const pastille = document.querySelector('.button--selected-number');
        const downloadButton = document.querySelector('.button--download');
        const downloadTable = document.querySelector('.container--reve-to-download');
        const tables = downloadTable.querySelectorAll('.reve--to-print');
        const downloadReve = document.querySelector('.download-reve');

        let COUNT = 0;

        if ( elementsSelected && pastille ) {
            const pastilleText = pastille.querySelector('p');


            elementsSelected.forEach( element => {
                const iconText = element.nextElementSibling ;

                const downloadContainer = element.closest('.article-reve--download');
                const headerContainer = downloadContainer.closest('.article-reve--header');
                const reveContainer = headerContainer.closest('.article-reve');
                const reveContainerNumber = reveContainer.dataset.number;

                // Click sur le bouton de téléchargement
                element.addEventListener( 'click', (e) => {
                    const elementTarget = e.currentTarget;

                    element.classList.toggle('-is-selected');
                    iconText.classList.toggle('is-selected');

                    // Incremente le nombre de rêve sélectionné
                    if ( elementTarget.classList.contains('-is-selected') ) {
                        // Mintre la pastille si le nombre est nul
                        pastille.classList.add('is-visible');
                        COUNT++;
                        pastilleText.innerHTML = COUNT;

                        // popup.classList.add('is-visible');
                        const popupVisible = popup.classList.contains('is-visible');

                        // Show table
                        downloadTable.classList.add('clicked');
                        tables.forEach( table => {
                            const tableNumber = table.dataset.number;
                            if ( tableNumber === reveContainerNumber ) {
                                const theGoodTable = table;
                                const theGoodTableTitle = table.querySelector('.table--print-title').innerText.replace(/ /g,'-');
                                theGoodTable.classList.add('selected--table');
                                console.log( theGoodTable );
                                console.log( theGoodTableTitle );

                                const options = {
                                    orientation: 'l',
                                    format: 'a4',
                                    unit: 'px',
                                }

                                const vert = [44, 175, 56];
                                const vertClair = [96, 183, 104];
                                const vertFonce = [14, 104, 22];
                                const rose = [214, 112, 131];
                                const roseClair = [213, 170, 178];
                                const blanc = [255, 255, 255];
                                const noir = [48, 48, 48];
                                const doc = new jsPDF( options );
                                doc.autoTable({
                                    html: theGoodTable.querySelector('.table--print'),
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
                                            // fillColor: vertClair,
                                            textColor: noir,
                                            font: 'times',
                                        },
                                        3: {
                                            halign: 'left',
                                            // fillColor: vertClair,
                                            textColor: noir,
                                            font: 'times',
                                        },
                                    },
                                    margin: { top: 10 },
                                    didParseCell: function(data) {

                                        // TABLE #1
                                        // Modalite du sommeil
                                        if ( data.row.index >= 7 && data.row.index <= 9 && data.column.index === 0 ) {
                                            data.cell.styles.halign = 'right'
                                            data.cell.styles.fontStyle = 'italic'
                                            data.cell.styles.fillColor = roseClair;
                                        }
                                        // Souvenir du reve
                                        if ( data.row.index >= 11 && data.row.index <= 13 && data.column.index === 0 ) {
                                            data.cell.styles.halign = 'right'
                                            data.cell.styles.fontStyle = 'italic'
                                            data.cell.styles.fillColor = roseClair;
                                        }
                                        // WHITE AT THE END - COLUMN 1
                                        if ( data.row.index >= 14 && data.column.index === 0 ) {
                                            data.cell.styles.fillColor = blanc
                                        }
                                        // WHITE AT THE END - COLUMN 2
                                        if ( data.row.index >= 14 && data.column.index === 1 ) {
                                            data.cell.styles.fillColor = blanc
                                        }
                                        // ROSE FONCE MODALITE COLUMN 2
                                        if ( data.row.index === 6 && data.column.index === 1 ) {
                                            data.cell.styles.fillColor = rose
                                        }
                                        // ROSE FONCE SOUVENIR COLUMN 2
                                        if ( data.row.index === 10 && data.column.index === 1 ) {
                                            data.cell.styles.fillColor = rose
                                        }

                                        // DONNE DU COMPTE
                                        if ( data.row.index === 0 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vertFonce
                                            data.cell.styles.fontStyle = 'bold'
                                        }

                                        // PSEUDO AGE GENRE
                                        if ( data.row.index >= 1 && data.row.index <= 3 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vert
                                            data.cell.styles.fontStyle = 'bold'
                                        }
                                        // GENRE CENTRER
                                        if ( data.row.index === 3  && data.column.index === 2 ) {
                                            data.cell.styles.halign = 'center'
                                            data.cell.styles.fontStyle = 'bold'
                                        }

                                        // PHYSIOLOGIE RESSENTI ATTIRANCE
                                        if ( data.row.index >= 4 && data.row.index <= 7 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vertClair
                                            data.cell.styles.halign = 'right'
                                        }

                                        // LANGUE & PAYS D'ENFANCE
                                        if ( data.row.index >= 8 && data.row.index <= 10 && data.column.index === 2 ) {
                                            data.cell.styles.fillColor = vert
                                            data.cell.styles.halign = 'left'
                                            data.cell.styles.fontStyle = 'bold'
                                        }

                                        // MILIEUX
                                        if ( data.row.index === 10 && data.column.index === 2 && data.column.index === 3 ) {
                                            data.cell.styles.fillColor = vert
                                            data.cell.styles.halign = 'center'
                                            data.cell.styles.fontStyle = 'bold'
                                        }

                                        // DATA LANGUE & PAYS & MILIEUX
                                        if ( data.row.index >= 8 && data.row.index <= 10 && data.column.index === 3 ) {
                                            data.cell.styles.fillColor = vertClair
                                            data.cell.styles.halign = 'right'
                                        }
                                        // MILIEUX ORIGINE & ACTUELLE
                                        if ( data.row.index >= 11 && data.row.index <= 12 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vertClair
                                            data.cell.styles.halign = 'right'
                                        }
                                        // RAPPORT AU TRAVAIL
                                        if ( data.row.index === 13 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vert
                                            data.cell.styles.fontStyle = 'bold'
                                        }
                                        // RAPPORT AU TRAVAIL - PATRON - INDEPENDANT
                                        if ( data.row.index >= 14 && data.row.index <= 16 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vertClair
                                            data.cell.styles.halign = 'right'
                                        }
                                        // RELATION A UN PAYSAGE
                                        if ( data.row.index === 17 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vert
                                            data.cell.styles.fontStyle = 'bold'
                                        }
                                        // RELATION A UN PAYSAGE - DATAS
                                        if ( data.row.index >= 18 && data.row.index <= 27 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vertClair
                                            data.cell.styles.halign = 'right'
                                        }
                                        // FOI
                                        if ( data.row.index === 28 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vert
                                            data.cell.styles.fontStyle = 'bold'
                                        }
                                        // FOI - DATA
                                        if ( data.row.index >= 29 && data.row.index <= 30 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vertClair
                                            data.cell.styles.halign = 'right'
                                        }
                                        // RELATION AU SOMMEIL
                                        if ( data.row.index === 31 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vert
                                            data.cell.styles.fontStyle = 'bold'
                                        }
                                        // RELATION AU SOMMEIL - DATA
                                        if ( data.row.index >= 32 && data.row.index <= 33 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vertClair
                                            data.cell.styles.halign = 'right'
                                        }
                                        // RELATION AU REVES
                                        if ( data.row.index === 34 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vert
                                            data.cell.styles.fontStyle = 'bold'
                                        }
                                        // RELATION AU REVES - DATA
                                        if ( data.row.index >= 35 && data.row.index <= 36 && data.column.index >= 2 && data.column.index <= 3 ) {
                                            data.cell.styles.fillColor = vertClair
                                            data.cell.styles.halign = 'right'
                                        }

                                    }
                                });
                                doc.save(`${theGoodTableTitle}.pdf`);
                            }
                        })

                        // Decrement le nombre de rêve sélectionné
                    } else if ( !elementTarget.classList.contains('-is-selected') ){
                        COUNT--;
                        pastilleText.innerHTML = COUNT;

                        // Show table
                        downloadTable.classList.remove('clicked');
                        tables.forEach( table => {
                            const tableNumber = table.dataset.number;
                            if ( tableNumber === reveContainerNumber ) {
                                const theGoodTable = table;
                                theGoodTable.classList.remove('selected--table');
                            }
                        })
                    }

                    // Enleve la pastille si le nombre est nul
                    if ( COUNT === 0 ) {
                        pastille.classList.remove('is-visible');
                        popup.classList.remove('is-visible');
                    }
                });

            });

            // SELECTION DE TOUT LES RÊVES
            const toutSelectionner = document.querySelector('.button--select');
            toutSelectionner.addEventListener( 'click', (e) => {
                const buttonSelectGood = e.currentTarget;

                if ( !buttonSelectGood.classList.contains('-is-selected') ) {
                    // Ajout du nombre de rêve dans la pastille
                    pastilleText.innerHTML = elementsSelected.length;
                    // Ajout de la classe pour rendre le bouton active
                    toutSelectionner.classList.add('-is-selected');
                    // Ajout la classe active a tout les boutons des reves
                    elementsSelected.forEach(element => element.classList.add('-is-selected'));
                    // On met le compteur au nombre de reve
                    COUNT = elementsSelected.length;
                    // Si la pastille n'est plus la
                    if ( !pastille.classList.contains('is-visible') ) {
                        pastille.classList.add('is-visible')
                    }
                } else if ( buttonSelectGood.classList.contains('-is-selected') ) {
                    // Suppreson du nombre de rêve dans la pastille
                    // pastilleText.innerHTML = 0;
                    // Suppression de la classe pour rendre le bouton active
                    toutSelectionner.classList.remove('-is-selected');
                    // suppression la classe active a tout les boutons des reves
                    elementsSelected.forEach(element => element.classList.remove('-is-selected'));
                    // On remet le compteur à zero
                    COUNT = 0;
                    // On vire la pastille
                    if ( pastille.classList.contains('is-visible') ) {
                        pastille.classList.remove('is-visible')
                    }
                }
            });

            closeB.addEventListener( 'click', (e) => {
                if ( popup.classList.contains('is-visible') ) {
                    popup.classList.remove('is-visible');

                    // ENLEVER LA CLASS IS SELECTED DES BOUTONS
                    const selectedElements = Array.from(document.querySelectorAll('.-is-selected'));
                    selectedElements.forEach(selectedElement => {
                        selectedElement.classList.remove('-is-selected');
                    });

                    // REMETTRE LE COMPTEUR A ZERO
                    if ( COUNT !== 0 ) {
                        pastilleText.innerHTML = 0;
                        COUNT = 0;
                        console.log(COUNT);
                    }
                }
            });
        }


    }

// });

