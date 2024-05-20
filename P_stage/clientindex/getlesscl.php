<?php
require_once('../conndb.php');
$myoffset = $_GET['myvar'];
$sql = "SELECT * FROM clients limit 8";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idc2 = $row['id'];
        $nom = $row['nom'];
        $num = $row['nemero'];
        $ville = $row['ville'];
        $adress = $row['adresse'];
        $sql1 = "SELECT count(*) FROM services where idc = $idc2 ";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_row();
        $countser = $row1[0];
        echo '<tr id="thetr" data-variable="'.$idc2.'">';
       echo '<td>'.$nom.'</td>';
       echo '<td>'.$ville.'</td>';
       echo '<td>'.$adress.'</td>';
       echo '<td>'.$num.'</td>';
       echo '<td>'.$countser.'</td>';
       echo '<td><a href="ajserv.php?idc='.$idc2.'" class="indexicons" title="Ajouter un Service">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v268q-19-9-39-15.5t-41-9.5v-243H200v560h242q3 22 9.5 42t15.5 38H200Zm0-120v40-560 243-3 280Zm80-40h163q3-21 9.5-41t14.5-39H280v80Zm0-160h244q32-30 71.5-50t84.5-27v-3H280v80Zm0-160h400v-80H280v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Zm-20-80h40v-100h100v-40H740v-100h-40v100H600v40h100v100Z"/></svg>
<a href="deletecl.php?id='.$idc.'" id="deleteLink" class="indexicons" ><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="indexicons" ><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></a>
</a>  <a href="clser.php?clid='.$idc2.'" title="Voir les services fournis"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg> </a></td> ';

       echo '</tr>';
    }
    
}else{
    ?>
    
     <p>Il n'y à plus de données</p>
    <?php
}
?>
