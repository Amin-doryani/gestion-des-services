<?php
require_once('../conndb.php');
$sername = $_GET['sername'];
$clserid = $_GET['clidvar'];
$sql = "SELECT * FROM services where idc = $clserid and titre like '%$sername%'  limit 8";
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
    }
    
}else{
    ?>
    <script>

    </script>
    
     <p>Aucun résultat</p>
    <?php
}
?>