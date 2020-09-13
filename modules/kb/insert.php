<?php

include '../../database.php';

date_default_timezone_set('Asia/Jakarta');

$id_pemeriksaan = $_POST['id_pemeriksaan'];
$tgl_pemeriksaan = date("Y-m-d H:i:s"); 
$id_bidan = $_POST['id_bidan']; 
$no_rm = $_POST['no_rm'];
$umur = $_POST['umur'];
$nama_suami = $_POST['nama_suami'];
$pendidikan_suami = $_POST['pendidikan_suami'];
$jkn = $_POST['jkn'];
$jum_laki = $_POST['jum_laki'];
$jum_perempuan = $_POST['jum_perempuan'];
$umur_tc = $_POST['umur_tc'];
$status_kb = $_POST['status_kb'];
$kb_akhir = $_POST['kb_akhir'];
$terakhir_haid = $_POST['terakhir_haid'];
$dugaan_hamil = $_POST['dugaan_hamil'];
$jum_kehamilan = $_POST['jum_kehamilan'];
$jum_persalinan = $_POST['jum_persalinan'];
$jum_keguguran = $_POST['jum_keguguran'];
$menyusui = $_POST['menyusui'];
$riwayat_sakit = $_POST['riwayat_sakit'];
$kondisi = $_POST['kondisi'];
$bb = $_POST['bb'];
$td = $_POST['td'];
$pemeriksaan_dalam = $_POST['pemeriksaan_dalam'];
$posisi_rahim = $_POST['posisi_rahim'];
$pemeriksaan_tambahan = $_POST['pemeriksaan_tambahan'];
$kontrasepsi_boleh = $_POST['kontrasepsi_boleh'];
$metod_kontrasepsi = $_POST['metod_kontrasepsi'];
$tgl_pasang = $_POST['tgl_pasang'];
$tgl_cabut = $_POST['tgl_cabut'];    
$pekerjaan_suami = $_POST['pekerjaan_suami']; 
$alergi_obat = $_POST['alergi_obat']; 
$kd_detpol = $_POST['kd_detpol']; 

mysqli_query($db, "INSERT INTO kb(id_pemeriksaan,tgl_pemeriksaan,no_rm,kd_detpol,umur,nama_suami,pndk_suami,pekerjaan_suami,jkn,jum_al,jum_ap,jum_umurterkecil,status_kb,kb_terakhir,haid_terakhir,status_hamil,jum_hamil,jum_persalinan,jum_keguguran,status_menyusui,riwayat_sakit,keadaan,bb,td,periksa_dalam,posisi_rahim,periksa_tambahan,alat_kontraboleh,kd_alatkb,tgl_pesan,tgl_cabut,id_bidan,keterangan) VALUES ('$id_pemeriksaan','
    $tgl_pemeriksaan','$no_rm','$kd_detpol','$umur','$nama_suami','$pendidikan_suami','$pekerjaan_suami','
    $jkn','$jum_laki','$jum_perempuan','$umur_tc','$status_kb','$kb_akhir','$terakhir_haid','$dugaan_hamil','$jum_kehamilan','$jum_persalinan','$jum_keguguran','$menyusui','$riwayat_sakit','$kondisi','$bb','$td','$pemeriksaan_dalam','$posisi_rahim','$pemeriksaan_tambahan','$kontrasepsi_boleh','$metod_kontrasepsi','$tgl_pasang','$tgl_cabut','$id_bidan','Selesai Diperiksa')");

mysqli_query($db, "UPDATE pasien SET
  pasien = '$alergi_obat' WHERE no_rm='$no_rm'" );         

mysqli_query($db, "UPDATE Pendaftaran SET
  keterangan = 'Selesai Diperiksa' WHERE id_pemeriksaan='$id_pemeriksaan'");         


  ?>
