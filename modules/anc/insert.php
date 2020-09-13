<?php

  include '../../database.php';

  date_default_timezone_set('Asia/Jakarta');

    $id_pemeriksaan = $_POST['id_pemeriksaan'];
    $tgl_pemeriksaan = date("Y-m-d H:i:s"); 
    $no_rm = $_POST['no_rm']; 
    $id_bidan = $_POST['id_bidan'];
    $umur = $_POST['umur'];
    $alergi_obat = $_POST['alergi_obat'];
    $nama_s = $_POST['nama_s'];
    $umur_s = $_POST['umur_s'];
    $agama_s = $_POST['agama_s'];
    $pndk_s = $_POST['pndk_s'];
    $kerja_s = $_POST['kerja_s'];
    $anak = $_POST['anak'];
    $tahun = $_POST['tahun'];
    $jum_kehamilan = $_POST['jum_kehamilan'];
    $jum_persalinan = $_POST['jum_persalinan'];
    $jum_keguguran = $_POST['jum_keguguran'];
    $hpht =  $_POST['hpht']; 
    $hpl = $_POST['hpl']; 
    $muntah = $_POST['muntah'];
    $nyeri_perut = $_POST['nyeri_perut'];
    $pusing = $_POST['pusing'];
    $nafs_mkn = $_POST['nafs_mkn'];
    $pendarahan = $_POST['pendarahan'];
    $derita_sakit = $_POST['derita_sakit'];
    $rw_skt = $_POST['rw_skt'];
    $kebiasaan = $_POST['kebiasaan'];
    $keluhan = $_POST['keluhan'];
    $passex_istri = $_POST['passex_istri'];
    $passex_suami = $_POST['passex_suami'];
    $bt = $_POST['bt'];
    $paru =  $_POST['paru']; 
    $sadar = $_POST['sadar']; 
    $jantung = $_POST['jantung'];
    $mata = $_POST['mata'];
    $hati = $_POST['hati'];
    $leher = $_POST['leher'];
    $sb = $_POST['sb'];
    $payudara = $_POST['payudara'];
    $genetelia = $_POST['genetelia'];
    $kd_detpol = $_POST['kd_detpol'];

    mysqli_query($db, "INSERT INTO anc(id_pemeriksaan,tgl_pemeriksaan,no_rm,kd_detpol,umur,id_bidan,nm_suami,umur_suami,pnd_suami,agama_suami,kerja_suami,jum_hamil,jum_persalinan,jum_keguguran,hpht,hpl,keterangan) VALUES ('$id_pemeriksaan','$tgl_pemeriksaan','$no_rm','$kd_detpol','$umur','$id_bidan','$nama_s','$umur_s','$pndk_s','$agama_s','$kerja_s','$jum_kehamilan','$jum_persalinan','$jum_keguguran','$hpht','$hpl','Selesai Diperiksa')");

    mysqli_query($db, "INSERT INTO anc_ku(id_pemeriksaan,muntah,nyeri_perut,pusing,nfsu_mkn,pendarahan,derita_sakit,rw_sktkeluarga,kebiasaan,keluhan,ps_sexistri,ps_sexsuami) VALUES ('$id_pemeriksaan','$muntah','$nyeri_perut','$pusing','$nafs_mkn','$pendarahan','".$derita_sakit."','".$rw_skt."','".$kebiasaan."','".$keluhan."','$passex_istri','$passex_suami')");
   
    mysqli_query($db,"INSERT INTO anc_prs(id_pemeriksaan,bntuk_tbh,paru,kesadaran,jantung,mata,hati,leher,sb,payudara,genetelia) VALUES ('$id_pemeriksaan','$bt','$paru','$sadar','$jantung','$mata','$hati','$leher','$sb','$payudara','$genetelia ')");

    mysqli_query($db, "UPDATE pasien SET
      alergi_obat ='$alergi_obat' WHERE no_rm='$no_rm'");         

    mysqli_query($db, "UPDATE Pendaftaran SET
      keterangan = 'Selesai Diperiksa' WHERE id_pemeriksaan='$id_pemeriksaan'");         


 ?>

