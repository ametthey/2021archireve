export function replaceCellsFromTable(tableReve, reveurKeys, reveurValues) {
    const tableReveCells = tableReve.querySelectorAll('td');

    let Revepseudo, Reveage, Revephysiologie, Reveressenti, Reveattirance, Revelangue, RevepaysEnfance, RevemilieuOrigine, RevemilieuAct , Revetravail1, Revetravail2, Revetravail3, RevepaysageEnfance, RevereliefEnfance, RevezoneEnfance, RevepaysageActuel, RevereliefActuel, RevezoneActuel, ReveattirancePaysage, RevereliefAttirance, RevezoneAttirance, RevefoiOrigine, RevefoiActuelle, RevesommeilDodo, RevesommeilDodo2, ReverelationReve1, ReverelationReve2;

    Revepseudo = tableReve.querySelector('.table-pseudo');
    Reveage = tableReve.querySelector('.table-age');
    Revephysiologie = tableReve.querySelector('.table-physiologie');
    Reveressenti = tableReve.querySelector('.table-ressenti');
    Reveattirance = tableReve.querySelector('.table-attirance');
    Revelangue = tableReve.querySelector('.table-langue');
    RevepaysEnfance = tableReve.querySelector('.table-pays-enfance');
    RevemilieuOrigine = tableReve.querySelector('.table-milieu-origine');
    RevemilieuAct = tableReve.querySelector('.table-milieu-actuel');
    Revetravail1 = tableReve.querySelector('.table-travail-1');
    Revetravail2 = tableReve.querySelector('.table-travail-2');
    Revetravail3 = tableReve.querySelector('.table-travail-3');
    RevepaysageEnfance = tableReve.querySelector('.table-paysage-enfance');
    RevereliefEnfance = tableReve.querySelector('.table-relief-enfance');
    RevezoneEnfance = tableReve.querySelector('.table-zone-enfance');
    RevepaysageActuel = tableReve.querySelector('.table-paysage-actuel');
    RevereliefActuel = tableReve.querySelector('.table-relief-actuel');
    RevezoneActuel = tableReve.querySelector('.table-zone-actuel');
    ReveattirancePaysage = tableReve.querySelector('.table-attirance-paysage');
    RevereliefAttirance = tableReve.querySelector('.table-relief-attirance');
    RevezoneAttirance = tableReve.querySelector('.table-zone-attirance');
    RevefoiOrigine = tableReve.querySelector('.table-foi-origine');
    RevefoiActuelle = tableReve.querySelector('.table-foi-actuelle');
    RevesommeilDodo = tableReve.querySelector('.table-sommeil-dodo');
    RevesommeilDodo2 = tableReve.querySelector('.table-sommeil-dodo-2');
    ReverelationReve1 = tableReve.querySelector('.table-relation-tableReve-1');
    ReverelationReve2 = tableReve.querySelector('.table-relation-tableReve-2');

    Revepseudo.innerText = reveurValues[0];
    Reveage.innerText = reveurValues[2];
    Revephysiologie.innerText = reveurValues[3];
    Reveressenti.innerText = reveurValues[4];
    Reveattirance.innerText = reveurValues[5];
    Revelangue.innerText = reveurValues[6];
    RevepaysEnfance.innerText = reveurValues[7];
    RevemilieuOrigine.innerText = reveurValues[8];
    RevemilieuAct.innerText = reveurValues[9];
    Revetravail1.innerText = reveurValues[10];
    Revetravail2.innerText = reveurValues[11];
    Revetravail3.innerText = reveurValues[12];
    RevepaysageEnfance.innerText = reveurValues[13];
    RevereliefEnfance.innerText = reveurValues[14];
    RevezoneEnfance.innerText = reveurValues[15];
    RevepaysageActuel.innerText = reveurValues[16];
    RevereliefActuel.innerText = reveurValues[17];
    RevezoneActuel.innerText = reveurValues[18];
    ReveattirancePaysage.innerText = reveurValues[10];
    RevereliefAttirance.innerText = reveurValues[20];
    RevezoneAttirance.innerText = reveurValues[21];
    RevefoiOrigine.innerText = reveurValues[22];
    RevefoiActuelle.innerText = reveurValues[23];
    RevesommeilDodo.innerText = reveurValues[24];
    if ( RevesommeilDodo ) RevesommeilDodo2.innerText = reveurValues[25];
    if ( ReverelationReve1 ) ReverelationReve1.innerText = reveurValues[26];
    if ( ReverelationReve2 ) {
        ReverelationReve2.innerText = reveurValues[27];
    } else {
        //
    }
}
