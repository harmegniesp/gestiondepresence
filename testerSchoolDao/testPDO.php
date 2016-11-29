<?php
//tester mon singleton
// illustration des différentes possibilités pour l'objet PDO




require_once("../bootstrap.php");
$dsn = "mysql:host=localhost;dbname=gestiondepresence;port=3306";
$user= "root";
$password =  "";

$mypdo = null;
$pdo = null;
try {

    \dao\MyPdo::setParameters($dsn,$user,$password);
    $mypdo = \dao\MyPdo::getInstanceSingleton();
    $pdo = $mypdo->getPdo();

    //insert de record dans la table school
    /*CREATE TABLE `school` (
    `id` int(11) NOT NULL,
    `name` varchar(100) NOT NULL,
    `codeSchool` varchar(50) NOT NULL,
     `phone` varchar(50) NOT NULL,
    `address` varchar(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;*/

    //forcer en utf-8
    $pdo->exec("SET NAMES 'UTF8';");

    //1: statement

    $sqlInsert="INSERT INTO school VALUES (null,
                                            'Promsoc',
                                            'DFR',
                                            '065758596',
                                            'Rue De la fontaire
                                            7000 Mons');";

    $result=$pdo->exec($sqlInsert);
    print_r($result);         // retourne 1

    //2: preparedStatement

    $sqlinsert2="INSERT INTO school VALUES (null,
                                            :name,
                                            :codeSchool,
                                            :phone,
                                            :address);";

    $pst=$pdo->prepare($sqlinsert2);
    $pst->bindValue('name','Promsoc',\PDO::PARAM_STR);
    $pst->bindValue('codeSchool','edgfrs',\PDO::PARAM_STR);
    $pst->bindValue('phone','06554521',\PDO::PARAM_STR);
    $pst->bindValue('address','rue de la pépinière',\PDO::PARAM_STR);

    $pst->execute();

    //3: prepare Statement en utilisant un objet School

    $school = new entities\School();
    $tabSchool = array("name"=>"Ecole","codeSchool"=>"545","phone"=>"065545121","address"=>"rue de la guerre");
    $school->hydrate($tabSchool);
    $pst->bindValue('name',$school->getName(),\PDO::PARAM_STR);
    $pst->bindValue('codeSchool',$school->getCodeSchool(),\PDO::PARAM_STR);
    $pst->bindValue('phone',$school->getPhone(),\PDO::PARAM_STR);
    $pst->bindValue('address',$school->getAddress(),\PDO::PARAM_STR);

    $pst->execute();

    //id=0 par défaut dans la classe
    $id=$pdo->lastInsertId();
    //id=le last id récupéré depuis mysql
    $school->setId((int)$id);
    //caster la variable pour éviter des erreurs
    //ou utiliser la fonction intval() returne 0 si il ne sait pas convertir
    var_dump($school);

    //4: utilisation d'une classe Dao

    $school = new entities\School();
    $tabSchool = array("name"=>"IRAM","codeSchool"=>"UTF-ecole","phone"=>"065541123245","address"=>"rue de Binche");
    $school->hydrate($tabSchool);

    $schoolDao= new entitiesDao\SchoolDao($pdo);
    $schoolDao->insert($school);
}
catch (\Exception $e){
    echo $e->getMessage();
}






?>