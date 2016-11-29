<?php
$path = "http://" . $_SERVER['HTTP_HOST'];
?>
<header>
    <figure id="fig_left">
        <img id="logo" src="<?php echo $path;?>/assets/images/logo2.png" alt="logo" border="0">
    </figure>
    <figure id="fig_right">
        <img id="logo" src="<?php echo $path;?>/assets/images/logo2.png" alt="logo" border="0">
    </figure>
    <p id="titreSite">Gestion des Présences</p>
</header>
<nav id="nav-header">
    <ul id="barrePrincipale">
        <li><a href="<?php echo $path;?>/accueil/">Accueil</a></li>
        <li><a href="<?php echo $path;?>/ecole/">Ecoles</a></li>
        <li><a href="<?php echo $path;?>/formation/">Formations</a></li>
        <li><a href="<?php echo $path;?>/etudiant/">Etudiants</a></li>
        <li><a href="<?php echo $path;?>/planification/">Planification</a></li>
        <li><a href="<?php echo $path;?>/contact/">Contact</a></li>
        <?php
        if ( isset($_SESSION) && isset($_SESSION['user']) && $_SESSION['user'] == 'admin' )
        echo "<li><a href=<?php echo $path;?>/admin/'>Admin</a></li>";
        ?>
    </ul>
</nav>