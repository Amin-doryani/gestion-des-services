<?php
require_once("./conndb.php");


if (!isset($_GET['id'])) {
    header("location:index.php");
    exit(); 
}

$idc = $_GET['id'];


$sql = "DELETE FROM clients WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idc);
if ($stmt->execute()) {
    
    $sql1 = "DELETE FROM taches WHERE ids IN (SELECT id FROM services WHERE idc = ?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("i", $idc);
    if ($stmt1->execute()) {
        $sql2 = "DELETE FROM services WHERE idc = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $idc);
        if ($stmt2->execute()) {
            
            $redirect_page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "index.php";
            header("Location: $redirect_page");
            exit();
        } else {
            
            header("Location: index.php");
            exit();
        }
    } else {
        
        header("Location: index.php");
        exit();
    }
} else {
    
    echo "Error deleting client.";
    echo "<a href='index.php'>HOME PAGE</a>";
    exit();
}
?>
