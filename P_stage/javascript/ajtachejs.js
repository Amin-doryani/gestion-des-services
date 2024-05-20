function qtechanged() {
    let vlqte = document.getElementById('qte').value;
    if (vlqte == null) {
        vlqte = 0;
    }
     let vlmon = document.getElementById('montant').value;
     if (vlmon == null) {
        vlmon = 0;
    }
    let thett = document.getElementById('total');
     let tt = vlqte * vlmon;
    thett.value = "Montant total : "  + tt + " DH"

}
