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

$pdf -> SetFont('Arial','',9);

$id_pemeriksaan = $_GET['id_pemeriksaan'];
$query = mysqli_query($db,"SELECT pemeriksaan.tgl_pemeriksaan,dokter.nama,pasien.alergi_obat FROM pemeriksaan JOIN dokter ON pemeriksaan.id_dokter=dokter.id_dokter JOIN pasien ON pemeriksaan.no_rm=pasien.no_rm AND DATE(pemeriksaan.tgl_pemeriksaan) WHERE pemeriksaan.id_pemeriksaan='$id_pemeriksaan'");

$hitung = mysqli_num_rows($query);
if ($hitung>0) {
  while ($pecah = mysqli_fetch_assoc($query)) {


    $pdf -> Cell(35,5,'Tanggal Pemeriksaan',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(100,5,date("d-m-Y",strtotime($pecah['tgl_pemeriksaan'])),'0','0','L');
    $pdf -> Cell(12,5,'Dokter',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(130,5,$pecah['nama'],'0','1','L',false);

    $pdf -> Cell(35,5,'Riwayat Alergi',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(50,5,$pecah['alergi_obat'],'0','0','L');
  }}
  $pdf -> Ln(10);

  $pdf -> SetFont('Arial','B',9);
  $pdf -> Cell(0,5,'Resep Obat','0','1','C',false);
  $pdf -> Ln(5);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(40,6,'',0,0,'C');
  $pdf -> Cell(8,6,'No',1,0,'C');
  $pdf -> Cell(35,6,'Nama Obat',1,0,'C');
  $pdf -> Cell(30,6,'Jumlah',1,0,'C');
  $pdf -> Cell(25,6,'Aturan Minum',1,1,'C');

  

  $no = 1;
  $query1 = mysqli_query($db,"SELECT pemeriksaan.id_pemeriksaan,resep_obat.id_resep,obat.nama_obat,det_resep.jumlah,det_resep.satuan,det_resep.aturan_minum FROM pemeriksaan JOIN resep_obat ON resep_obat.id_pemeriksaan=pemeriksaan.id_pemeriksaan JOIN det_resep ON resep_obat.id_resep=det_resep.id_resep JOIN obat ON det_resep.kd_obat=obat.kd_obat WHERE pemeriksaan.id_pemeriksaan='$id_pemeriksaan'");
  $hitung1 = mysqli_num_rows($query1);
  if ($hitung1>0) {
    while ($pecah1 = mysqli_fetch_assoc($query1)) {
      $pdf -> SetFont('Arial','',7);
      $pdf -> Cell(40,4,'',0,0,'C'); 
      $pdf -> Cell(8,6,$no,1,0,'C');
      $pdf -> Cell(35,6,$pecah1['nama_obat'],1,0,'L');
      $pdf -> Cell(30,6,$pecah1['jumlah']." ".$pecah1['satuan'],1,0,'L');
      $pdf -> Cell(25,6,$pecah1['aturan_minum'],1,1,'L');  

      $no++; }}

      $pdf -> Ln(85);

      
      $query2 = mysqli_query($db,"SELECT pemeriksaan.id_pemeriksaan,pemeriksaan.no_rm,pemeriksaan.umur,pemeriksaan.bb,pasien.nama_lengkap,pasien.alamat FROM pemeriksaan JOIN pasien ON pemeriksaan.no_rm=pasien.no_rm WHERE pemeriksaan.id_pemeriksaan='$id_pemeriksaan'");
      $hitung2 = mysqli_num_rows($query2);
      if ($hitung2>0) {
        while ($pecah2 = mysqli_fetch_assoc($query2)) {

          $pdf -> SetFont('Arial','',9);

          $pdf -> Cell(35,5,'No RM',0,0);
          $pdf -> Cell(2,5,':','0','0');
          $pdf -> Cell(100,5,$pecah2['no_rm'],'0','0','L');
          $pdf -> Cell(12,5,'Umur',0,0);
          $pdf -> Cell(2,5,':','0','0');
          $pdf -> Cell(130,5,$pecah2['umur'],'0','1','L',false);

          $pdf -> Cell(35,5,'Nama',0,0);
          $pdf -> Cell(2,5,':','0','0');
          $pdf -> Cell(100,5,$pecah2['nama_lengkap'],'0','0','L');
          $pdf -> Cell(12,5,'BB',0,0);
          $pdf -> Cell(2,5,':','0','0');
          $pdf -> Cell(130,5,$pecah2['bb']." ".'Kg','0','1','L',false);

          $pdf -> Cell(35,5,'Alamat',0,0);
          $pdf -> Cell(2,5,':','0','0');
          $pdf -> Cell(50,5,$pecah2['alamat'],'0','0','L');

        }}


        


        $pdf->Output("Resep Obat.pdf","I");
        ?>
