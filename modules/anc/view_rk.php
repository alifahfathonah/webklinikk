<?php
  include "../../database.php";

  $id_pemeriksaan = $_POST['id_pemeriksaan'];
  $no_rm = $_POST['no_rm'];
// id_pemeriksaan='$id_pemeriksaan' AND
  $query= mysqli_query($db,"SELECT * FROM anc_det WHERE no_rm='$no_rm'");
  $result=array();

  while($fethdata=$query->fetch_assoc()) {
    $result[]=$fethdata;
  }

  echo json_encode($result);
 ?>
