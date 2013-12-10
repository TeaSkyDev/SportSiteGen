function verif_form_1(f) {
    var rep = true;
    if(f.server.value.length == 0) {
        f.server.style.backgroundColor = "#fba";
        rep = false;
    }
    if(f.login.value.length == 0) {
        f.login.style.backgroundColor = "#fba";
        rep = false;
    }
    if(f.pass.value.length == 0) {
        f.pass.style.backgroundColor = "#fba";
        rep = false;
    }
    if(f.bdd.value.length == 0) {
        f.bdd.style.backgroundColor = "#fba";
        rep = false;
    }

    if(!rep) {
        alert("Il faut remplir tous les champs !");
        return false;
    } else {
        return true;
    }
}

function verif_form_2(f) {
    var rep     = true;
    var pass_ok = true;
    if(f.login.value.length == 0) {
        f.login.style.backgroundColor = "#fba";
        rep = false;
    }
    if(f.pass.value.length == 0) {
        f.pass.style.backgroundColor = "#fba";
        rep = false;
    }
    if(f.mail.value.length == 0) {
        f.mail.style.backgroundColor = "#fba";
        rep = false;
    }
    if(f.pass_verif.value.length == 0) {
        f.pass_verif.style.backgroundColor = "#fba";
        rep = false;
    }

    if(f.pass.value != f.pass_verif.value) {
        pass_ok = false;
    }

    if(!rep) {
        alert("Il faut remplir tous les champs !");
        return false;
    } else if(!pass_ok) {
        alert("Les deux mots de passes ne sont pas egaux !");
        return false;
    } else {
        return true;
    }
}