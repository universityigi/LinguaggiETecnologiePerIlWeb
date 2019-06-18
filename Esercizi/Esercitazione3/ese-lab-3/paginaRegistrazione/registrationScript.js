function validaForm(){
    if (!controllaCAP())
        return false;
    else
        return true;
}

function controllaCAP() {
    if (document.myForm.cap.value.length!=5) {
        alert("Il CAP deve contenere 5 cifre");
        return false;
    }
    var v=parseInt(document.myForm.cap.value);
    if (isNaN(v)) {
        alert("Il CAP deve essere un numero");
        return false;
    }
    return true;
}