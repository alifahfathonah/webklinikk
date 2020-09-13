<?php

include '../../database.php';
include ('../../fpdf/pdf_mc_table.php');


$pdf = new PDF_MC_TABLE('p','mm','A4');
$pdf -> AddPage();
$pdf -> Image('../../images/citra.png',65);
$pdf -> SetFont('Arial','B',8);
$pdf -> Cell(0,5,'Alamat:Jl.Tegal Melati No.82, Sinduadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284, Yogyakarta','0','1','C',false);
$pdf -> Cell(190,0.6,'','0','1','C',true);
$pdf -> Ln(3);

$pdf -> SetFont('Arial','B',14);
  $pdf -> Cell(0,5,'Rekam Medis','0','1','C',false);
  $pdf -> Ln(5);

$pdf -> SetFont('Arial','',9);

$no_rm = $_GET['no_rm'];
$query = mysqli_query($db,"SELECT pemeriksaan.no_rm,pasien.nama_lengkap,pasien.jk,pemeriksaan.umur,pasien.pekerjaan,pasien.alamat,pasien.no_hp,pasien.alergi_obat FROM pemeriksaan JOIN pasien ON pemeriksaan.no_rm=pasien.no_rm WHERE pemeriksaan.no_rm='$no_rm'");
           $pecah = mysqli_fetch_assoc($query);

    $pdf -> Cell(35,5,'Nama Pasien',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(100,5,$pecah['nama_lengkap'],'0','1','L');
    $pdf -> Cell(35,5,'Jenis Kelamin',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(130,5,$pecah['jk'],'0','1','L',false);    
    $pdf -> Cell(35,5,'Pekerjaaan',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(130,5,$pecah['pekerjaan'],'0','1','L',false);
    $pdf -> Cell(35,5,'Alamat',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(130,5,$pecah['alamat'],'0','1','L',false);
    $pdf -> Cell(35,5,'No HP',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(130,5,$pecah['no_hp'],'0','1','L',false);
    $pdf -> Cell(35,5,'Alergi Obat',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(130,5,$pecah['alergi_obat'],'0','1','L',false);

  $pdf -> Ln(5);

  $pdf->SetWidths(Array(20,15,20,20,20,32,32,30,50,100));

  $pdf->SetLineHeight(8);

  $pdf -> SetFont('Arial','B',7);  
  $pdf -> Cell(20,8,'Tanggal Jam',1,0,'C');
  $pdf -> Cell(15,8,'Umur',1,0,'C');
  $pdf -> Cell(20,8,'Tekanan Darah',1,0,'C');
  $pdf -> Cell(20,8,'Suhu Badan',1,0,'C');
  $pdf -> Cell(20,8,'Berat Badan',1,0,'C');
  $pdf -> Cell(32,8,'Anamnesa',1,0,'C');
  $pdf -> Cell(32,8,'Diagnnosa',1,0,'C');
  $pdf -> Cell(30,8,'Terapi',1,1,'C'); 


  $query1 = mysqli_query($db,"SELECT pemeriksaan.id_pemeriksaan,pemeriksaan.tgl_pemeriksaan,pemeriksaan.umur,pemeriksaan.tekanan_darah,pemeriksaan.suhu_badan,pemeriksaan.bb,pemeriksaan.anamnesa,pemeriksaan.diagnosa,GROUP_CONCAT(obat.nama_obat) AS nama_obat,pemeriksaan.edukasi FROM pemeriksaan JOIN resep_obat ON resep_obat.id_pemeriksaan=pemeriksaan.id_pemeriksaan JOIN det_resep ON det_resep.id_resep=resep_obat.id_resep JOIN obat ON obat.kd_obat=det_resep.kd_obat WHERE pemeriksaan.no_rm='$no_rm' GROUP BY pemeriksaan.id_pemeriksaan");
  $pdf -> SetFont('Arial','',7);
  foreach ($query1 as $item) {
    $pdf->Row(Array(
      $item['tgl_pemeriksaan'],
      $item['umur'],
      $item['tekanan_darah']." mmHg",
      $item['suhu_badan'] ." C",
      $item['bb'] ." Kg",
      $item['anamnesa'],
      $item['diagnosa'],
      $item['nama_obat'],                            
     
));    
  
      $pdf ->Cell(35,8,'Edukasi','1','0','C'); 
      
        $pdf -> Cell('154','8',$item['edukasi'],'1','1','L'); 

  
  }    


$pdf->Output("Rekam Medis.pdf","I");

?>
