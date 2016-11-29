/**
 * Created by hpph on 25-11-16.
 */
// vérifier si le navigateur accepte les cookies
function activationCookies(){
    if (navigator.cookieEnabled)
        return true;
    else
        return false;
}




// script pour les cookies
function fct_Gcookie(value){
    console.log(value);
    var contenucookie = "";
    var nom = "accepterCookie";
    if ( value == "oui" ){
        contenucookie = "accepter cookies";
    }
    if ( value == "non" ){
        contenucookie = "pas accepter cookies";
    }
    creer_cookie(nom,contenucookie,365,"/"); //ok
    document.getElementById('divCookie').style.display = 'none';
}
/*
 function testerCookie(){
 console.log("tester cookie");
 console.log("value cookie:" + lire_cookie("accepterCookie"));
 console.log("value cookie:" + getCookie("accepterCookie"));
 // problème avec chrome et ok avec firefox
 if ( verifier_cookie("accepterCookie") )
 document.getElementById('divCookie').style.display = 'none';
 else
 document.getElementById('divCookie').style.display = 'block';
 }
 */

// idem fonction ci-dessus ...
function testerCookie(){
    if ( getCookie("accepterCookie") != null )
        document.getElementById('divCookie').style.display = 'none';
    else
        document.getElementById('divCookie').style.display = 'block';
}

/*
 syntaxe d'un cookie en javascript
 document.cookie = 'ppkcookie2=un autre test; expires=Mon, 1 Mar 2010 00:00:00 UTC; path=/'
 chaque partie est séparée par un ; avec un espace
 possibilité d'utiliser un argument pour https mode secure
 */
function creer_cookie(nom,valeur,nbJours,chemin){
    console.log("creer cookie");
    var date = new Date(); //date PC client
    date.setTime(date.getTime()+(nbJours*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
    console.log(nom+"="+valeur+expires+"; path="+ chemin);
    document.cookie = nom+"="+encodeURIComponent(valeur)+expires+"; path="+ chemin;
}
/*
 pour supprimer un cookie, mettre une date d'expiration antérieure à la date du jour ...
 */
function supprimer_cookie(nom,chemin){
    var date = new Date();
    date.setTime(date.getTime()-(10*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
    document.cookie = nom+"="+""+expires+"; path="+ chemin;
}

// retourne un booléen
/*
 document.cookie récupère tous les cookies déposés par le site en rapport avec le nom de domaine
 changer la fonction pour faire intervenir le chemin ou path
 */
function verifier_cookie(nom){
    var nomCookie = nom + "=";
    var tabCookie = document.cookie.split(';');
    for(var i=0;i < tabCookie.length;i++) {
        if (tabCookie[i].indexOf(nomCookie) == 0) // indexOf retourne la position de la chaîne, -1 si absente
            return true;
    }
}

// retourne une chaîne ou une chaîne vide
function lire_cookie(nom){
    var nomCookie = nom + "=";
    var tabCookie = document.cookie.split(';');
    for(var i=0;i < tabCookie.length;i++) {
        if (tabCookie[i].indexOf(nomCookie) == 0) // indexOf retourne la position de la chaîne, -1 si absente
        //alert('ok');
        //alert(decodeURIComponent(tabCookie[i].substring(nomCookie.length,tabCookie[i].length)));
            return decodeURIComponent(tabCookie[i].substring(nomCookie.length,tabCookie[i].length));
    }
    return "";
}

// autre fonction pour récupérer un cookie avec expression régulière cf OpenClassRooms
function getCookie(sName) {
    var oRegex = new RegExp("(?:; )?" + sName + "=([^;]*);?");

    if (oRegex.test(document.cookie)) {
        return decodeURIComponent(RegExp["$1"]);
    } else {
        return null;
    }
}