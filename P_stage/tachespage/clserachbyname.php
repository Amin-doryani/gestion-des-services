<?php
require_once('../conndb.php');
$sername = $_GET['sername'];
$clserid = $_GET['clidvar'];
$sql = "SELECT * FROM taches where ids = $clserid and titre like '%$sername%'  limit 8";

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

                    echo '<td><a href="deletetache.php?idt='.$idt.'" id="deleteLink" class="indexicons"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="indexicons" ><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></a>
                    </td>';
                    echo '</tr>';
        
    }
    
}else{
    ?>
    <script>
        thenumis -=1;
    </script>
     <p>Il n'y à plus de données</p>
    <?php
}
?>