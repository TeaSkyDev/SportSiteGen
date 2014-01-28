/**
 * Created by Guillaume on 20/01/14.
 */

(function() {
    var searchElement = document.getElementById("champ_recherche");
    var results       = document.getElementById("output");
    var previousResult = searchElement.value;
    var previousRequest;
    var selectedResult = -1;
    searchElement.focus();

    var xhr = getXMLHttpRequest();

    function request(val) {

        xhr.open("GET", "php/news.php?research=true&ajax=true&val="+encodeURIComponent(val), true);
        /* Status de l'objet, 4 le serveur a fini son travail, 200 et 0 car pas d'erreur (ex 404...) */
        xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                traitement(xhr.responseText); //données textuelles récupérées (responseXML -> arbre XML)
            }
        };

        xhr.send(null);
        return xhr;
    }

    function traitement(sData) {
        if(sData) {
            results.innerHTML = "";
            var array = sData.split('|');
            var div, cn;
            var output = document.getElementById("output");

            for(var i = 0; i < array.length; i++) {
                div = document.createElement("div");
                div.className = "unselected_result result";
                cn = document.createTextNode(array[i]);

                div.appendChild(cn);
                div.onClick = function() {
                    chooseResult(this);
                };
                output.appendChild(div);
            }

            output.className="af";
        }
    }

    function chooseResult(result) {
        searchElement.value = previousResult = result.innerHTML;
        //results.className = "hide";
        results.innerHTML = "";
        result.className = "unselected_result result";
        selectedResult = -1;
        searchElement.focus();
    }

    searchElement.onkeyup = function(e) {

        e = e || window.event; //compatibilité IE
        var divs = document.getElementsByClassName("result");

        if(e.keyCode == 38 && selectedResult > -1) {
            divs[selectedResult--].className = "unselected_result result";
            if(selectedResult > -1) {
                divs[selectedResult].className = "selected_result result";
            } else {
                searchElement.focus();
            }
        } else if(e.keyCode == 40 && selectedResult != divs.length - 1) {
            results.style.display = "block";
            if(selectedResult > -1) {
                divs[selectedResult].className = "unselected_result result";
            }
            selectedResult++;
            divs[selectedResult].className = "selected_result result";
        } else if(e.keyCode == 13 && selectedResult > -1) {
            chooseResult(divs[selectedResult]);
        } else if(searchElement.value != previousResult) {
            if(searchElement.value != "") {
                previousResult = searchElement.value;
                if(previousRequest && previousRequest.readyState < 4) {
                    previousRequest.abort();
                }
                previousRequest = request(previousResult);
                selectedResult = -1;
            } else {
                previousResult = searchElement.value;
                results.innerHTML = "";
            }
        }

    };
})();

