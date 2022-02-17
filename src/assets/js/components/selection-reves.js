import { tableToPDF, tableToPDFViewer } from '../components/table-to-pdf.js';
import { replaceCellsFromTable } from '../components/selection-reves-helpers.js';

const articles = document.querySelectorAll(".article-reve");
const home = document.querySelector('.home');
const loadingAnimationLogo  = document.querySelector('.content--home-logo');
const targetNode = loadingAnimationLogo;

/**********************************************************************
 * Verifier que l'animation d'intro est fini pour charger le script
 **********************************************************************/
if ( home ) {
    const observerOptions = {
        attributes: true,
    }

    const observer = new MutationObserver(callback);
    observer.observe(targetNode, observerOptions);

    function callback(mutationList, observer) {
        mutationList.forEach( (mutation) => {
            switch(mutation.type) {
                case 'attributes':
                    if ( mutation.target.classList.contains('is-hidden') ) {
                        setTimeout( ()=> {
                            selectYourReves(articles);
                        }, 3000 )
                    }
                    break;
            }
        });
    }
}

/**********************************************************************
 * Selection des rêves function
 **********************************************************************/
function selectYourReves( articles ) {

    let COUNT = 0;

    const tables = [...document.querySelectorAll(".reve--to-print.post-type-reve")];

    const tableToAdd = [];


    const telechargerButton = {
        container: document.querySelector('.popup--download'),
        button: document.querySelector('.button--selected-number'),
        buttonText: document.querySelector('.button--selected-number p'),
        buttonDownload: document.querySelector('.button--download'),
        all: document.querySelector('.button--select .button--round'),
        buttonAll: document.querySelector('.button--select'),
        buttonClose: document.querySelector(".popup--download-close-button"),
    }

    articles.forEach( ( article ) => {
        const reve = {
            select: article.querySelector('.button--select-to-download'),
            download: article.querySelector('.article-reve--download'),
            header: article.querySelector('.article-reve--header'),
            title: article.querySelector('.article-reve--header h1'),
            number: article.dataset.number,
        }


        reve.select.addEventListener( "click", (e) => {
            const selectedReve = reve.select.classList.toggle("-is-selected");
            const matchingNumber = tables.find( table => table.dataset.number == reve.number );

            if (reve.select.classList.contains("-is-selected") ) {
                if ( telechargerButton.buttonClose.classList.contains('is-closed') ) {

                    // SI JAMAIS ON A DELA FERMER LA BOITE DE DIALOGUE, ON DOIT REMETTRE LE COMPTEUR A ZERO
                    telechargerButton.buttonClose.classList.remove('is-closed');
                    COUNT = 1;
                    // COUNT++;
                    telechargerButton.buttonText.innerHTML = COUNT;
                    telechargerButton.container.classList.add("is-visible");
                    telechargerButton.button.classList.add("is-visible");

                    const theGoodTable = matchingNumber;
                    theGoodTable.classList.add( "selected--table" );

                    addTableActions(theGoodTable, tableToAdd);
                    allSelected(tableToAdd, telechargerButton);



                } else {

                    // ON SELECTIONNE UN REVE
                    COUNT++;
                    telechargerButton.buttonText.innerHTML = COUNT;
                    telechargerButton.container.classList.add("is-visible");
                    telechargerButton.button.classList.add("is-visible");
                    const theGoodTable = matchingNumber;
                    theGoodTable.classList.add( "selected--table" );

                    addTableActions(theGoodTable, tableToAdd);



                    allSelected(tableToAdd, telechargerButton);
                }

            } else if ( !reve.select.classList.contains("-is-selected") ) {
                COUNT--;
                telechargerButton.buttonText.innerHTML = COUNT;
                const theBadTable = matchingNumber;
                theBadTable.classList.remove("selected--table");

                removeTableActions(theBadTable, tableToAdd);

                allSelected(tableToAdd);


            }
            if ( COUNT === 0 ) {
                telechargerButton.container.classList.remove("is-visible");
                telechargerButton.button.classList.remove("is-visible");
            }

            orderSelection( tableToAdd );
        });


    });

    // TELECHARGER LE OU LES REVES
    telechargerButton.buttonDownload.addEventListener( "click", function(e) {




        DLTableToPDF(tableToAdd);
    }, false );

    // FERMER LA POPUP
    telechargerButton.buttonClose.addEventListener( "click", function(e) {
        closeDownloadPopup(telechargerButton, COUNT, tableToAdd);


    }, false);

    // SELECTIONNER TOUT LES RÊVES
    telechargerButton.all.addEventListener( "click", function(e){
        if ( telechargerButton.all.classList.contains('-is-selected') ) {
            deselectEverything(telechargerButton, articles, COUNT, tables, tableToAdd);
            COUNT = 0;

        } else if ( !telechargerButton.all.classList.contains('-is-selected') ) {
            selectEverything(telechargerButton, articles, COUNT, tables, tableToAdd);


        }
    }, false);

    // SUPPRIMER LA POPUP DE SELECTION APRÈS LE TÉLÉCHARGEMENT D'UN REVE
    removePopupContainerAfterPDFDownload(telechargerButton, COUNT, tableToAdd);
}





