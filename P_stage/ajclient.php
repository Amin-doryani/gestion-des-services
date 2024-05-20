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
    
    
?>

<main>
    <div class='divmain'>
        <form action="ajclientpage.php" method="post">
            <div class='headerdiv'> <h3>Ajouter un Client</h3></div>
            <div class='formdiv'>
                <div class='fd1'>
                    <input type="text" name='name' id='name' placeholder="Nom">
                    <input type="text" name='adress' id='adress' placeholder="Adresse (optionnel)">
                    <input type="text" name='number' id='number' placeholder="Numéro de téléphone (optionnel)">
                    <input type="text" name='city' id='city' placeholder="ville (optionnel)">
                    <input type="text" name='postal' id='postal' placeholder='code postal(optionnel)'>

                </div>
                <div class='fd2'>
                <textarea type='text 'name="note" id="note" cols="30" rows="10" placeholder='note(optionnel)'></textarea>
                </div>
            </div>
            <div class='btndiv'><button type="submit">Ajouter</button></div>
        </form>
    </div>
</main>
</body>
</html>