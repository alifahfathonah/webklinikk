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
$pdf -> Cell(0,5,'KARTU STATUS PESERTA KB','0','1','C',false);
$pdf -> Ln(5);


$pdf -> SetFont('Arial','',9);

$id_pemeriksaan = $_GET['id_pemeriksaan'];
$query = mysqli_query($db,"SELECT kb.*,pasien.nama_lengkap,pasien.tgl_lahir,pasien.pendidikan_akhir,pasien.no_hp,pasien.alergi_obat,bidan.nama,pasien.alamat,pasien.pekerjaan,users.level,kb.jum_al+kb.jum_ap AS jum_anak,alat_kb.nama_alat FROM kb JOIN pasien ON kb.no_rm=pasien.no_rm JOIN bidan ON kb.id_bidan=bidan.id_bidan JOIN alat_kb ON kb.kd_alatkb=alat_kb.kd_alatkb JOIN users ON kb.id_bidan=users.id_user WHERE kb.id_pemeriksaan='$id_pemeriksaan'");

$hitung = mysqli_num_rows($query);
if ($hitung>0) {
  while ($pecah = mysqli_fetch_assoc($query)) {

    if($pecah['tgl_cabut']=='0000-00-00') {
      $tgl_cabut1="-";
    }else{
      date("d-m-Y",strtotime($tgl_cabut1=$pecah['tgl_cabut']));
    }

    if($pecah['kb_terakhir']=='') {
      $kb_terakhir1="-";
    }else{
      $kb_terakhir1=$pecah['kb_terakhir'];
    }
    


    $pdf -> Cell(39,5,'ID Layanan',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(80,5,$pecah['id_pemeriksaan'],'0','0','L');
    $pdf -> Cell(35,5,'Nama Peserta KB',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(80,5,$pecah['nama_lengkap'],'0','1','L',false);

    $pdf -> Cell(39,5,'Tanggal Lahir/Umur Istri',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(20,5,$pecah['tgl_lahir'],'0','0','L');
    $pdf -> Cell(2,5,'/','0','0');
    $pdf -> Cell(58,5,$pecah['umur'],'0','0','L');
    $pdf -> Cell(35,5,'Nama Suami',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(130,5,$pecah['nama_suami'],'0','1','L',false);

    $pdf -> Cell(39,5,'Pendidikan Terakhir Suami',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(80,5,$pecah['pndk_suami'],'0','0','L');
    $pdf -> Cell(35,5,'Pendidikan Terakhir Istri',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(80,5,$pecah['pendidikan_akhir'],'0','1','L',false);

    $pdf -> Cell(39,5,'Pekerjaan Suami',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(80,5,$pecah['pekerjaan_suami'],'0','0','L');
    $pdf -> Cell(35,5,'Pekerjaan Istri',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(80,5,$pecah['pekerjaan'],'0','1','L',false);

    $pdf -> Cell(39,5,'No HP Peserta KB',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(80,5,$pecah['no_hp'],'0','0','L');
    $pdf -> Cell(35,5,'Alergi Obat',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(80,5,$pecah['alergi_obat'],'0','1','L',false);

    $pdf -> Cell(39,5,'Alamat',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(80,5,$pecah['alamat'],'0','0','L');
    $pdf -> Cell(35,5,'Status JKN',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> MultiCell(40,6,$pecah['jkn'],0,'L');

    $pdf -> Cell(190,0.3,'','0','1','C',true);
    $pdf -> Ln(3);

    $pdf -> Cell(28,5,'Jumlah Anak Hidup',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(8,5,$pecah['jum_anak'],'0','0','L');
    $pdf -> Cell(15,5,'Laki-laki',0,0);
    $pdf -> Cell(7,5,$pecah['jum_al'],'1','0','C');
    $pdf -> Cell(20,5,'Perempuan',0,0);
    $pdf -> Cell(7,5,$pecah['jum_ap'],'1','0','C');
    $pdf -> Cell(27,5,'','0','0','C');


    $pdf -> Cell(30,5,'Umur Anak Terkecil',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(12,5,$pecah['jum_umurterkecil'],0,1);  

    $pdf -> Cell(28,5,'Status Peserta KB',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(84,5,$pecah['status_kb'],'0','0','L');
    $pdf -> Cell(30,5,'Cara KB Terakhir',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(12,5,$kb_terakhir1,0,0);
    
    $pdf -> Ln(5);


    $pdf -> SetFont('Arial','B',10);
    $pdf -> Cell(0,5,'Anamnese','0','1','L',false);

    $pdf -> SetFont('Arial','',9);

    $pdf -> Cell(28,5,'Haid Terakhir',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(84,5,$pecah['haid_terakhir'],'0','0','L');
    $pdf -> Cell(30,5,'Hamil/Diduga Hamil',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(12,5,$pecah['status_hamil'],0,1);

    $pdf -> Cell(28,5,'Jumlah GPA',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(33,5,'Gravida(Kehamilan)',0,0);
    $pdf -> Cell(7,5,$pecah['jum_hamil'],'1','0','C');
    $pdf -> Cell(3,5,'','0','0','C');
    $pdf -> Cell(33,5,'Partus(Persalinan)',0,0);
    $pdf -> Cell(7,5,$pecah['jum_persalinan'],'1','0','C');  
    $pdf -> Cell(3,5,'','0','0','C');
    $pdf -> Cell(33,5,'Abortus(Keguguran)',0,0);
    $pdf -> Cell(7,5,$pecah['jum_keguguran'],'1','1','C');

    $pdf -> Cell(28,5,'Menyusui',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(33,5,$pecah['status_menyusui'],0,1);

    $pdf -> Cell(45,5,'Riwayat Penyakit Sebelumnya',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(33,5,$pecah['riwayat_sakit'],0,1);

    $pdf -> Ln(3);

    $pdf -> SetFont('Arial','B',10);
    $pdf -> Cell(0,5,'Pemeriksaan','0','1','L',false);   

    $pdf -> SetFont('Arial','',9);

    $pdf -> Cell(28,5,'Keadaan Umum',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(84,5,$pecah['keadaan'],'0','0','L');
    $pdf -> Cell(30,5,'Berat Badan',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(12,5,$pecah['bb']." Kg",0,1);

    $pdf -> Cell(28,5,'Tekanan Darah',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(84,5,$pecah['td']." mmHg",'0','0','L');
    $pdf -> Cell(30,5,'Posisi Rahim',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(12,5,$pecah['posisi_rahim'],0,1);

    $pdf -> Cell(38,5,'Hasil Pemeriksaan Dalam',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> MultiCell(84,6,$pecah['periksa_dalam'],0,'L');

    $pdf -> Cell(43,5,'Hasil Pemeriksaan Tambahan',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> MultiCell(90,6,$pecah['periksa_tambahan'],0,'L');
    
    $pdf -> Cell(58,5,'Alat Kontrasepsi Yang Boleh Digunakan',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(84,5,$pecah['alat_kontraboleh'],'0','1','L');

    $pdf -> Cell(190,0.3,'','0','1','C',true);
    $pdf -> SetFont('Arial','',9);
    $pdf -> ln(3);

    $pdf -> Cell(68,5,'Metode dan Jenis Alat Kontrasespi Yang Dipilih',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(84,5,$pecah['nama_alat'],'0','1','L');

    $pdf -> Cell(30,5,'Tanggal Dipesan',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(84,5,date("d-m-Y",strtotime($pecah['tgl_pesan'])),'0','0','L');
    $pdf -> Cell(30,5,'Tanggal Dicabut',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(84,5,$tgl_cabut1,'0','1','L');

    $pdf -> Cell(30,5,'Tanggal Dilayani',0,0);
    $pdf -> Cell(2,5,':','0','0');
    $pdf -> Cell(84,5,date("d-m-Y",strtotime($pecah['tgl_pemeriksaan'])),'0','1','L');
    $pdf -> ln(5);
    $pdf -> Cell(120,5,'','0','0','L');
    $pdf -> Cell(20,5,'Penangggung Jawab Pelayanan KB',0,1);  
    $pdf -> Cell(120,5,'','0','0','L');
    $pdf -> Cell(20,5,$pecah['level'],0,1,'L');  
    $pdf -> ln(20);
    $pdf -> Cell(120,5,'','0','0','L');
    $pdf -> Cell(84,5,$pecah['nama'],'0','0','L');



    $pdf->Output("Rekam Medis.pdf","I");

  }}
  ?>