/**********************************************************************
 *
 *  HELPERS FUNCTIONS
 *
 **********************************************************************/

function allSelected(tableToAdd, telechargerButton) {
    const total = articles.length;
    const totalSelected = tableToAdd.length;
    const telechargerButtonAllSelected = {
        buttonAll: document.querySelector('.button--select'),
    }

    if ( total === totalSelected ) {

        telechargerButton.buttonAll.classList.add("-is-selected");
    } else if ( total !== totalSelected ) {
        telechargerButtonAllSelected.buttonAll.classList.remove("-is-selected");
    }
}

function DLTableToPDF(tableToAdd) {
    tableToAdd.forEach( ( table ) => (tableToPDF(table) ) );
}

function closeDownloadPopup(telechargerButton, COUNT, tableToAdd) {
    telechargerButton.container.classList.remove("is-visible");
    telechargerButton.buttonClose.classList.add('is-closed');
    const selectedElements = Array.from(document.querySelectorAll(".-is-selected"));
    selectedElements.forEach(selectedElement => {
        selectedElement.classList.remove("-is-selected");
    });

    // On réinitialise tout !
    telechargerButton.buttonText.innerHTML = '';
    COUNT = 0;
    tableToAdd.length = 0;






}

function openPDFViewer() {
    const containerPDFV = document.querySelector('.container--pdf-viewer');
    containerPDFV.classList.add('open');
    PreviewTableToPDF();
}

function closePDFViewer() {
    const containerPDFV = document.querySelector('.container--pdf-viewer');
    containerPDFV.classList.remove('open');
    PreviewTableToPDF();
}

function PreviewTableToPDF() {
    tableToAdd.forEach( ( table ) => (tableToPDFViewer(table) ) );
}


function toggleSelection(telechargerButton, articles, COUNT, tables, tableToAdd) {
    if ( !telechargerButton.all.classList.contains("-is-selected") ) {
        selectEverything(telechargerButton, articles, COUNT, tables, tableToAdd);
    } else {
        deselectEverything(telechargerButton, articles, COUNT, tables, tableToAdd);
    }
}



function selectEverything(telechargerButton, articles, COUNT, tables, tableToAdd) {
    articles.forEach( ( article ) => {
        const reve = {
            select: article.querySelector('.button--select-to-download'),
            download: article.querySelector('.article-reve--download'),
            header: article.querySelector('.article-reve--header'),
            title: article.querySelector('.article-reve--header h1'),
            number: article.dataset.number,
        }

        telechargerButton.buttonText.innerHTML = articles.length;
        telechargerButton.buttonAll.classList.add("-is-selected");
        telechargerButton.all.classList.add("-is-selected");
        reve.select.classList.add("-is-selected");
        reve.download.classList.add("-is-selected");
        COUNT = reve.select.length;
        if ( !telechargerButton.button.classList.contains("is-visible") ) telechargerButton.button.classList.add("is-visible");

    });

    if ( tableToAdd.length === articles.length ) {

    }  else {
        const aTables = Array.from(tables);
        aTables.forEach( table => {
            if ( tableToAdd.includes( table ) ) {

            } else {
                const theMissingTable = table;


                tableToAdd.push(theMissingTable)
            }
        });



    }

}

