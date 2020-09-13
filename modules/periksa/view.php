<?php
include "../../database.php";

$id_resep = $_POST['id_resep'];

$query= mysqli_query($db,"SELECT tmp_detresep.*,obat.nama_obat,obat.satuan FROM tmp_detresep JOIN obat ON tmp_detresep.kd_obat=obat.kd_obat WHERE tmp_detresep.id_resep='$id_resep'");
$result=array();

while($fethdata=$query->fetch_assoc()) {
	$result[]=$fethdata;
}

echo json_encode($result);
?>
