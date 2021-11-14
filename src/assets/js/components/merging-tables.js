// help to get the addEventListener right
// https://github.com/3Dparallax/insight/issues/126
// whole code come from here
// https://codepedia.info/editor-example?id=49

document.addEventListener('DOMContentLoaded', function(e) {
    mergeTwoTables();
    reallyMergeTheTwoTables();
});


// MERGE THE 2 TABLES
function mergeTwoTables(_callback) {
    let authorRowCell, reves, reveCellToAuthor, reveCell;
    let reveArrPair = [];
    let reveArrImpair = [];
    let reveCellSell, newCellContent, newCellContent2;
    const tableRevesRows = [...document.querySelectorAll('.table--print-reve tr')];
    const tableAuthorsRows = [...document.querySelectorAll('.table--print-author tr')];

    tableRevesRows.forEach( cell => {
        reveCellSell = [...cell.querySelectorAll( 'td' )];

        const cellType = reveCellSell.filter( ( cell, i ) => {
            if (  i % 2 == 0 ) {
                newCellContent = cell.textContent.replace(/[\n\r]+|[\s]{2,}/g, ' ').trim();
                reveArrPair.push(newCellContent);
            } else {
                newCellContent2 = cell.textContent.replace(/[\n\r]+|[\s]{2,}/g, ' ').trim();
                reveArrImpair.push(newCellContent2);
            }
        });
    });

    tableAuthorsRows.forEach( (newRow, i) => {
        function testCell(texte="", texte2="") {
            let newCell = `<td id="new--1" class="new--pair">${texte}</td><td id="new--2" class="new--pair">${texte2}</td>`;
            let selectorCell = newRow;
            selectorCell.insertAdjacentHTML('afterbegin', newCell);
        }
        testCell( reveArrPair[i], reveArrImpair[i]);

    });
}

// REALLY MERGE THE 2 TABLES

