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
    $sql4 = "SELECT * FROM admin where id = 1 ";
    $result4 = $conn->query($sql4);
    if ($result4->num_rows > 0) {
    while ($row4 = $result4->fetch_assoc()) {
        $name = $row4['nom'];
        $num = $row4['numero']; 
        $add = $row4['adresse']; 
        $ville = $row4['ville']; 
        $mail = $row4['mail']; 
        $code = $row4['Code_postal']; 
        $note = $row4['note']; 




    }}
    
    
    
    
    
    
    
    
?>

<main>
    <div class='divmain'>
        <form action="mdadmin.php" method="post">
            <div class='headerdiv'> <h3>Admin</h3></div>
            <div class='formdiv'>
                <div class='fd1'>
                    <input type="text" name='name' id='name' placeholder="Nom" value="<?php if (isset($name)) {
        echo $name;
    } ?>">
                    <input type="text" name='adress' id='adress' placeholder="adresse (optionnel) " value="<?php if (isset($add)) {
        echo $add;
    }?>">
                    <input type="text" name='number' id='number' placeholder="Numéro de téléphone " value="<?php if (isset($num)) {
        echo $num;
    }?>">
                    <input type="text" name='ville' id='ville' placeholder="Ville" value="<?php if (isset($ville)) {
        echo $ville;
    }?>">
                    <input type="text" name='code' id='code' placeholder="Code postal" value="34000" value="<?php if (isset($code)) {
        echo $code;
    }?>">


                    

                    <input type="text" name='email' id='email' placeholder='mail' value = "<?php if (isset($mail)) {
        echo $mail;
    }?>">


                </div>
                <div class='fd2'>
                <textarea type='text 'name="note" id="note" cols="30" rows="10" placeholder='note' ><?php if (isset($note)) {
        echo $note;
    }?></textarea>
                </div>
            </div>
            <div class='btndiv'><button type="submit">Modifier</button></div>
        </form>
    </div>
</main>
<script>
    window.onload = function() {
    var div2= document.getElementById("clients");
    var div1 = document.getElementById("admin");
    var div3 = document.getElementById("services");
    var div4= document.getElementById("taches");

    
    div1.classList.add("wearein");
    div2.classList.remove("wearein");
    div3.classList.remove("wearein");
    div4.classList.remove("wearein");

};
</script>
</body>
</html>