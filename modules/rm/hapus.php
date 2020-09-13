<?php
include '../../database.php';

$id_detresep = $_POST['id_detresep'];    

mysqli_query($db, "DELETE FROM tmp_detresep WHERE id_detresep='$id_detresep'");    
?>
