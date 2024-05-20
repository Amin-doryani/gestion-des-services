<?php
require_once('./conndb.php');
$nom= $_POST['name'];
$adress = $_POST['adress'];
$number = $_POST['number'];
$ville = $_POST['ville'];
$code = $_POST['code'];
$email = $_POST['email'];
$note = $_POST['note'];


$sql = "UPDATE `admin` SET `nom` = '$nom', `numero` = '$number', `adresse` = '$adress', `ville` = '$ville', `mail` = '$email', `Code_postal` = '$code', `note` = '$note' WHERE `admin`.`id` = 1";


if ($conn->query($sql) === TRUE) {
    header('location:admin.php');
  } else {
    echo "Error: " . $sql. "<br>" . $conn->error;
  }


?>