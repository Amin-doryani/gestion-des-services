<?php 
require_once("./conndb.php");
if (!isset($_GET['id'])) {
    header("location:index.php");
}
$idt = $_GET['idt'];
$sql = "DELETE from taches where id = $idt";
if ($conn->query($sql) === TRUE){
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



?>