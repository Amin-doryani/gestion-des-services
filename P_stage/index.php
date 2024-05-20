<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="./style/indexstyle.css">
</head>
<body>
<?php 
    
    require_once('./nav.php');
    
    
?>

<main>
<div id="overlay"></div>



<div id="confirmationDialog">
    <p>Êtes-vous sûr de vouloir supprimer ce client?</p>
    <p>Nous supprimerons également toutes ses informations</p>
    <div class="dddiv">
    <button id="confirmButton">Oui</button>
    <button id="cancelButton">Annuler</button>
    </div>
</div>




    <div class="btndiv">
        <button id='addclinetbtn'><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"  width="24" class='white'><path fill='currentcolor' d="M720-400v-120H600v-80h120v-120h80v120h120v80H800v120h-80Zm-360-80q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm80-80h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0-80Zm0 400Z"/></svg>Ajouter Clinet</button>
    </div>
    <div class="tablediv">
        <div class='serdiv'>
            <input type="text" name="search" id="serch" placeholder="Recherche par nom">
        </div>
        <table >
            <thead>
            <tr >
                <th>Nom</th>
                <th>Ville</th>
                <th>Adresse</th>
                <th>Numéro de téléphone</th>
                <th>Services fournis</th>
                <th>Opération</th>
                
                
            </tr>
            </thead>
            <tbody id='tbodyclinet'>
            <?php 
            $sql = "SELECT * FROM clients  limit 8 ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    

                    $idc = $row['id'];
                     $nom = $row['nom'];
                     $num = $row['nemero'];
                     $ville = $row['ville'];
                     $adress = $row['adresse'];
                     $sql1 = "SELECT count(*) FROM services where idc = $idc ";
                     $result1 = $conn->query($sql1);
                     $row1 = $result1->fetch_row();
                     $countser = $row1[0];
                     echo '<tr id="thetr" data-variable="'.$idc.'">';
                    echo '<td>'.$nom.'</td>';
                    echo '<td>'.$ville.'</td>';
                    echo '<td>'.$adress.'</td>';
                    echo '<td>'.$num.'</td>';
                    echo '<td>'.$countser.'</td>';
                    echo '<td><a href="ajserv.php?idc='.$idc.'" class="indexicons" title="Ajouter un Service">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v268q-19-9-39-15.5t-41-9.5v-243H200v560h242q3 22 9.5 42t15.5 38H200Zm0-120v40-560 243-3 280Zm80-40h163q3-21 9.5-41t14.5-39H280v80Zm0-160h244q32-30 71.5-50t84.5-27v-3H280v80Zm0-160h400v-80H280v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Zm-20-80h40v-100h100v-40H740v-100h-40v100H600v40h100v100Z"/></svg>
<a href="deletecl.php?id='.$idc.'" id="deleteLink" class="indexicons" ><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="indexicons" ><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></a>
</a>  <a href="clser.php?clid='.$idc.'" title="Voir les services fournis"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg> </a></td> ';

                    echo '</tr>';
        
        }}



            ?>
            
            </tbody>
        </table>
        <div class="tablefoter">
        <button id='lessbtn'><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
            </button>
            <button id='morebtn'>
<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path  d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/></svg>

            </button>
        </div>
        <div class='numcul'>Page :  <span id='numpage'>1 </span></div>
    </div>
</main>
<script src="jquery/jquery-3.7.1.min.js" crossorigin="anonymous" ></script>
<script src='./javascript/indexjs.js'>
    
</script>
<script>
    
    window.onload = function() {
    var div1 = document.getElementById("clients");
    var div2 = document.getElementById("admin");
    var div3 = document.getElementById("services");
    var div4 = document.getElementById("taches");


    div1.classList.add("wearein");
    div2.classList.remove("wearein");
    div3.classList.remove("wearein");
    div4.classList.remove("wearein");

};

</script>
</body>
</html>