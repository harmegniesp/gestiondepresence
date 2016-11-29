<?php
declare(strict_types=1);
session_start();
require_once('bootstrap.php');
$path = "http://" . $_SERVER['HTTP_HOST'];

//$_SESSION['user'] = 'admin';
// tester les variables GET ...
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Gestion des Présences</title>
	<meta name="description" content="gérer les présences des étudiants dans nos formations">
	<meta name="keywords" content="école,formation,étudiant,cours,promotion sociale">
	<meta name="author" content="harmegnies">
	<meta name="robots" content="nofollow,noindex">

	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
	<meta http-equiv="Expires" content="Thu, 01 Jan 1970 00:00:00 GMT" />
	<!-- voir avec html5 gestion du cache -->
	
	<script src="<?php echo $path;?>/assets/js/jquery-1.12.0.js" type="text/javascript"></script>
	<script src="<?php echo $path;?>/assets/js/gestionCookies.js" type="text/javascript"></script>
	<script src="<?php echo $path;?>/assets/js/validation.js" type="text/javascript"></script>

	<script type="text/javascript">
	function fct_demarrage(){
	document.getElementById('accueil').style.display = "block";
	</script>

	<link href="<?php echo $path;?>/assets/css/reset.css" type="text/css" rel="stylesheet">
	<link href="<?php echo $path;?>/assets/css/styles_base.css" type="text/css" rel="stylesheet">
	<link href="<?php echo $path;?>/assets/css/styles_maquette.css" type="text/css" rel="stylesheet">
	<link href="<?php echo $path;?>/assets/css/styles_cookies.css" type="text/css" rel="stylesheet">
	<style type="text/css">
	</style>
</head>
<body>
<!--
<div id="divCookie">
<p style="padding:10px;font-size:16px;">acceptez-vous les cookies?
&nbsp;
<a href="#" onclick="fct_Gcookie('oui');">oui, j'accepte.</a>
&nbsp;
<a href="#" onclick="fct_Gcookie('non');">non, je n'accepte pas.</a>
</p>
</div>
-->
<main>
	<?php include("app/header.php"); ?>
<!-- ***************************************************** -->
<section id='bodyMain'>
<!-- ***************************************************** -->

<?php
// navigation dans le site
// à vérifier ...
$tab_nav = ['accueil',
		'ecole','encoder_ecole','modifier_ecole','supprimer_ecole','afficher_ecoles','lister_ecole',
		'formation','encoder_formation','modifier_formation','supprimer_formation','afficher_formations','lister_formation',
		'etudiant','encoder_etudiant','modifier_etudiant','supprimer_etudiant','afficher_etudiants','lister_etudiant',
		'planification',
		'contact',
		'admin',
		'newsletter'];
// vérifier la variable get transmise
if ( !isset($_GET['action']) ){
	include("app/accueil.php");
}
elseif ( !preg_match("/^[a-z\_0-9]+$/i",strtolower($_GET['action'])) ) {
	include("app/accueil.php");
}
elseif( !in_array( strtolower($_GET['action']),$tab_nav) )
	include("app/accueil.php");
else {
	if ($_GET['action'] == 'accueil')
		include("app/accueil.php");
//*****************************************************
// partie Ecole

	if ($_GET['action'] == 'ecole')
		include("app/ecole.php");
	if ($_GET['action'] == 'encoder_ecole')
		include("app/ecole/encoder_ecole.php");
	if ($_GET['action'] == 'modifier_ecole')
		include("app/ecole/modifier_ecole.php");
	if ($_GET['action'] == 'supprimer_ecole')
		include("app/ecole/supprimer_ecole.php");
	if ($_GET['action'] == 'afficher_ecoles')
		include("app/ecole/afficher_ecoles.php");
	if ($_GET['action'] == 'lister_ecole')
		include("app/ecole/lister_ecole.php");

// *****************************************************
// partie Formation

	if ($_GET['action'] == 'formation')
		include("app/formation.php");

	if ($_GET['action'] == 'encoder_formation')
		include("app/formation/encoder_formation.php");
	if ($_GET['action'] == 'modifier_formation')
		include("app/formation/modifier_formation.php");
	if ($_GET['action'] == 'supprimer_formation')
		include("app/formation/supprimer_formation.php");
	if ($_GET['action'] == 'afficher_formations')
		include("app/formation/afficher_formations.php");
	if ($_GET['action'] == 'lister_formation')
		include("app/formation/lister_formation.php");

// *****************************************************
// partie Etudiant

	if ($_GET['action'] == 'etudiant')
		include("app/etudiant.php");
	if ($_GET['action'] == 'encoder_etudiant')
		include("app/etudiant/encoder_etudiant.php");
	if ($_GET['action'] == 'modifier_etudiant')
		include("app/etudiant/modifier_etudiant.php");
	if ($_GET['action'] == 'supprimer_etudiant')
		include("app/etudiant/supprimer_etudiant.php");
	if ($_GET['action'] == 'afficher_etudiants')
		include("app/etudiant/afficher_etudiants.php");
	if ($_GET['action'] == 'lister_etudiant')
		include("app/etudiant/lister_etudiant.php");

// *****************************************************
// partie Planification

	if ($_GET['action'] == 'planification')
		include("app/planification.php");

// *****************************************************
// partie Contact

	if ($_GET['action'] == 'contact')
		include("app/contact.php");

// *****************************************************
// partie Admin uniquement si administrateur

	if ($_GET['action'] == 'admin')
		include("app/admin.php");

// *****************************************************
// section pour la newsLetter

	if ($_GET['action'] == 'newsletter')
		include("app/newsletter.php");
}
// *****************************************************
?>
</section>
<!-- ***************************************************** -->
	<?php
	include("app/footer.php");
	?>
</main>
</body>
<script>
	// au chargement de la page
	$( document ).ready(function() {
        console.log( "document loaded" );
		// différence avec l'événement onload sur la balise body
		// exécutera les fonctions après chargement des objets de la page
		fct_demarrage();
		//testerCookie();
    });
</script>
</html>
