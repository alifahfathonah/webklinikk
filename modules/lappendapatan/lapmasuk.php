<?php

include '../../database.php';
include '../../fpdf/fpdf.php';

date_default_timezone_set('Asia/Jakarta');

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

  $pdf -> SetFont('Arial','B',14);
  $pdf -> Cell(0,5,'Laporan Pendapatan','0','1','C',false);
  $pdf -> Ln(5);
  
  $pdf -> SetFont('Arial','B',9);
  $pdf -> Ln(5);

  $pdf -> Cell(0,5,'Periode: '.date("d.m.Y",strtotime($_SESSION['mintgl']))." - ".date("d.m.Y",strtotime($_SESSION['maxtgl'])),'0','1','L',false);

  $pdf -> Ln(5);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(40,6,'',0,0,'C');
  $pdf -> Cell(55,6,'Keterangan',1,0,'C');
  $pdf -> Cell(55,6,'Subtotal',1,1,'C');

  $no = 1;
  $mintgl = $_SESSION['mintgl']." 00:00:00";
  $maxtgl = $_SESSION['maxtgl']." 23:59:59";
     
$query = mysqli_query($db,"SELECT det_poly.layanan,SUM(pembayaran.biaya) AS biayarj FROM pembayaran JOIN det_poly ON pembayaran.kd_detpol=det_poly.kd_detpol WHERE pembayaran.tgl_bayar BETWEEN '$mintgl' AND '$maxtgl' AND pembayaran.kd_detpol='5' AND pembayaran.tipe_bayar='umum'");
    $pecah = mysqli_fetch_assoc($query);
  $pdf -> SetFont('Arial','',7);
  $pdf -> Cell(40,4,'',0,0,'C'); 
  $pdf -> Cell(55,6,$pecah['layanan'],1,0,'L');
  $pdf -> Cell(55,6,rupiah($pecah['biayarj']),1,1,'L');  

  $query1 = mysqli_query($db,"SELECT det_poly.layanan,SUM(pembayaran.biaya) AS biayakb FROM pembayaran JOIN det_poly ON pembayaran.kd_detpol=det_poly.kd_detpol WHERE pembayaran.tgl_bayar BETWEEN '$mintgl' AND '$maxtgl' AND pembayaran.kd_detpol='2'");
    $pecah1 = mysqli_fetch_assoc($query1);
  $pdf -> SetFont('Arial','',7);
  $pdf -> Cell(40,4,'',0,0,'C'); 
  $pdf -> Cell(55,6,$pecah1['layanan'],1,0,'L');
  $pdf -> Cell(55,6,rupiah($pecah1['biayakb']),1,1,'L');  

  $query2 = mysqli_query($db,"SELECT det_poly.layanan,SUM(pembayaran.biaya) AS biayaimun FROM pembayaran JOIN det_poly ON pembayaran.kd_detpol=det_poly.kd_detpol WHERE pembayaran.tgl_bayar BETWEEN '$mintgl' AND '$maxtgl' AND pembayaran.kd_detpol='4'");
    $pecah2 = mysqli_fetch_assoc($query2);
  $pdf -> SetFont('Arial','',7);
  $pdf -> Cell(40,4,'',0,0,'C'); 
  $pdf -> Cell(55,6,$pecah2['layanan'],1,0,'L');
  $pdf -> Cell(55,6,rupiah($pecah2['biayaimun']),1,1,'L');  


  $query3 = mysqli_query($db,"SELECT det_poly.layanan,SUM(pembayaran.biaya) AS biayaanc FROM pembayaran JOIN det_poly ON pembayaran.kd_detpol=det_poly.kd_detpol WHERE pembayaran.tgl_bayar BETWEEN '$mintgl' AND '$maxtgl' AND pembayaran.kd_detpol='6'");
    $pecah3 = mysqli_fetch_assoc($query3);
  $pdf -> SetFont('Arial','',7);
  $pdf -> Cell(40,4,'',0,0,'C'); 
  $pdf -> Cell(55,6,$pecah3['layanan'],1,0,'L');
  $pdf -> Cell(55,6,rupiah($pecah3['biayaanc']),1,1,'L');  

  $pdf -> Cell(40,6,'',0,0,'C');
  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(55,6,'Total',1,0,'C');
  $query4 = mysqli_query($db,"SELECT det_poly.layanan,SUM(pembayaran.biaya) AS total FROM pembayaran JOIN det_poly ON pembayaran.kd_detpol=det_poly.kd_detpol WHERE pembayaran.tgl_bayar BETWEEN '$mintgl' AND '$maxtgl'");
    $pecah4 = mysqli_fetch_assoc($query4);

  $pdf -> Cell(55,6,rupiah($pecah4['total']),1,1,'L');

  $pdf -> Ln(40);


  $pdf -> SetFont('Arial','',9);

  $pdf -> Cell(130,5,'',0,0);
  $pdf -> Cell(35,5,'Yogyakarta, '.date("d-m-Y"),0,1);
  $pdf -> Ln(10);
  $pdf -> Cell(130,5,'',0,0);
  $pdf -> Cell(35,5,$_SESSION['nama'],0,1);


   
  $pdf->Output("Laporan Pendapatan.pdf","I");
 ?>
