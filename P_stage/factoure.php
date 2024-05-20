<?php 
$ids = $_GET['id'];
require_once('./conndb.php');
### ADMIN INFOS ###
$sql = "SELECT * FROM admin ";
$result = $conn -> query($sql);
$row = $result->fetch_assoc();
$nom = $row['nom'];
$ville = $row['ville'];
$adrr = $row['adresse'];
$mail = $row['mail'];
$numero = $row['numero'];

### SERVICE INFOS ###
$sql1 = "SELECT * FROM services where id = $ids";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $idc = $row1['idc'];
            $dated = $row1['date_d'];
            $datef = $row1['date_f'];

       
}}




 ### CLIENT INFOS###
$sql3 = "SELECT * from clients where id = $idc";
$result3 = $conn ->query($sql3);
$result3 = $conn -> query($sql3);
$row3 = $result3->fetch_assoc();
$nomc = $row3["nom"];
$adrrc = $row3['adresse'];
$currentDateTime = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style/factoure.css"> -->
  <title>Factoure</title>
  <link rel="stylesheet" href="style/factoure.css">
    
    
</head>
<body>
    

<header>
    <h1><?php echo $nom;?></h1>
    <h1>Factoure</h1>
</header>

<main>
    <div class="div1">
        <h2>Factore a</h2>
        <p><?php echo $nom;?></p>
        <p><?php echo $ville;?></p>
        <p><?php echo $adrr;?></p>
        <p><?php echo $numero;?></p>
        <p><?php echo $mail;?></p>
        
    </div>
    <div class="div1">
        <h2>Envoye a</h2>
        <p><?php echo $nomc;?></p>
        <p><?php echo $adrrc;?></p>
    </div>
    <div class="div1">
        <h1></h1>
        <p>DATE : <?php echo $currentDateTime;?></p>
        <p>DATE Debut : <?php echo $dated;?></p>
        <p>DATE Fin : <?php echo $datef;?></p>
    </div>
</main>
<div class="tbdiv">
<table >
            <thead>
            <tr >
                <th>QTE</th>
                <th>DESIGNATION</th>
                <th>PRIX UNIT</th>
                <th>MONTANT</th>
                
                
                
            </tr>
            </thead>
            <tbody id='tbodyclinet'>
            
            
                <?php 
                ### TAHCES INFOS ###
                $mntotal = 0;
                $sql2 = "SELECT * FROM taches where ids = $ids";
                $result2 = $conn ->query($sql2);
                if ($result2 ->num_rows >0) {
                    while ($row2 = $result2 -> fetch_assoc()) {
                       $titre = $row2['titre'];
                       $qte = $row2['qte'];
                       $mnt = $row2['montant'];
                       $mntache = $qte *$mnt;
                       $mntotal += $mntache;
                       echo "<tr >";
                       echo "<td>".$qte."</td>";
                       echo "<td>".$titre."</td>";
                       echo "<td>".$mnt."</td>";
                       echo "<td>".$mntache."</td>";
                       echo "<tr >";


                    }
                }
                ?>
                
                
                
                
           
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="tt2"><h2>TOTAL</h2></td>
                    <td class="total"><?php echo $mntotal; ?> DH</td>
                </tr>
            </tfoot>
        </table>
</div>
</body>
</html>