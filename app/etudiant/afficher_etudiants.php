<?php
$path = "http://" . $_SERVER['HTTP_HOST'];
?>

<section id="afficher_etudiant">
	<aside id="navFlottant">
		<!-- barre de navigation verticale-->
		<nav id="nav-aside">
			<ul id="barreSecondaire">
				<li><a href="<?php echo $path;?>/etudiant/">Gestion etudiant</a></li>
				<li><a href="<?php echo $path;?>/encoder_etudiant/">Encoder une étudiant</a></li>
				<li><a href="<?php echo $path;?>/modifier_etudiant/">Modifier une étudiant</a></li>
				<li><a href="<?php echo $path;?>/supprimer_etudiant/">Supprimer une étudiant</a></li>
				<li><a href="<?php echo $path;?>/afficher_etudiants/">Afficher les étudiants</a></li>
				<li><a href="<?php echo $path;?>/lister_etudiant/">Lister une étudiant</a></li>
			</ul>
		</nav>
	</aside>
		<article>
			<h1>Afficher tous les étudiants</h1>
			<a href="<?php echo $path;?>/">retour accueil </a>
		</article>
	</section>