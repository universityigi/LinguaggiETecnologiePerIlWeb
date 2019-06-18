function validaForm(){
    if(document.myForm.remember.checked){
        window.alert("Hai scelto di ricordarti per i prossimi accessi");
    }
    else{
        window.alert("Hai scelto di non ricordarti per i prossimi accessi");
        }
    return true;
}