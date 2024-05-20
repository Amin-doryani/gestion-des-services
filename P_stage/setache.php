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
    if (!isset($_GET['serid'])) {
        header('location:index.php');
    }
    $serid = $_GET['serid'];
    
    
?>

<main>

<div id="overlay"></div>



<div id="confirmationDialog">
    <p>Êtes-vous sûr de vouloir supprimer ce tache?</p>
    <p>Nous supprimerons également toutes ses informations</p>
    <div class="dddiv">
    <button id="confirmButton">Oui</button>
    <button id="cancelButton">Annuler</button>
    </div>
</div>
    <div class="tablediv" id='tablediv2'>
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
                <th>QTE</th>
                <th>Montant Total</th>
                <th>Opération</th>
                
            </tr>
            </thead>
            <tbody id='tbodyclinet'>
            <?php 
            $sql = "SELECT * FROM taches where ids = $serid limit 8 ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    $idt = $row['id'];
                    $ids = $row['ids'];
                     $titres = $row['titre'];
                     $dated = $row['date_d'];
                     $datef = $row['date_f'];
                     $qte = $row['qte'];
                     

                     $sql1 = "SELECT nom FROM clients where id in (select idc from services where id = $ids) ";
                     $result1 = $conn->query($sql1);
                     $row1 = $result1->fetch_assoc();
                     $nomc = $row1['nom'];
                     $sql2 = "SELECT sum(montant*qte) as tt FROM taches where id = $idt  ";
                     $result2 = $conn->query($sql2);
                     if ($result2->num_rows > 0){
                        $row2 = $result2->fetch_assoc();
                        if ($row2['tt'] !== null) {
                            $mnt = $row2['tt'];
                        }else{
                            $mnt = '0';
                        }
                     }else{
                        $mnt = '0';
                    }
                     
                    echo '<tr>';
                    echo '<td>'.$titres.'</td>';
                    echo '<td>'.$nomc.'</td>';
                    echo '<td>'.$dated.'</td>';
                    echo '<td>'.$datef.'</td>';
                    echo '<td>'.$qte.'</td>';
                    echo '<td>'.$mnt.' DH</td>';

                    echo '<td><a href="deletetache.php?idt='.$idt.'" id="deleteLink" class="indexicons"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="indexicons" ><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></a></td>';
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
<script src='./javascript/setachejs.js'></script>
<script >
    var pagenum = document.getElementById('numpage').innerHTML;
        var thenumis = parseInt(pagenum,10)
        console.log(thenumis);
        var clservid = <?php echo $serid; ?>;
        var ofsetval = 8;
            $('#morebtn').click(function () {
                
                $.ajax({
                    type:"GET",
                    url : "./tachespage/clgetmore.php",
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
                    url : "./tachespage/clgetless.php",
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
                    url : "./tachespage/clserachbyname.php",
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