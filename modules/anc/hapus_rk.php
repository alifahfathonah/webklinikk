<?php
    include '../../database.php';

    $id_detanc = $_POST['id_detanc'];    

    mysqli_query($db, "DELETE FROM anc_det WHERE id_detanc='$id_detanc'");    
 ?>
