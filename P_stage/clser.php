<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="./style/indexstyle.css">
    <link rel="stylesheet" href="./style/clserstyle.css">

</head>
<body>
<?php 
    
    require_once('./nav.php');
    if (!isset($_GET['clid'])) {
        header('location:index.php');
    }
    
    
    
    
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
    <div class="tablediv" id='tabledivclser'>
        <div class="ftsdiv">
        <table >
            <thead>
            <tr >
                <th>Client</th>
                <th>Ville</th>
                <th>Nemero</th>
                
            </tr>
            </thead>
            <tbody>
                <?php 
                $theclserid = $_GET['clid'];
                $sqlcl = "SELECT * from clients where id = $theclserid ";
                $resultcl = $conn->query($sqlcl);
                if ($resultcl->num_rows > 0) {
                    while($rowcl = $resultcl ->fetch_assoc()){
                        $nomcl = $rowcl['nom'];
                        $villecl = $rowcl['ville'];
                        $numcl = $rowcl['nemero'];
                        echo "<tr>";
                        echo "<td>".$nomcl."</td>";
                        echo "<td>".$villecl."</td>";
                        echo "<td>".$numcl."</td>";

                    }
                }

                ?>
            </tbody>
</table>
        </div>
        <div class='serdiv'>
            <input type="text" name="search" id="serch" placeholder="Recherche par titre">
        </div>
        <table >
            <thead>
            <tr >
                <th>Titre</th>
                <th>Client</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Total(DH)</th>
                <th>Opération</th>
                
            </tr>
            </thead>
            <tbody id='tbodyclinet'>
            <?php 
            $sql = "SELECT * FROM services where idc = $theclserid  limit 8 ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    

                    $ids = $row['id'];
                     $titres = $row['titre'];
                     $dated = $row['date_d'];
                     $datef = $row['date_f'];
                     $idcs = $row['idc'];
                     $sql1 = "SELECT nom FROM clients where id = $idcs ";
                     $result1 = $conn->query($sql1);
                     $row1 = $result1->fetch_assoc();
                     $nomc = $row1['nom'];
                     $sql2 = "SELECT sum(montant*qte) as tt FROM taches where ids = $ids Group by ids ";
                     $result2 = $conn->query($sql2);
                     if ($result2->num_rows > 0){
                        $row2 = $result2->fetch_assoc();
                        if ($row2['tt'] !== null) {
                            $mnt = $row2['tt'];
                        }else{
                            $mnt = 'Pas de tâches ajoutées';
                        }
                     }else{
                        $mnt = 'Pas de tâches ajoutées';
                    }
                     
                    echo '<tr>';
                    echo '<td>'.$titres.'</td>';
                    echo '<td>'.$nomc.'</td>';
                    echo '<td>'.$dated.'</td>';
                    echo '<td>'.$datef.'</td>';
                    echo '<td>'.$mnt.'</td>';
                    echo '<td>
                    <a href="ajtache.php?ids='.$ids.'" class="indexicons" title="Ajouter une tâche">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v268q-19-9-39-15.5t-41-9.5v-243H200v560h242q3 22 9.5 42t15.5 38H200Zm0-120v40-560 243-3 280Zm80-40h163q3-21 9.5-41t14.5-39H280v80Zm0-160h244q32-30 71.5-50t84.5-27v-3H280v80Zm0-160h400v-80H280v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Zm-20-80h40v-100h100v-40H740v-100h-40v100H600v40h100v100Z"/></svg>
                    </a></a>  <a href="setache.php?serid='.$ids.'" class="indexicons" title="Voir les services fournis"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg> </a><a href="#" class="indexicons" title="Imprimer">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M640-640v-120H320v120h-80v-200h480v200h-80Zm-480 80h640-640Zm560 100q17 0 28.5-11.5T760-500q0-17-11.5-28.5T720-540q-17 0-28.5 11.5T680-500q0 17 11.5 28.5T720-460Zm-80 260v-160H320v160h320Zm80 80H240v-160H80v-240q0-51 35-85.5t85-34.5h560q51 0 85.5 34.5T880-520v240H720v160Zm80-240v-160q0-17-11.5-28.5T760-560H200q-17 0-28.5 11.5T160-520v160h80v-80h480v80h80Z"/></svg>
                    </a><a href="deleteser.php?id='.$ids.'" id="deleteLink" class="indexicons"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="indexicons"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"></path></svg></a></td>';
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
<script >
    var pagenum = document.getElementById('numpage').innerHTML;
        var thenumis = parseInt(pagenum,10)
        console.log(thenumis);
        var clservid = <?php echo $theclserid; ?>;
        var ofsetval = 8;
            $('#morebtn').click(function () {
                
                $.ajax({
                    type:"GET",
                    url : "./servindex/clgetmore.php",
                    data : {myvar : ofsetval,clidvar : clservid},
                    dataType : "html",
                    success : function(data){
                        const $tbodyclinet = $('#tbodyclinet');
                        $tbodyclinet.html(data);
                        thenumis +=1;
                        const $numpageis = $('#numpage');
                        $numpageis.html(thenumis)
                        const deleteLinks = document.querySelectorAll('#deleteLink');
                        deleteLinks.forEach(function(link) {
                            link.addEventListener('click', function(event) {
                               
                                event.preventDefault();
                                
                                
                                overlay.style.display = 'block';
                                confirmationDialog.style.display = 'flex';
                            });
                        });
                    }
                });
                ofsetval += 7;
                
                
            });
            $('#lessbtn').click(function () {
                
                $.ajax({
                    type:"GET",
                    url : "./servindex/clgetless.php",
                    data : {myvar : ofsetval,clidvar : clservid},
                    dataType : "html",
                    success : function(data){
                        const $tbodyclinet = $('#tbodyclinet');
                        $tbodyclinet.html(data);
                        thenumis =1;
                        const $numpageis = $('#numpage');
                        $numpageis.html(thenumis)
                        const deleteLinks = document.querySelectorAll('#deleteLink');
                        deleteLinks.forEach(function(link) {
                            link.addEventListener('click', function(event) {
                               
                                event.preventDefault();
                                
                                
                                overlay.style.display = 'block';
                                confirmationDialog.style.display = 'flex';
                            });
                        });
                    }
                });
                ofsetval = 8;
                
                
            });


            $('#serch').on('input' ,function () {
                const inputval = $(this).val();
                $.ajax({
                    type:"get",
                    url : "./servindex/clserachbyname.php",
                    data : {sername : inputval,clidvar : clservid},
                    dataType : "html",
                    success : function(data){
                        const $tbodycline = $('#tbodyclinet');
                        $tbodycline.html(data);
                        thenumis =1;
                        const $numpageis = $('#numpage');
                        $numpageis.html(thenumis)
                        const deleteLinks = document.querySelectorAll('#deleteLink');
                        deleteLinks.forEach(function(link) {
                            link.addEventListener('click', function(event) {
                               
                                event.preventDefault();
                                
                                
                                overlay.style.display = 'block';
                                confirmationDialog.style.display = 'flex';
                            });
                        });
                    }
                });
            
            });
            const overlay = document.getElementById('overlay');
const confirmationDialog = document.getElementById('confirmationDialog');
const confirmButton = document.getElementById('confirmButton');
const cancelButton = document.getElementById('cancelButton');
const deleteLink = document.getElementById('deleteLink');


const deleteLinks = document.querySelectorAll('#deleteLink');


deleteLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
       
        event.preventDefault();
        
        
        overlay.style.display = 'block';
        confirmationDialog.style.display = 'flex';
    });
});


confirmButton.addEventListener('click', function() {
    overlay.style.display = 'none';
    confirmationDialog.style.display = 'none';
    window.location.href = deleteLink.href;
});


cancelButton.addEventListener('click', function() {
    
    overlay.style.display = 'none';
    confirmationDialog.style.display = 'none';
});


</script>


</body>
</html>