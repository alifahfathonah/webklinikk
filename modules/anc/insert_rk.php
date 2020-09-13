<?php

  include '../../database.php';

  date_default_timezone_set('Asia/Jakarta');

  $result["message"] = "";

  $id_pemeriksaan = $_POST['id_pemeriksaan'];
  $no_rm = $_POST['no_rm'];
  $anak = $_POST['anak'];
  $tahun = $_POST['tahun'];
  $umur_a = $_POST['umur_a'];
  $jk_a = $_POST['jk_a'];
  $bbl_a = $_POST['bbl_a'];
  $persalinan_a = $_POST['persalinan_a'];
  $penolong = $_POST['penolong'];
  $tmp_salinan = $_POST['tmp_salinan'];

  if ($anak=="") {
    $result["message"] = "Kolom Anak Tidak Boleh Kososng!";
  }elseif ($tahun=="") {
    $result["message"] = "Kolom Tahun Tidak Boleh Kososng!";
  }elseif ($umur_a=="") {
    $result["message"] = "Kolom Umur Anak Tidak Boleh Kososng!";
  }
  elseif ($jk_a=="") {
    $result["message"] = "Kolom Jenis Kelamin Anak Tidak Boleh Kososng!";
  }
  elseif ($bbl_a=="") {
    $result["message"] = "Kolom BBL Anak Tidak Boleh Kososng!";
  }elseif ($persalinan_a=="") {
    $result["message"] = "Kolom Persalinan Anak Tidak Boleh Kososng!";
  }
  elseif ($penolong=="") {
    $result["message"] = "Kolom Penolong Tidak Boleh Kososng!";
  }
  elseif ($tmp_salinan=="") {
    $result["message"] = "Kolom Tempat Bersalin Tidak Boleh Kososng!";
  }
  else {
     $query_result = mysqli_query($db,"INSERT INTO anc_det(id_pemeriksaan,no_rm,anak,tahun,umur,jk,bbl,cara_persalinan,penolong,tmp_persalinan) VALUES ('$id_pemeriksaan','$no_rm','$anak','$tahun','$umur_a','$jk_a','$bbl_a','$persalinan_a','$penolong','$tmp_salinan')");    

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

