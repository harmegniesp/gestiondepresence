<?php
// autoloader pour les classes sans annotation ORM
require_once 'autoloader.php'; // récupérer l'autoloader ...
try {
    $root = dirname(__FILE__);
    $cache = $root."./cache"; // définir un dossier pour le cache
    $dir_search1 = $root."./dao"; // idem
    $dir_search2 = $root."./phpmailer"; // idem
    $dir_search3 = $root."./entities"; // idem
    $dir_search4 = $root."./entitiesDao"; // idem
    $dir_search5 = $root."./entitiesTools"; // idem


    $autoloader = DirectoriesAutoloader::instance ($cache)
        ->addDirectory($dir_search1,true)
        ->addDirectory($dir_search1,true)
        ->addDirectory ($dir_search3,true)
        ->addDirectory ($dir_search4,true)
        ->addDirectory ($dir_search5,true);
    // spécifier les différents dossiers à parcourir, true = on analyse toute l'arborescence (sous-dossiers compris)
    spl_autoload_register (array ($autoloader, 'autoload')); //api spl
}
catch (DirectoriesAutoloaderException $e){
echo $e->getMessage();
}
$isDevMode = true;
?>