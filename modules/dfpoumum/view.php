<?php
include "../../database.php";

$tgl_daftar = $_POST['tgl_daftar'];
$jm_daftar = $_POST['jm_daftar'];

$query= mysqli_query($db,"SELECT jad_dok.id_dokter,jad_dok.hari,jad_dok.waktu_mulai,jad_dok.waktu_selesai,dokter.nama FROM jad_dok JOIN dokter ON jad_dok.id_dokter=dokter.id_dokter WHERE jad_dok.hari='$tgl_daftar' AND 
	'$jm_daftar' BETWEEN jad_dok.waktu_mulai AND jad_dok.waktu_selesai LIMIT 1"); 

$result=array();
while($fethdata=$query->fetch_assoc()) {
	$datajad[] = $fethdata;
}

$sql1  = "SELECT max(no_antrian) AS terakhirpas FROM antrian JOIN pendaftaran ON antrian.id_pemeriksaan=pendaftaran.id_pemeriksaan WHERE DATE(pendaftaran.tgl_pendaftaran)='$tgl_daftar'";
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

