<?php
$path = "http://" . $_SERVER['HTTP_HOST'];
// formulaire pour envoyer un mail

if ( isset($_POST['submit']) && $_POST['submit'] == 'Envoyer' ){
    // traitement feedback
    // vérifier les données transmises

    // si problèmes créer variable session $_SESSION['contact']['errors']

    $mail = new \phpmailer\PhpMailer();
    $mail->IsSMTP();
    $mail->isHTML(true);
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.skynet.be';
    $mail->Port = 25;
    $mail->SetFrom("patrice.harmegnies@skynet.be", "Patrice Harmegnies");
    $mail->Subject = "Contact site Web Gestion des présences";
    // ok pour smtp sans authentification voir avec gmail ...

    $message = "";
    $message .= "<strong>Informations de contact:</strong><br>";
    $message .= "votre nom: " . $_POST['nom'] . "<br>";
    $message .= "votre prénom: " . $_POST['prenom'] . "<br>";
    $message .= "votre email: " . $_POST['email'] . "<br>";
    $message .= "votre commentaire: " . $_POST['commentaire'] . "<br>";

    $mail->Body = "<html><body>$message</body></html>";
    $mail->AddAddress('hpphdev@gmail.com');
    if (!$mail->Send()) {
        //echo 'Mail error: ' . $mail->ErrorInfo;
        $_SESSION['contact']['send'] = "le message n'a pas été envoyé ...";
    } else {
        //echo 'Mail envoyé';
        $_SESSION['contact']['send'] = "le message a été envoyé ...";
    }

}


?>
<section id="contact">
    <article>
        <h1>Contact</h1>
        <!-- création d'un formulaire pour s'enregistrer à la newsletter -->
        <form id="contact" name="contact" method="post"
              action="<?php echo $path;?>/contact/">
            <input type="hidden" name="formContacr" id="formContact" value="formulaire contact">
            Tous les champs sont obligatoires ... <br><br>
                <label for="nom">NOM:</label>
                <input type="text" name="nom" id="nom" value="" size="50" maxlength="50"
                       placeholder="tapez votre nom"  autofocus><br><br>
                <label for="prenom">PRENOM:</label>
                <input type="text" name="prenom" id="prenom" value="" size="50" maxlength="50"
                       placeholder="tapez votre prénom" ><br><br>
                <label for="email">EMAIL:</label>
                <input type="email" name="email" id="email" value="" size="50" maxlength="50"
                       placeholder="tapez votre email" ><br><br>
                <label for="commentaire">COMMENTAIRE:</label><br>
		        <textarea name="commentaire" id="commentaire" rows="5" cols="50">
		        </textarea>
            <br><br>
                <input type="submit" name="submit" id="submit" value="Envoyer">
                <input type="reset" name="reset" id="reset" value="Annuler">
        </form>

        <?php
        if ( isset($_SESSION['contact']['errors']) ){
            // afficher le flash dans un div avec les erreurs de validation ...
;
        }

        if ( isset($_SESSION['contact']['send']) ){
            // afficher le flash dans un div
            echo "<div id='flash'>" . $_SESSION['contact']['send'] . "</div>";
            unset($_SESSION['contact']['send']);
        }
        ?>
    </article>
</section>
