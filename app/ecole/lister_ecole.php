<?php
$path = "http://" . $_SERVER['HTTP_HOST'];
?>
	<section id="lister_ecole">
		<aside id="navFlottant">
			<!-- barre de navigation verticale-->
			<nav id="nav-aside">
				<ul id="barreSecondaire">
					<li><a href="<?php echo $path;?>/ecole/">Gestion Ecole</a></li>
					<li><a href="<?php echo $path;?>/encoder_ecole/">Encoder une école</a></li>
					<li><a href="<?php echo $path;?>/modifier_ecole/">Modifier une école</a></li>
					<li><a href="<?php echo $path;?>/supprimer_ecole/">Supprimer une école</a></li>
					<li><a href="<?php echo $path;?>/afficher_ecoles/">Afficher les écoles</a></li>
					<li><a href="<?php echo $path;?>/lister_ecole/">Lister une école</a></li>
				</ul>
			</nav>
		</aside>
		<article>
			<h1>Afficher tous les renseignements d'une école</h1>
			<a href="<?php echo $path;?>/">retour accueil </a>
		</article>
	</section>
