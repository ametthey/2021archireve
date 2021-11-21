import { tableToPDF } from '../components/table-to-pdf.js';
import { replaceCellsFromTable } from '../components/selection-reves-functions.js';

const buttonsSelectionReve = document.querySelectorAll(".button--select-to-download");
const pastille = document.querySelector(".button--selected-number");
const pastilleText = document.querySelector(".button--selected-number p");
const popup = document.querySelector(".popup--download");
const closeB = document.querySelector(".popup--download-close-button");
const downloadTable = document.querySelector(".container--reve-to-download");
const tables = document.querySelectorAll(".reve--to-print");
const buttonAllSelected = document.querySelector(".button--select");
const downloadButton = document.querySelector(".button--download");
const tableToAdd = [];
let COUNT = 0;



if ( buttonsSelectionReve && pastille ) {


    buttonsSelectionReve.forEach( ( element ) => {
        const iconText = element.nextElementSibling ;
        const downloadContainer = element.closest(".article-reve--download");
        const headerContainer = downloadContainer.closest(".article-reve--header");
        const reveContainer = headerContainer.closest(".article-reve");
        const reveContainerNumber = reveContainer.dataset.number;

        // Click sur le bouton de téléchargement
        element.addEventListener( "click", (e) => {
            const elementTarget = e.currentTarget;

            element.classList.toggle("-is-selected");
            iconText.classList.toggle("is-selected");

            // Incremente le nombre de rêve sélectionné
            if ( elementTarget.classList.contains("-is-selected") ) {
                COUNT++;
                pastilleText.innerHTML = COUNT;
                // Mintre la pastille si le nombre est nul
                pastille.classList.add("is-visible");
                popup.classList.add("is-visible");
                let theGoodTable;
                tables.forEach( table => {
                    if ( table.dataset.number === reveContainerNumber ) {
                        theGoodTable = table;
                        theGoodTable.classList.add("selected--table");
                        tableToAdd.push(theGoodTable);

                        mergeTheTables(theGoodTable);

                    }
                });

                // Si tout les rêves sont cochés, le bouton TOUT SÉLECTIONNER est actif
                if ( tableToAdd.length >= 4 ) {
                    buttonAllSelected.classList.add("-is-selected")
                }

            // Decrement le nombre de rêve sélectionné
            } else if ( !elementTarget.classList.contains("-is-selected") ){
                COUNT--;
                pastilleText.innerHTML = COUNT;
                tables.forEach( table => {
                    if ( table.dataset.number === reveContainerNumber ) {
                        const theGoodTable = table;
                        theGoodTable.classList.remove("selected--table");
                        tableToAdd.pop(theGoodTable);
                    }
                });
                if ( tableToAdd.length < 4 ) {
                    buttonAllSelected.classList.remove("-is-selected")
                }
                console.log( tableToAdd );
            }
            // Enleve la pastille si le nombre est nul
            if ( COUNT === 0 ) {
                pastille.classList.remove("is-visible");
                popup.classList.remove("is-visible");
            }
        });

    });

    buttonAllSelected.addEventListener( "click", toggleSelection , false);
    closeB.addEventListener( "click", closeDownloadPopup, false);
    downloadButton.addEventListener( "click", DLTableToPDF, false );
}

function DLTableToPDF() {
    tableToAdd.forEach( ( table ) => (tableToPDF(table) ) );
}

function toggleSelection(e) {
    const buttonAllSelected = e.currentTarget;
    if ( !buttonAllSelected.classList.contains("-is-selected") ) {
        selectEverything();
    } else  {
        deselectEverything();
    }
}

function selectEverything() {
    pastilleText.innerHTML = buttonsSelectionReve.length;
    buttonAllSelected.classList.add("-is-selected");
    buttonsSelectionReve.forEach(element => element.classList.add("-is-selected"));
    COUNT = buttonsSelectionReve.length;
    if ( !pastille.classList.contains("is-visible") ) pastille.classList.add("is-visible");
    tables.forEach( ( table ) => ( table.classList.add("selected--table") , tableToAdd.push(table) ) );
}

function deselectEverything() {
    buttonAllSelected.classList.remove("-is-selected");
    buttonsSelectionReve.forEach(element => element.classList.remove("-is-selected"));
    COUNT = 0;
    if ( pastille.classList.contains("is-visible") ) pastille.classList.remove("is-visible");
    tables.forEach( ( table ) => ( table.classList.remove("selected--table") , tableToAdd.length = 0 ) );
}

function closeDownloadPopup(e) {
    popup.classList.remove("is-visible");
    const selectedElements = Array.from(document.querySelectorAll(".-is-selected"));
    selectedElements.forEach(selectedElement => {
        selectedElement.classList.remove("-is-selected");
    });

    // On réinitialise tout !
    if ( COUNT !== 0 ) ( pastilleText.innerHTML = 0 , COUNT = 0 );


    if ( tableToAdd.length === 0 ) {
        // Silence is golden
    } else {
        tableToAdd.length = 0;
    }
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

            console.log('pseudos are the same !');

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

function listForEach( elements ) {
    elements.forEach( element => console.log(`Le nom de l'élément est ${element}`) );
}
