<?php 

require_once '/home/orijit/Travail/PHP/connec.php';


$bdd = new PDO(DSN, USER, PASS);



//$firstname = trim($_POST['firstname']);
//$lastname = trim($_POST['lastname']);





$query = "INSERT INT0 friend(firstname,lastname) VALUES (':firstname', ':lastname')";

$statement = $bdd->prepare($query);

$statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);

$statement->execute();




?>