function reallyMergeTheTwoTables() {
    const tablesReve = document.querySelectorAll('.reve--to-print.post-type-reve');
    const tablesInfoReve = document.querySelectorAll('.reve--to-print.post-type-reveur-info');
    let revePseudo, infoRevePseudo;
    let pseudo;
    let age;
    let physiologie;
    let ressenti;
    let langue;
    let paysEnfance;
    let milieuOrigine;
    let milieuActuel;
    let travail1;
    let travail2;
    let travail3;
    let paysageEnfance;
    let reliefEnfance;
    let zoneEnfance;
    let paysageActuel;
    let reliefActuel;
    let zoneActuel;
    let attirancePaysage;
    let reliefAttirance;
    let zoneAttirance;
    let foiOrigine;
    let foiActuelle;
    let sommeilDodo;
    let sommeilDodo2;
    let relationReve1;
    let relationReve2;

    let Revepseudo;
    let Reveage;
    let Revephysiologie;
    let Reveressenti;
    let Revelangue;
    let RevepaysEnfance;
    let RevemilieuOrigine;
    let RevemilieuActuel;
    let Revetravail1;
    let Revetravail2;
    let Revetravail3;
    let RevepaysageEnfance;
    let RevereliefEnfance;
    let RevezoneEnfance;
    let RevepaysageActuel;
    let RevereliefActuel;
    let RevezoneActuel;
    let ReveattirancePaysage;
    let RevereliefAttirance;
    let RevezoneAttirance;
    let RevefoiOrigine;
    let RevefoiActuelle;
    let RevesommeilDodo;
    let RevesommeilDodo2;
    let ReverelationReve1;
    let ReverelationReve2;

    // RÉCUPÉRER LES INFORMATIONS DE INFO REVEUR
    tablesInfoReve.forEach( info => {
        pseudo = info.querySelector('.table-pseudo').innerText.replace(/\r?\n|\r/g, '').trim();
        age = info.querySelector('.table-age').innerText.replace(/\r?\n|\r/g, '').trim();
        physiologie = info.querySelector('.table-physiologie').innerText.replace(/\r?\n|\r/g, '').trim();
        ressenti = info.querySelector('.table-ressenti').innerText.replace(/\r?\n|\r/g, '').trim();
        langue = info.querySelector('.table-langue').innerText.replace(/\r?\n|\r/g, '').trim();
        paysEnfance = info.querySelector('.table-pays-enfance').innerText.replace(/\r?\n|\r/g, '').trim();
        milieuOrigine = info.querySelector('.table-milieu-origine').innerText.replace(/\r?\n|\r/g, '').trim();
        milieuActuel = info.querySelector('.table-milieu-actuel').innerText.replace(/\r?\n|\r/g, '').trim();
        travail1 = info.querySelector('.table-travail-1').innerText.replace(/\r?\n|\r/g, '').trim();
        travail2 = info.querySelector('.table-travail-2').innerText.replace(/\r?\n|\r/g, '').trim();
        travail3 = info.querySelector('.table-travail-3').innerText.replace(/\r?\n|\r/g, '').trim();
        paysageEnfance = info.querySelector('.table-paysage-enfance').innerText.replace(/\r?\n|\r/g, '').trim();
        reliefEnfance = info.querySelector('.table-relief-enfance').innerText.replace(/\r?\n|\r/g, '').trim();
        zoneEnfance = info.querySelector('.table-zone-enfance').innerText.replace(/\r?\n|\r/g, '').trim();
        paysageActuel = info.querySelector('.table-paysage-actuel').innerText.replace(/\r?\n|\r/g, '').trim();
        reliefActuel = info.querySelector('.table-relief-actuel').innerText.replace(/\r?\n|\r/g, '').trim();
        zoneActuel = info.querySelector('.table-zone-actuel').innerText.replace(/\r?\n|\r/g, '').trim();
        attirancePaysage = info.querySelector('.table-attirance-paysage').innerText.replace(/\r?\n|\r/g, '').trim();
        reliefAttirance = info.querySelector('.table-relief-attirance').innerText.replace(/\r?\n|\r/g, '').trim();
        zoneAttirance = info.querySelector('.table-zone-attirance').innerText.replace(/\r?\n|\r/g, '').trim();
        foiOrigine = info.querySelector('.table-foi-origine').innerText.replace(/\r?\n|\r/g, '').trim();
        foiActuelle = info.querySelector('.table-foi-actuelle').innerText.replace(/\r?\n|\r/g, '').trim();
        sommeilDodo = info.querySelector('.table-sommeil-dodo').innerText.replace(/\r?\n|\r/g, '').trim();
        sommeilDodo2 = info.querySelector('.table-sommeil-dodo-2').innerText.replace(/\r?\n|\r/g, '').trim();
        relationReve1 = info.querySelector('.table-relation-reve-1').innerText.replace(/\r?\n|\r/g, '').trim();
        relationReve2 = info.querySelector('.table-relation-reve-2').innerText.replace(/\r?\n|\r/g, '').trim();
    });

    tablesReve.forEach( reve => {
        revePseudo = reve.querySelector('.table-pseudo');
        let reveAge = reve.querySelector('.table-age');
        Revepseudo = reve.querySelector('.table-pseudo');
        Reveage = reve.querySelector('.table-age');
        Revephysiologie = reve.querySelector('.table-physiologie');
        Reveressenti = reve.querySelector('.table-ressenti');
        Revelangue = reve.querySelector('.table-langue');
        RevepaysEnfance = reve.querySelector('.table-pays-enfance');
        RevemilieuOrigine = reve.querySelector('.table-milieu-origine');
        RevemilieuActuel = reve.querySelector('.table-milieu-actuel');
        Revetravail1 = reve.querySelector('.table-travail-1');
        Revetravail2 = reve.querySelector('.table-travail-2');
        Revetravail3 = reve.querySelector('.table-travail-3');
        RevepaysageEnfance = reve.querySelector('.table-paysage-enfance');
        RevereliefEnfance = reve.querySelector('.table-relief-enfance');
        RevezoneEnfance = reve.querySelector('.table-zone-enfance');
        RevepaysageActuel = reve.querySelector('.table-paysage-actuel');
        RevereliefActuel = reve.querySelector('.table-relief-actuel');
        RevezoneActuel = reve.querySelector('.table-zone-actuel');
        ReveattirancePaysage = reve.querySelector('.table-attirance-paysage');
        RevereliefAttirance = reve.querySelector('.table-relief-attirance');
        RevezoneAttirance = reve.querySelector('.table-zone-attirance');
        RevefoiOrigine = reve.querySelector('.table-foi-origine');
        RevefoiActuelle = reve.querySelector('.table-foi-actuelle');
        RevesommeilDodo = reve.querySelector('.table-sommeil-dodo');
        RevesommeilDodo2 = reve.querySelector('.table-sommeil-dodo-2');
        ReverelationReve1 = reve.querySelector('.table-relation-reve-1');
        ReverelationReve2 = reve.querySelector('.table-relation-reve-2');

        tablesInfoReve.forEach( info => {
            infoRevePseudo = info.querySelector('.table-pseudo');
            if ( revePseudo.innerText === infoRevePseudo.innerText ) {
                const pseudoContainer = revePseudo.closest('tr');
                const tablePseudo = pseudoContainer.closest('table');

                Revepseudo.innerText = pseudo;
                Reveage.innerText = age;
                Revephysiologie.innerText = physiologie;
                Reveressenti.innerText = ressenti;
                Revelangue.innerText = langue;
                RevepaysEnfance.innerText = paysEnfance;
                RevemilieuOrigine.innerText = milieuOrigine;
                RevemilieuActuel.innerText = milieuActuel;
                Revetravail1.innerText = travail1;
                Revetravail2.innerText = travail2;
                Revetravail3.innerText = travail3;
                RevepaysageEnfance.innerText = paysageEnfance;
                RevereliefEnfance.innerText = reliefEnfance;
                RevezoneEnfance.innerText = zoneEnfance;
                RevepaysageActuel.innerText = paysageActuel;
                RevereliefActuel.innerText = reliefActuel;
                RevezoneActuel.innerText = zoneActuel;
                ReveattirancePaysage.innerText = attirancePaysage;
                RevereliefAttirance.innerText = reliefAttirance;
                RevezoneAttirance.innerText = zoneAttirance;
                RevefoiOrigine.innerText = foiOrigine;
                RevefoiActuelle.innerText = foiActuelle;
                RevesommeilDodo.innerText = sommeilDodo;
                RevesommeilDodo2.innerText = sommeilDodo2;
                ReverelationReve1.innerText = relationReve1;
                ReverelationReve2.innerText = relationReve2;


            } else {
                console.log('ERROR');
            }
        });
    });

}
