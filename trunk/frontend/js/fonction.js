function verif_form_connexion(f){

    var rep = true;
    if(f.pseudo.value.length == 0){
	f.pseudo.style.backgroundColor = "#fba";
	rep = false;
    }
    else {
	f.pseudo.style.backgroundColor = "#63DB57";
    }
    if(f.password.value.length == 0){
	f.password.style.backgroundColor = "#fba";
	rep = false;
    }
    else {
	f.password.style.backgroundColor = "#63DB57";
    }
    if(!rep){
	alert("il faut remplir tout les champs");
	return false;
    }
    else return true;

}



function verif_form_inscription(f){
    var rep = true;
    if(f.pseudo.value.length == 0){
	f.pseudo.style.backgroundColor = "#fba";
	rep = false;
    }
    else {
	f.pseudo.style.backgroundColor = "#63DB57";
    }
    if(f.email.value.length == 0){
	f.email.style.backgroundColor = "#fba";
	rep = false;
    }
    else {
	f.email.style.backgroundColor = "#63DB57";
    }
    if(f.password.value.length == 0 || f.password.value != f.password_verif.value){
	f.password.style.backgroundColor = "#fba";
	f.password_verif.style.backgroundColor = "#fba";
	rep = false;
    }
    else {
	f.password.style.backgroundColor = "#63DB57";
	f.password_verif.style.backgroundColor = "#63DB57";
    }
    if(!rep){
	alert("il faut tous remplir");
	return false;
    }
    else{
	return true;
    }
}
