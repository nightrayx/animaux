<?php 

$pdo = new PDO('mysql:host=localhost; dbname=animaux', 'visiteur', 'root');

function add($nom, $type) {
    global $pdo;
    $add = $pdo->prepare("INSERT INTO animaux.chien(`nom`,`type`) VALUE(?,?)");
    $add->bindParam(1,$nom);
    $add->bindParam(2,$type);
    $add->execute();
}


function select() {
    global $pdo;
    $select = $pdo->query('SELECT * FROM animaux.chien');
    $select = $select->fetchAll(PDO::FETCH_OBJ);  
    return $select;
            }
$chien = select();

 if(isset($_REQUEST['nom']) && isset($_REQUEST['type']) && !empty($_REQUEST['nom']) && !empty($_REQUEST['type']) )  {
    $nom = $_REQUEST['nom'];
    $type = $_REQUEST['type']; 
    add($nom, $type);
    $chien = select();
}

?>