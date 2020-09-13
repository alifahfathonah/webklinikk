<?php

include '../../database.php';

date_default_timezone_set('Asia/Jakarta');

$id_pemeriksaan = $_POST['id_pemeriksaan'];
$tgl_pemeriksaan = date("Y-m-d H:i:s"); 
$id_dokter = $_POST['id_dokter']; 
$no_rm = $_POST['no_rm'];
$anamnesa = $_POST['anamnesa'];
$diagnosa = $_POST['diagnosa'];
$edukasi = $_POST['edukasi'];
$suhu = $_POST['suhubadan'];
$td = $_POST['tekanandarah'];
$id_resep = $_POST['id_resep'];
$umur = $_POST['umur'];
$kd_detpol = $_POST['kd_detpol'];
$tipe = $_POST['tipe'];
$bb = $_POST['bb'];
$alergi = $_POST['alergi'];

mysqli_query($db, "INSERT INTO pemeriksaan(id_pemeriksaan,id_dokter,no_rm,tgl_pemeriksaan,anamnesa,diagnosa,
	edukasi,suhu_badan,tekanan_darah,bb,umur,kd_detpol,pelayanan,keterangan) VALUES ('$id_pemeriksaan','$id_dokter','$no_rm','$tgl_pemeriksaan','$anamnesa','$diagnosa','$edukasi','$suhu','$td','$bb','$umur','$kd_detpol','$tipe','Selesai Diperiksa')");

mysqli_query($db, "INSERT INTO resep_obat(id_resep,id_pemeriksaan) VALUES ('$id_resep','$id_pemeriksaan')");

mysqli_query($db,"INSERT INTO det_resep(id_detresep,id_resep,kd_obat,jumlah,satuan,aturan_minum) SELECT id_detresep,id_resep,kd_obat,jumlah,satuan,aturan_minum FROM tmp_detresep WHERE id_resep='$id_resep'");

mysqli_query($db, "UPDATE pasien SET
	alergi_obat = '$alergi' WHERE no_rm='$no_rm'");         

mysqli_query($db, "UPDATE Pendaftaran SET
	keterangan = 'Selesai Diperiksa' WHERE id_pemeriksaan='$id_pemeriksaan'");         


	?>

