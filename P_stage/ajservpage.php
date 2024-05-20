<?php
require_once('./conndb.php');
$idc = $_GET['idcc'];
$titre = $_POST['titre'];
$adress = $_POST['adress'];
$dated = $_POST['dated'];
$datef = $_POST['datef'];
$note = $_POST['note'];

$sql = "INSERT INTO services (titre,adresse,date_d,date_f,idc,note) VALUES ('$titre','$adress','$dated','$datef','$idc','$note');";


if ($conn->query($sql) === TRUE) {
    header('location:index.php?ms=1');
  } else {
    echo "Error: " . $sql. "<br>" . $conn->error;
  }


?>