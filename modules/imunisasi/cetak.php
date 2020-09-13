<?php

include '../../database.php';
include '../../fpdf/fpdf.php';

  $pdf = new FPDF('p','mm','A4');
  $pdf -> AddPage();
  $pdf -> Image('../../images/citra.png',65);
  $pdf -> SetFont('Arial','B',8);
  $pdf -> Cell(0,5,'Alamat:Jl.Tegal Melati No.82, Sinduadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284, Yogyakarta','0','1','C',false);
  $pdf -> Cell(190,0.6,'','0','1','C',true);
  $pdf -> Ln(3);

  $pdf -> SetFont('Arial','B',14);
  $pdf -> Cell(0,5,'HASIL PELAYANAN IMUNISASI','0','1','C',false);
  $pdf -> Ln(5);

  
  $pdf -> SetFont('Arial','',9);

  $id_pemeriksaan = $_GET['id_pemeriksaan'];
  $query = mysqli_query($db,"SELECT imunisasi.*,bidan.nama,pasien.nama_lengkap,pasien.tempat_lahir,pasien.tgl_lahir,pasien.alamat FROM imunisasi JOIN pasien ON imunisasi.no_rm=pasien.no_rm JOIN bidan ON imunisasi.id_bidan=bidan.id_bidan WHERE imunisasi.id_pemeriksaan='$id_pemeriksaan'");

  $hitung = mysqli_num_rows($query);
    if ($hitung>0) {
      while ($pecah = mysqli_fetch_assoc($query)) {  


  $pdf -> Cell(39,5,'ID Layanan',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['id_pemeriksaan'],'0','0','L');
  $pdf -> Cell(35,5,'Nama Bidan',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['nama'],'0','1','L',false);

  $pdf -> Cell(39,5,'Nama Peserta Imunisasi',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['nama_lengkap'],'0','0','L');
  $pdf -> Cell(35,5,'TTL',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['tempat_lahir'] .",". $pecah['tgl_lahir'],'0','1','L',false);

  $pdf -> Cell(39,5,'Umur',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['umur'],'0','0','L');
  $pdf -> Cell(35,5,'Nama Ibu',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['nm_ibu'],'0','1','L',false);

  $pdf -> Cell(39,5,'Nama Ayah',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['nm_ayah'],'0','0','L');
  $pdf -> Cell(35,5,'No Telp Ibu',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['no_telp'],'0','1','L',false);

  $pdf -> Cell(39,5,'Alamat',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['alamat'],'0','1','L'); 

  $pdf -> ln(3);
  $pdf -> SetFont('Arial','U',9);
  $pdf -> Cell(80,5,'Data Lahir','0','1','L');

  $pdf -> SetFont('Arial','',9);
  $pdf -> Cell(39,5,'BB Lahir',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['bb_lhr']." KG",'0','0','L');
  $pdf -> Cell(35,5,'PB Lahir',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['pb_lhr']." CM",'0','1','L',false);

  }} 


  $query1 = mysqli_query($db,"SELECT imunisasi.tgl_pemeriksaan,imunisasi.bb,imunisasi.pb,det_imun.kd_detimun,det_imun.id_pemeriksaan,det_imun.kd_vaksin,GROUP_CONCAT(imun_vaksin.nm_vaksin) AS vaksin FROM imunisasi JOIN det_imun ON det_imun.id_pemeriksaan=imunisasi.id_pemeriksaan JOIN imun_vaksin ON det_imun.kd_vaksin=imun_vaksin.kd_vaksin WHERE imunisasi.id_pemeriksaan='$id_pemeriksaan' GROUP BY imunisasi.id_pemeriksaan");

  $pdf -> SetFont('Arial','',7);
  $pdf->ln(3);
  $pdf -> Cell(50,6,'',0,0,'C');
  $pdf -> Cell(25,6,'Tanggal Pelayanan',1,0,'C');
  $pdf -> Cell(12,6,'BB',1,0,'C');
  $pdf -> Cell(25,6,'PB',1,0,'C');
  $pdf -> Cell(30,6,'Pemberian Vaksin',1,1,'C');  

  $hitung1 = mysqli_num_rows($query1);
    if ($hitung1>0) {
      while ($pecah1 = mysqli_fetch_assoc($query1)) {


  $pdf -> Cell(50,6,'',0,0,'C');
  $pdf -> Cell(25,6,date("d-m-Y",strtotime($pecah['tgl_pemeriksaan'])),1,0,'C');
  $pdf -> Cell(12,6,$pecah1['pb']." KG" ,1,0,'C');
  $pdf -> Cell(25,6,$pecah1['bb']." CM" ,1,0,'C');
  $pdf -> Cell(30,6,$pecah1['vaksin'],'1','0','C');


}}


  $pdf->Output("LaporanANC.pdf","I");

 ?>
