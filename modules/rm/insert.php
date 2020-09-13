<?php

include '../../database.php';

date_default_timezone_set('Asia/Jakarta');

$result["message"] = "";

$id_resep = $_POST['id_resep'];
$kd_obat = $_POST['kd_obat'];
$jumlah = $_POST['jumlah'];
$satuan = $_POST['satuan'];
$aturan_minum = $_POST['aturan_minum'];

if ($id_resep=="") {
  $result["message"] = "Id Resep Tidak Boleh Kososng!";
}elseif ($kd_obat=="") {
  $result["message"] = "Kode Obat Tidak Boleh Kososng!";
}elseif ($jumlah=="") {
  $result["message"] = "Jumlah yang Dibutuhkan Tidak Boleh Kososng!";
}
elseif ($aturan_minum=="") {
  $result["message"] = "Aturan yang Dibutuhkan Tidak Boleh Kososng!";
}else {
 $query_result = mysqli_query($db,"INSERT INTO tmp_detresep(id_resep,kd_obat,jumlah,satuan,aturan_minum) VALUES ('$id_resep','$kd_obat','$jumlah','$satuan','$aturan_minum')");     
 if ($query_result) {
   $result["message"] = "Data Berhasil Ditambakan";
 }elseif ($query_result) {
   $result["message"] = "Data Berhasil Ditambakan";
 }
 else {
   $result["message"] = "Gagal Menyimpan Data";
 }
}

echo json_encode($result);

?>
