<?php
require_once('./conndb.php');
$ids = $_GET['ids'];
$titre = $_POST['titre'];
$dated = $_POST['dated'];
$datef = $_POST['datef'];
$qte = $_POST['qte'];
$montant = $_POST['montant'];
$note = $_POST['note'];

$sql = "INSERT INTO taches (titre,date_d,date_f,qte,montant,note,ids) VALUES ('$titre','$dated','$datef',$qte,$montant,'$note',$ids);";


if ($conn->query($sql) === TRUE) {
    header('location:index.php');
  } else {
    echo "Error: " . $sql. "<br>" . $conn->error;
  }


?>