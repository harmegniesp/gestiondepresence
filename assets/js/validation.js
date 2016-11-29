/**
 * Created by hpph on 25-11-16.
 */
// script pour le formulaire
// retourne un booléen
function fct_validation(){
    var test = true;
    var message_error = "";
    // récupération des données
    /*
     input type text,password,email,date,...  on récupère la value
     input type radio boucle sur le tableau d'input et vérifier checked
     ou avec getElementById ...
     input type checkbox si checked value
     select la 1ère valeur
     select multiple vérifier si option value selected
     textarea on fécupère le contenu ...
     */
    var nom,prenom,email,jour,mois,annee,disclaimer, commentaire,profession,interet,sexe;
    /*
     différentes façons de récupérer les données
     document.nomduformulaire
     document.forms[0]
     document.getElementId
     avec JQuery
     */
    nom = document.getElementById('nom').value; // input text
    prenom = document.getElementById('prenom').value; // input text
    email = document.getElementById('email').value; // input text
    commentaire = document.getElementById('commentaire').value; // textarea
    profession = document.getElementById('profession').value; // select single si chaîne vide pas de sélection
    disclaimer = document.getElementById('disclaimer').value; // input checkbox

    jour = document.getElementById('jour').value; // select singlesi chaîne vide pas de sélection
    mois = document.getElementById('mois').value;
    annee = document.getElementById('annee').value;

    sexe = ""; // input radio
    if ( document.getElementById('sexeH').checked )
        sexe = "homme";
    else if ( document.getElementById('sexeF').checked )
        sexe = "femme";
    else
        sexe ="indéfini";

    disclaimer = "";
    if ( document.getElementById('disclaimer').checked )
        disclaimer = "accepter";
    else
        disclaimer = "pas accepter";

    // récupération d'un select multiple avec document.getElementById
    var liste = document.getElementById('interet');
    var lsSelections = "";
    for(var i=0; i < liste.options.length; i++)
    {
        if(liste.options[i].selected)
        {
            lsSelections += liste.options[i].value + ";";
        }
    }

    // pour tester
    /*
     var datas = "";
     datas += "nom: " + nom + "\n";
     datas += "prenom: " + prenom + "\n";
     datas += "email: " + email + "\n";
     datas += "sexe: " + sexe + "\n";
     datas += "jour: " + jour + "\n";
     datas += "mois: " + mois + "\n";
     datas += "annee: " + annee + "\n";
     datas += "profession: " + profession + "\n";
     datas += "disclaimer: " + disclaimer + "\n";
     datas += "commentaire: " + commentaire + "\n";
     datas += "intérêts: " + lsSelections + "\n";
     alert(datas);
     */
    // tester les différentes variables
    if ( nom.trim().length == 0 ){
        test = false;
        message_error += "nom oublié\n";
    }
    if ( prenom.trim().length == 0 ){
        test = false;
        message_error += "prénom oublié\n";
    }
    if ( email.trim().length == 0 ){
        test = false;
        message_error += "nom oublié\n";
        // il faudra tester la syntaxe avec regex
    }
    if ( !(jour != "" && mois != "" && annee != "") ){
        test = false;
        message_error += "date de naissance incorrecte\n";
        // il faudra vérifier la date avec les années bisextiles
    }
    if ( sexe == "indéfini" ){
        test = false;
        message_error += "choisissez homme ou femme\n";
    }
    if ( profession.length == 0 ){
        test = false;
        message_error += "choisissez une profession\n";
    }
    if ( lsSelections.length == 0 ){
        test = false;
        message_error += "choisissez au moins une imprimante\n";
    }

    //alert(test);
    // afficher les erreurs si problème
    if ( !test ){
        alert(message_error);
    }
    return test;
}

//retournne un booléen confirmation du reset du formulaire
function fct_annulation(){
    return confirm("confirmez la suppression des zones du formulaire");
}

//permettra d'utiliser un popup ... avec window.open
// affichera tous les éléments du formulaire (fieldset compris)
function fct_aide(){
    var message = "";
    var form = document.forms[0];
    for ( var i = 0; i < form.elements.length; i++ ){
        message += form.elements[i].name + " ";
        message += form.elements[i].type + " ";
        message += form.elements[i].value + "<br>";
    }
    //alert(message);
    // créer une fenêtre popup
    // modifier pour centrerle popup au milieu de l'écran du client
    // screen.width pour récupérer en pixels la largeur de l'écran du client et screen.height pour la hauteur
    var properties = "left=0,top=0,width=300,height=500,menubar=0,status=0,toolbar=0";
    var popup = window.open("","popup",properties);
    popup.document.write("<!DOCTYPE html><html lang='fr'>");
    popup.document.write("<head><meta charset='utf-8'></head>");
    popup.document.write("<body>");
    popup.document.write(message);
    popup.document.write("<br><a href='#' onclick='window.close();'>fermer la fenêtre</a>");
    popup.document.write("</body>");
    popup.document.write("</html>");
}