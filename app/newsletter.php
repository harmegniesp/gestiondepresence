<?php
// créer une table dans la BD pour récupérer les enregistrements
// à adapter ...
?>
<section id="newsletter">
    <article>
        <!-- création d'un formulaire pour s'enregistrer à la newsletter -->
        <form id="newsletter" name="newsletter" method="post"
              action="mailto:patrice.harmegnies@gmail.com&cc=patrice.harmegnies@skynet.be&subject=inscription newsletter"
              onsubmit="return fct_validation();" onreset="return fct_annulation();">
            <input type="hidden" name="formNewsletter" id="formNewsletter" value="formulaire inscription Newsletter">
            Tous les champs sont obligatoires ... <br>
            <fieldset>
                <legend>coordonnées</legend>
                <label for="nom">NOM:</label>
                <input type="text" name="nom" id="nom" value="" size="50" maxlength="50"
                       placeholder="tapez votre nom"  autofocus><br><br>
                <label for="prenom">PRENOM:</label>
                <input type="text" name="prenom" id="prenom" value="" size="50" maxlength="50"
                       placeholder="tapez votre prénom" ><br><br>
                <label for="email">EMAIL:</label>
                <input type="email" name="email" id="email" value="" size="50" maxlength="50"
                       placeholder="tapez votre email" ><br><br>
                <label for="datenaissance">DATE DE NAISSANCE:</label>
                <!-- pour la date, soit utiliser un type date avec html5 -->
                <!--
                        <input type="date" name="datenaissance" id="datenaissance" value="" size="50" maxlength="50"
                         placeholder="tapez votre date de naissance" required><br><br>
                -->
                <!-- soit gérer 3 select pour jour,mois et année -->
                <select name="jour" id="jour">
                    <option value="">---</option>
                    <script>
                        for(var i = 1; i <= 31; i++){
                            document.write("<option value='"+i+"'>"+i+"</option>");
                        }
                    </script>
                </select>/
                <select name="mois" id="mois">
                    <option value="">---</option>
                    <script>
                        var tabmois = ["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];
                        for(var i = 1; i <= 12; i++){
                            document.write("<option value='"+i+"'>"+tabmois[i-1]+"</option>");
                        }
                    </script>
                </select>/
                <select name="annee" id="annee">
                    <option value="">---</option>
                    <script>
                        var aujourdhui = new Date();
                        var anneeCourante =  aujourdhui.getFullYear()-18;
                        for(var i = anneeCourante; i > 1900; i--){
                            document.write("<option value='"+i+"'>"+i+"</option>");
                        }
                    </script>
                </select><br><br>
                choisissez:
                <input type="radio" name="sexe" id="sexeH" value="homme">
                <label for="sexeH">Homme</label>
                &nbsp;&nbsp;
                <input type="radio" name="sexe" id="sexeF" value="femme">
                <label for="sexeF">Femme</label> <br><br>
            </fieldset>
            <fieldset>
                <legend>renseignements divers</legend>
                <label for="profession">PROFESSION:</label><br>
                <select id="profession" name="profession" size="1">
                    <option value="">---</option>
                    <option value="employé">employé</option>
                    <option value="cadre">cadre</option>
                    <option value="sans profession">sans profession</option>
                    <option value="pensionné">pensionné</option>
                </select> <br><br>
                <label for="interets">VOS INTERETS POUR LES IMPRIMANTES:</label><br>
                <select id="interet" name="interet" multiple size="4">
                    <option value="imprimante jet d'encre">imprimante jet d'encre</option>
                    <option value="imprimante laser monochrome">imprimante laser monochrome</option>
                    <option value="imprimante laser couleur">imprimante laser couleur</option>
                    <option value="imprimante thermique">imprimante thermique</option>
                    <option value="imprimante 3D">imprimante 3D</option>
                </select><br><br>
                <label for="commentaire">COMMENTAIRE:</label><br>
		<textarea name="commentaire" id="commentaire" rows="5" cols="50">
		</textarea>
                <br><br>
                <input type="checkbox" name="disclaimer" id="disclaimer" value="accepter" checked>
                acceptez-vous que l'on transmette votre email à nos partenaires?
                <br><br>
            </fieldset>
            <fieldset>
                <legend>action</legend>
                <input type="submit" name="submit" id="submit" value="Envoyer">
                <input type="reset" name="reset" id="reset" value="Annuler">
                <input type="button" name="aide" id="aide" value="Aide" onclick="fct_aide();">
            </fieldset>
        </form>
    </article>
</section>
