<?php
require_once('./conndb.php');
$name = $_POST['name'];
$adress = $_POST['adress'];
$city = $_POST['city'];
$number = $_POST['number'];
$postal = $_POST['postal'];
$note = $_POST['name'];
$sql = "INSERT INTO clients (nom,adresse,ville,code_postal,nemero,note) VALUES ('$name','$name','$city','$number','$postal','$note');";


if ($conn->query($sql) === TRUE) {
    header('location:index.php?ms=1');
  } else {
    echo "Error: " . $sql. "<br>" . $conn->error;
  }


?>