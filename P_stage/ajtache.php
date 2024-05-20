<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Client</title>
    <link rel="stylesheet" href="./style/addclientstyle.css">
</head>
<body>
<?php 
    
    require_once('./nav.php');
    if (!$_GET['ids']) {
        header('location:index.php');
    }
    $ids = $_GET['ids'];
    $sql3 = "SELECT idc FROM services where id = $ids";
    $result3 = $conn->query($sql3);
    if ($result3->num_rows > 0) {
        while ($row3 = $result3->fetch_assoc()) {
        $idcc =  $row3['idc'];
       
    }}
    $sql2 = " SELECT *  FROM clients where id = $idcc "; 
    $result2 = $conn->query($sql2);
    
    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
        $namecc =  $row2['nom'];
        $nemero = $row2['nemero'];
    }}
    
?>

<main>
    <div class='divmain'>
        <form action="ajtachepage.php?ids=<?php echo $ids; ?>" method="post">
            <div class='headerdiv'> <h3>Ajouter un tache pour service id : <span> <?php echo $ids; ?> </span> ## Client <span>  <?php echo $namecc.' || '.$nemero; ?>   </span></h3></div>
            <div class='formdiv'>
                <div class='fd1'>
                    <input type="text" name='titre' id='titre' placeholder="Titre" >
                    <input type="date" name="dated" id="dated">
                    <input type="date" name="datef" id="datef">
                    

                    <input type="number" name='qte' id='qte' placeholder="Quantité" onchange="qtechanged()">
                    
                    <input type="number" name='montant' id='montant' placeholder="montant par unité (DH)" onchange="qtechanged()">
                    <input type="text"  id='total' value="Montant total : 0 DH" readonly>


                    
                    
                </div>
                <div class='fd2'>
                <textarea type='text 'name="note" id="note" cols="30" rows="10" placeholder='note'></textarea>
                </div>
            </div>
            <div class='btndiv'><button type="submit">Ajouter</button></div>
        </form>
    </div>
</main>
<script src="./javascript/ajtachejs.js">

</script>
</body>
</html>