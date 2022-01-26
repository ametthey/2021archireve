import { tableToPDF, tableToPDFViewer } from '../components/table-to-pdf.js';
import { replaceCellsFromTable } from '../components/selection-reves-helpers.js';

const articles = document.querySelectorAll(".article-reve");
const home = document.querySelector('.home');
const loadingAnimationLogo  = document.querySelector('.content--home-logo');
const targetNode = loadingAnimationLogo;

/**********************************************************************
 * Verifier que l'animation d'intro est fini pour charger le script
 **********************************************************************/
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
                    // console.log('is-hidden for selection-reve');
                    selectYourReves(articles);
                }
                break;
        }
    });
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
                    telechargerButton.buttonClose.classList.remove('is-closed');
                    COUNT = 0;
                    COUNT++;
                    telechargerButton.buttonText.innerHTML = COUNT;
                    telechargerButton.container.classList.add("is-visible");
                    telechargerButton.button.classList.add("is-visible");
                    // console.log( `1_ le count est de ${telechargerButton.buttonText.innerHTML}`);

                    // console.log( matchingNumber );

                    const theGoodTable = matchingNumber;
                    theGoodTable.classList.add( "selected--table" );

                    addTableActions(theGoodTable, tableToAdd);

                    allSelected(tableToAdd, telechargerButton);
                } else {
                    COUNT++;
                    telechargerButton.buttonText.innerHTML = COUNT;
                    telechargerButton.container.classList.add("is-visible");
                    telechargerButton.button.classList.add("is-visible");
                    // console.log( `1_ le count est de ${telechargerButton.buttonText.innerHTML}`);

                    // console.log( matchingNumber );

                    const theGoodTable = matchingNumber;
                    theGoodTable.classList.add( "selected--table" );

                    addTableActions(theGoodTable, tableToAdd);

                    allSelected(tableToAdd, telechargerButton);

                }

            } else if ( !reve.select.classList.contains("-is-selected") ) {
                COUNT--;
                telechargerButton.buttonText.innerHTML = COUNT;
                // console.log( `1_ le count est de ${telechargerButton.buttonText.innerHTML}`);
                // console.log( `2_ On garde le tableau mergé 😱` );

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
        // console.log(`On veut tous télécharger`);
        // toggleSelection(telechargerButton, articles, COUNT, tables, tableToAdd);
        if ( telechargerButton.all.classList.contains('-is-selected') ) {
            deselectEverything(telechargerButton, articles, COUNT, tables, tableToAdd);
        } else {
            selectEverything(telechargerButton, articles, COUNT, tables, tableToAdd);
        }
    }, false);

    // SUPPRIMER LA POPUP DE SELECTION APRÈS LE TÉLÉCHARGEMENT D'UN REVE
    removePopupContainerAfterPDFDownload(telechargerButton, COUNT, tableToAdd);


}

function allSelected(tableToAdd, telechargerButton) {
    const total = articles.length;
    const totalSelected = tableToAdd.length;
    const telechargerButtonAllSelected = {
        buttonAll: document.querySelector('.button--select'),
    }

    if ( total === totalSelected ) {
        // console.log('all');
        telechargerButton.buttonAll.classList.add("-is-selected");
    } else if ( total !== totalSelected ) {
        // console.log('not all');
        // console.log( telechargerButtonAllSelected );
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

    // console.log('CLOSE BUTTON');
    // console.log(`1_ le count est ${telechargerButton.buttonText.innerHTML}`);
    // console.log(`2_ On garde le tableau mergé 😱` );
    // console.log(`3_ Il n'y a plus de tableaux !` );
    // console.log(`4_ La preuve ! tableToAdd : ${tableToAdd.length}`);
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

        // console.log( reve );

        telechargerButton.buttonText.innerHTML = articles.length;
        telechargerButton.buttonAll.classList.add("-is-selected");
        telechargerButton.all.classList.add("-is-selected");
        reve.select.classList.add("-is-selected");
        reve.download.classList.add("-is-selected");
        COUNT = reve.select.length;
        if ( !telechargerButton.button.classList.contains("is-visible") ) telechargerButton.button.classList.add("is-visible");
        const aTables = Array.from(tables);
        aTables.forEach( ( table ) => ( table.classList.add("selected--table"), tableToAdd.push(table) ) );

    });
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
        COUNT = 0;
        if ( telechargerButton.button.classList.contains("is-visible") ) telechargerButton.button.classList.remove("is-visible");
        tables.forEach( ( table ) => ( table.classList.remove("selected--table") , tableToAdd.length = 0 ) );


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

            // console.log( `2_ Le tableau ${tableReve.id} a été mergé` );
        } else {
            // Silence is golden
        }
    });
}

function addTableActions(theGoodTable, tableToAdd) {
    tableToAdd.push( theGoodTable );
    mergeTheTables( theGoodTable );

    // console.log('3_ le tableau ajouté est ' + theGoodTable.id);
}

function removeTableActions(theBadTable, tableToAdd) {
    const index = tableToAdd.indexOf( theBadTable );
    if (index > -1) {
        tableToAdd.splice(index, 1);
    }

    // console.log('3_ le tableau supprimé est ' + theBadTable.id);
}

function orderSelection( tableToAdd ) {
    const orderedID = [];
    const orderedSelection = tableToAdd.forEach( table => orderedID.push(table.id) );
    const orderedList = orderedID.join(' & ');

    if ( orderedID.length === 0 ) {
        // console.log( `4_ Il n'y a plus de tableaux !` );
    } else {
        // console.log( `4_ les tableaux selectionnés sont ${orderedList}` );
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
                // console.log(' PDF has been downloaded');
                if( popup.classList.contains('close--after-download') ) {
                    popup.classList.remove("is-visible");
                    close.classList.add('is-closed');
                    const selectedElements = Array.from(document.querySelectorAll(".-is-selected"));
                    selectedElements.forEach(selectedElement => {
                        selectedElement.classList.remove("-is-selected");
                    });
                    text.innerHTML = '';

                    // console.log(tables);
                    COUNT = 0;
                    tableToAdd.length = 0;

                }

            }
        });
    });

    observer.observe(itemsContainer, options);
}
