<?php
$path = "http://" . $_SERVER['HTTP_HOST'];
// définir les paramètres de positionnement et la valeur du groupe
// à externaliser
$dsn = "mysql:host=localhost;dbname=gestiondepresence3b;port=3306";
$user= "root";
$password =  "";

// les variables pour la pagination
$page = 0;
$group = 1; // nombre d'enregistrements par page
$pages = 0;

// récupérer la variable get page si elle existe
if ( isset($_GET['page']) )
	$page = intval($_GET['page']);


// utiliser le singleton, les variables pour la connexion DB avec PDO
$mypdo = null;
$pdo = null;
$schoolDao = null;
$arrayCollection = new \entitiesTools\ArrayCollection();
$nbrecords = 0;
try {

\dao\MyPdo::setParameters($dsn,$user,$password);
$mypdo = \dao\MyPdo::getInstanceSingleton();
$pdo = $mypdo->getPdo();


// créer une instance de la classe SchoolDao en lui passant un objet pdo pour la connexion DB
$schoolDao = new \entitiesDao\SchoolDao($pdo);

// récupérer le nombre total d'enregistrements table school
$nbrecords = $schoolDao->nbRecords();
// calculer le nombre total de pages à afficher
$pages = ceil($nbrecords/$group);

// tester la valeur page pour les limites de l'affichage
	if ( $page < 0 )
		$page = 0;
	if ( $page >= $pages )
		$page = $pages-1;

// récupérer un groupe d'enrtegistrements avec LIMIT
$arrayCollection = $schoolDao->findWithLimit($page*$group,$group);
	// arrayCollection d'objets School

}
catch (\Exception $e){
	//echo $e->getMessage();
	$_SESSION['ecole']['error'] = $e->getMessage();
}

?>
	<section id="afficher_ecole">
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
			<h1>Afficher toutes les écoles</h1>
			<a href="<?php echo $path;?>/">retour accueil </a>

			<?php
			// afficher les différentes écoles
			if ( $arrayCollection->isEmpty() ){
				echo "<p> problème avec l'affichage des différentes écoles </p>";

				// afficher les erreurs pdo
				if (isset($_SESSION['ecole']['error']))
				echo "<p>" . $_SESSION['ecole']['error']. "</p>";
				unset($_SESSION['ecole']['error']);
			}
			else
			{
				// afficher les différentes écoles School en rapport avec la variable $group
				foreach ($arrayCollection->getArray() as $school){
					// $value contient des objets type School
					echo "<div style='margin-top:20px'>";
					echo "Id : " . $school->getId() . "<br>";
					echo "Nom de l'école : " . $school->getName() . "<br>";
					echo "matricule : " . $school->getCodeSchool() . "<br>";
					echo "téléphone : " . $school->getPhone() . "<br>";
					echo "adresse : " . $school->getAddress();
					echo "<hr width='200'>";
					echo "</div>";

				}

				// barre de navigation
				echo "<div id='navigation'>";

				echo "vous êtes à la page " . ($page+1) . " sur un total de " . $pages . " pages.<br><br>";

				echo "<a href='" . $path . "/afficher_ecoles/0/'>début</a>";

				echo "&nbsp;&nbsp;";

				echo "<a href='" . $path . "/afficher_ecoles/" . ($page-1) . "/'>précédent</a>";

				echo "&nbsp;&nbsp;";

				echo "<a href='" . $path . "/afficher_ecoles/" . ($page+1) . "/'>suivant</a>";

				echo "&nbsp;&nbsp;";

				echo "<a href='" . $path . "/afficher_ecoles/" . ($pages-1) . "/'>fin</a>";

				echo "</div>";

			}
			?>
		</article>
	</section>

