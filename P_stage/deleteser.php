<?php
require_once("./conndb.php");
if (!isset($_GET['id'])) {
    header("location:index.php");
}
$ids = $_GET['id'];
$sql = "DELETE from services where id = $ids";
if ($conn->query($sql) === TRUE) {
    $sql2 = "DELETE from taches where ids = $ids ";
    if ($conn->query($sql2) === TRUE) {
        if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
        
            $previous_page = $_SERVER['HTTP_REFERER'];
            
           
            header("Location: $previous_page");
            exit(); 
        } else {
            
            header("Location: index.php");
            exit();
        }
    }else{
        echo "404";
        echo "<a href='index.php'>HOME PAGE</a>";
    }
}else{
    echo "404";
    echo "<a href='index.php'>HOME PAGE</a>";
}
?>


















if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
        
        $previous_page = $_SERVER['HTTP_REFERER'];
        
       
        header("Location: $previous_page");
        exit(); 
    } else {
        
        header("Location: index.php");
        exit();
    }