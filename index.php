<?php
    require_once '/home/orijit/Travail/PHP/connec.php';

    $bdd = new PDO(DSN, USER, PASS);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php 

require_once '/home/orijit/Travail/PHP/connec.php';


$bdd = new PDO(DSN, USER, PASS);
 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


$longFirstName = strlen($_POST['firstname']);
$longLastName = strlen($_POST['lastname']);


  if(empty($_POST['firstname'] or $longFirstName > 45 )){
    echo "rentrer un firstname </br>";
}else{
 $firstname = test_input($_POST['firstname']);
}

if(empty($_POST['lastname'] or $longLastName > 45)){
    echo "rentrer un lastname </br>";
}else{
 $lastname = test_input($_POST['lastname']);
}


$query=" INSERT INTO friend(firstname,lastname) VALUES(:firstname,:lastname)";
$statement = $bdd->prepare($query);

$statement->bindValue(":firstname",$firstname,PDO::PARAM_STR);
$statement->bindValue(":lastname",$lastname,PDO::PARAM_STR);

$statement->execute();





?>

<form action="index.php" method="post">
    <div>
        <label for="firstname">Firstname :</label>
        <input type="text" id="firstname" name="firstname">
    </div>

    <div>
        <label for="lastname">Lastname :</label>
        <input type="text" id="lastname" name="lastname">
    </div>

    <input type="submit" value="Go">

    </form>

</br>

    <?php

    $query = "SELECT * FROM friend";
    $statement2 = $bdd->query($query);
    $friends = $statement2->fetchAll();

    

    foreach ($friends as $friend)
    {
        echo $friend['firstname'] ."</br>";
    }

    ?>

</form>    
</body>
</html>