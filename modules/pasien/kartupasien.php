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

  $pdf -> SetFont('Arial','B',9);
  $pdf -> Cell(0,5,'KARTU PASIEN','0','1','C',false);
  $pdf -> Ln(3);
  $pdf -> SetFont('Arial','',9);

  $no_rm = $_GET['no_rm'];
  $query = mysqli_query($db,"SELECT pasien.no_rm,pasien.nama_lengkap,pasien.jk,pasien.alamat FROM pasien WHERE no_rm='$no_rm'");

  $hitung = mysqli_num_rows($query);
    if ($hitung>0) {
      while ($pecah = mysqli_fetch_assoc($query)) {


  $pdf -> Cell(25,5,'No.RM',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(130,5,$pecah['no_rm'],'0','1','L',false);

  $pdf -> Cell(25,5,'Nama',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(130,5,$pecah['nama_lengkap'],'0','1','L',false);

  $pdf -> Cell(25,5,'Jenis Kelamin',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(130,5,$pecah['jk'],'0','1','L',false);

  $pdf -> Cell(25,5,'Alamat',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(130,5,$pecah['alamat'],'0','1','L',false);

  $pdf -> Ln(2);
  $pdf -> SetFont('Arial','U',9);  
   $pdf -> Cell(130,5,'Peringatan!','0','1','L',false);
   $pdf -> SetFont('Arial','B',9);  
   $pdf -> Cell(130,5,'Kartu ini harap dibawa setiap kali periksa!','0','1','L',false);

 }}


  $pdf->Output("laporan_penyewaan.pdf","I");
 ?>
