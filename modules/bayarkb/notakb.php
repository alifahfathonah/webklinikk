<?php

include '../../database.php';
include '../../fpdf/fpdf.php';

function rupiah($angka){
  $hasil_rupiah="Rp.".number_format($angka,0,'.','.');
  return $hasil_rupiah;
}

$pdf = new FPDF('p','mm','A4');
$pdf -> AddPage();
$pdf -> Image('../../images/citra.png',65);
$pdf -> SetFont('Arial','B',8);
$pdf -> Cell(0,5,'Alamat:Jl.Tegal Melati No.82, Sinduadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284, Yogyakarta','0','1','C',false);
$pdf -> Cell(190,0.6,'','0','1','C',true);
$pdf -> Ln(3);

$pdf -> SetFont('Arial','B',9);
$pdf -> Cell(0,5,'Nota Pembayaran KB','0','1','C',false);
$pdf -> Ln(5);

$pdf -> SetFont('Arial','',9);

$id_pemeriksaan = $_GET['id_pemeriksaan'];
$query  = mysqli_query($db,"SELECT kb.id_pemeriksaan,kb.id_bidan,pasien.nama_lengkap,bidan.nama,pasien.no_rm,kb.kd_detpol,kb.umur FROM kb JOIN bidan ON kb.id_bidan=bidan.id_bidan JOIN pasien ON kb.no_rm=pasien.no_rm WHERE kb.id_pemeriksaan='$id_pemeriksaan'");
$hitung = mysqli_num_rows($query);
if ($hitung>0) {
  while ($pecah = mysqli_fetch_assoc($query)) {
    


    $pdf -> Cell(35,5,'Nama',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(100,5,$pecah['nama_lengkap'],'0','0','L');
    $pdf -> Cell(12,5,'Bidan',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(130,5,$pecah['nama'],'0','1','L',false);

    $pdf -> Cell(35,5,'Umur',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(50,5,$pecah['umur'],'0','0','L');
  }}
  $pdf -> Ln(10);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(60,6,'',0,0,'C');
  $pdf -> Cell(35,6,'Keterangan',1,0,'C');
  $pdf -> Cell(30,6,'Biaya',1,1,'C');
  
  $query1 = mysqli_query($db,"SELECT kb.id_pemeriksaan,kb.kd_detpol,det_poly.biaya,det_poly.layanan FROM kb JOIN det_poly ON kb.kd_detpol=det_poly.kd_detpol WHERE kb.id_pemeriksaan='$id_pemeriksaan'");
  $hitung1 = mysqli_num_rows($query1);
  if ($hitung1>0) {
    while ($pecah1 = mysqli_fetch_assoc($query1)) {
      $pdf -> SetFont('Arial','',7);
      $pdf -> Cell(60,4,'',0,0,'C'); 
      $pdf -> Cell(35,6,$pecah1['layanan'],1,0,'L');
      $pdf -> Cell(30,6,rupiah($pecah1['biaya']),1,1,'L');  
    }}

    $pdf -> Cell(60,4,'',0,0,'C'); 
    $pdf -> Cell(65,6,'Alat Kotrasepsi Yang Dipilih:',1,1,'L');

    $query2  = mysqli_query($db,"SELECT kb.id_pemeriksaan,kb.kd_alatkb,alat_kb.nama_alat,alat_kb.biaya FROM kb JOIN alat_kb ON kb.kd_alatkb=alat_kb.kd_alatkb WHERE kb.id_pemeriksaan='$id_pemeriksaan'");
    $hitung2 = mysqli_num_rows($query2);
    if ($hitung2>0) {
      while ($pecah2= mysqli_fetch_assoc($query2)) {
        $pdf -> Cell(60,4,'',0,0,'C'); 
        $pdf -> Cell(35,6,$pecah2['nama_alat'],1,0,'L');
        $pdf -> Cell(30,6,rupiah($pecah2['biaya']),1,1,'L');
      }}
      $pdf -> Cell(60,4,'',0,0,'C'); 
      $pdf -> Cell(35,6,'Total',1,0,'L');
      $query3    = mysqli_query($db, "SELECT SUM(alat_kb.biaya)+det_poly.biaya AS Total FROM kb JOIN alat_kb ON kb.kd_alatkb=alat_kb.kd_alatkb JOIN det_poly ON kb.kd_detpol=det_poly.kd_detpol WHERE kb.id_pemeriksaan='$id_pemeriksaan' GROUP BY det_poly.biaya");
      $pecah3 = mysqli_fetch_assoc($query3);
      $pdf -> Cell(30,6,rupiah($pecah3['Total']),1,1,'L');



      $pdf -> Ln(60);

      
      $query4 = mysqli_query($db,"SELECT kb.id_pemeriksaan,pembayaran.tgl_bayar,pembayaran.id_bidan,bidan.nama AS nama_bidan FROM kb JOIN pembayaran ON pembayaran.id_pemeriksaan=kb.id_pemeriksaan JOIN bidan ON pembayaran.id_bidan=bidan.id_bidan WHERE kb.id_pemeriksaan='$id_pemeriksaan'");
      $hitung4 = mysqli_num_rows($query4);
      if ($hitung4>0) {
        while ($pecah4 = mysqli_fetch_assoc($query4)) {

          $pdf -> SetFont('Arial','',9);

          $pdf -> Cell(130,5,'',0,0);
          $pdf -> Cell(35,5,'Yogyakarta, '.date("d-m-Y",strtotime($pecah4['tgl_bayar'])),0,1);
          $pdf -> Ln(10);
          $pdf -> Cell(130,5,'',0,0);
          $pdf -> Cell(35,5,$pecah4['nama_bidan'],0,1);
          

        }}

        $pdf->Output("Nota imunisasi.pdf","I");
        ?>
