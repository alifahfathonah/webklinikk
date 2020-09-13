<?php
include "../../database.php";


$tgl_daftar = $_POST['tgl_daftar'];
$jm_daftar = $_POST['jm_daftar'];
$id_bidan = $_POST['id_bidan'];

$query= mysqli_query($db,"SELECT jad_bid.id_bidan,jad_bid.hari,jad_bid.waktu_mulai,jad_bid.waktu_selesai,bidan.nama FROM jad_bid JOIN bidan ON jad_bid.id_bidan=bidan.id_bidan AND jad_bid.id_bidan != '$id_bidan' WHERE jad_bid.hari='$tgl_daftar' AND '$jm_daftar' BETWEEN jad_bid.waktu_mulai AND jad_bid.waktu_selesai"); 
$result=array();

while($fethdata=$query->fetch_assoc()) {
	$datajad[]=$fethdata;	
}

$sql1  = "SELECT max(no_antrian) AS terakhirpas FROM antrian_kia JOIN pendaftaran ON antrian_kia.id_pemeriksaan=pendaftaran.id_pemeriksaan WHERE DATE(pendaftaran.tgl_pendaftaran)='$tgl_daftar'";
$hasil1  = mysqli_query($db, $sql1);
$data1   = mysqli_fetch_assoc($hasil1);
$lastid1 = $data1['terakhirpas'];
$lastnourut1 = (int)substr($lastid1,2,4);
$nexturut1   = $lastnourut1+1;
$nextid1     = "A-".sprintf("%04s",$nexturut1);

$data2[]=$nextid1;


echo json_encode(array(
	'datajad' => $datajad,
	'data2' => $data2
));

?>