function deselectEverything(telechargerButton, articles, COUNT, tables, tableToAdd) {
    articles.forEach( ( article ) => {
        const reve = {
            select: article.querySelector('.button--select-to-download'),
            download: article.querySelector('.article-reve--download'),
            header: article.querySelector('.article-reve--header'),
            title: article.querySelector('.article-reve--header h1'),
            number: article.dataset.number,
        }
        telechargerButton.all.classList.remove("-is-selected");
        telechargerButton.buttonAll.classList.remove("-is-selected");
        reve.select.classList.remove("-is-selected");
        reve.download.classList.remove("-is-selected");
        if ( telechargerButton.button.classList.contains("is-visible") ) telechargerButton.button.classList.remove("is-visible");
        tables.forEach( ( table ) => ( table.classList.remove("selected--table")  ));

        // On réinitialise tout !
        COUNT = 0;
        telechargerButton.buttonText.innerHTML = '';
        tableToAdd.length = 0;
        COUNT = 0;

    });
}


function mergeTheTables(tableReve) {
    const pseudoReve = tableReve.querySelector('.table-pseudo').innerText.trim();
    const tablesInfoReveur = document.querySelectorAll('.reve--to-print.post-type-reveur-info');
    let irPseudo, infoReveurKeys, infoReveurValues, same;
    const infoReveurObject = new Object();

    // On cherche la class table-pseudo pour comparer avec le tableau avec le reve
    tablesInfoReveur.forEach( infoReveur => {
        const cellsReveur = infoReveur.querySelectorAll('td');

        // On a trouvé la cellule
        irPseudo = Array.from(cellsReveur).find( cell => cell.classList.contains('table-pseudo') );
        const pseudoReveur = irPseudo.innerText.trim();

        // On les compare
        if ( pseudoReveur === pseudoReve ) {


            //On recupere le tableau avec les informations du rêveur
            const infoReveurCells = infoReveur;

            // On récupere toutes les cellules avec une class et leurs contenus
            const infoReveurCellWithClass = Array.from(infoReveurCells.querySelectorAll('td')).filter( cell => cell.getAttribute('class') );

            // On stocke la class et le contenu de la cellule dans un object
            let content, name ;
            infoReveurCellWithClass.forEach( cell => ( name = cell.getAttribute('class'), content = cell.innerText.trim() , infoReveurObject[`${name}`] = content ));
            infoReveurKeys = Object.keys(infoReveurObject);
            infoReveurValues = Object.values(infoReveurObject);

            // On crééer une fonction pour ajouter les infos
            replaceCellsFromTable(tableReve, infoReveurKeys, infoReveurValues);


        } else {
            // Silence is golden
        }
    });
}

function addTableActions(theGoodTable, tableToAdd) {
    tableToAdd.push( theGoodTable );
    mergeTheTables( theGoodTable );


}

function removeTableActions(theBadTable, tableToAdd) {
    const index = tableToAdd.indexOf( theBadTable );
    if (index > -1) {
        tableToAdd.splice(index, 1);
    }


}

function orderSelection( tableToAdd ) {
    const orderedID = [];
    const orderedSelection = tableToAdd.forEach( table => orderedID.push(table.id) );
    const orderedList = orderedID.join(' & ');

    if ( orderedID.length === 0 ) {

    } else {

    }

}
function removePopupContainerAfterPDFDownload(telechargerButton, COUNT, tableToAdd) {
    const itemsContainer = document.querySelector('.popup--download');
    const containerReves = document.querySelector('#container--reves');

    let options = {
        attributes: true,
        attributeFilter: ['class'],
    }
    let observer = new MutationObserver(mutations => {
        mutations.forEach( mutation => {
            const popup = mutation.target;
            const close = popup.querySelector(".popup--download-close-button");
            const text = popup.querySelector('.button--selected-number p');
            const tables = popup.previousSibling || popup.previousElementSling;
            if( popup.classList.contains('downloaded') ) {
                popup.classList.remove('downloaded');
                popup.classList.add('close--after-download');

                if( popup.classList.contains('close--after-download') ) {
                    popup.classList.remove("is-visible");
                    close.classList.add('is-closed');
                    const selectedElements = Array.from(document.querySelectorAll(".-is-selected"));
                    selectedElements.forEach(selectedElement => {
                        selectedElement.classList.remove("-is-selected");
                    });
                    text.innerHTML = '';


                    COUNT = 0;
                    tableToAdd.length = 0;

                }

            }
        });
    });

    observer.observe(itemsContainer, options);
}
