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
  $pdf -> Cell(0,5,'STATUS IBU HAMIL','0','1','C',false);
  $pdf -> Ln(5);

  
  $pdf -> SetFont('Arial','',9);

  $id_pemeriksaan = $_GET['id_pemeriksaan'];
  $query = mysqli_query($db,"SELECT anc.id_pemeriksaan,pasien.nama_lengkap,anc.umur,pasien.agama,pasien.pendidikan_akhir,pasien.pekerjaan,pasien.alamat,anc.nm_suami,anc.umur_suami,anc.agama_suami,anc.pnd_suami,anc.kerja_suami,anc.jum_hamil,anc.jum_persalinan,anc.jum_keguguran,pasien.no_hp FROM anc JOIN pasien ON anc.no_rm = pasien.no_rm WHERE anc.id_pemeriksaan='$id_pemeriksaan'");

  $hitung = mysqli_num_rows($query);
    if ($hitung>0) {
      while ($pecah = mysqli_fetch_assoc($query)) {

 //  if($pecah['tgl_cabut']=='0000-00-00') {
 //    $tgl_cabut1="-";
 //  }else{
 //    date("d-m-Y",strtotime($tgl_cabut1=$pecah['tgl_cabut']));
 //  }

 // if($pecah['kb_terakhir']=='') {
 //    $kb_terakhir1="-";
 //  }else{
 //    $kb_terakhir1=$pecah['kb_terakhir'];
 //  }
  


  $pdf -> Cell(39,5,'Nama',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['nama_lengkap'],'0','0','L');
  $pdf -> Cell(35,5,'Nama Suami',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['nm_suami'],'0','1','L',false);

  $pdf -> Cell(39,5,'Umur',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['umur'],'0','0','L');
  $pdf -> Cell(35,5,'Umur Suami',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['umur_suami'],'0','1','L',false);

  $pdf -> Cell(39,5,'Agama',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['agama'],'0','0','L');
  $pdf -> Cell(35,5,'Agama Suami',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['agama_suami'],'0','1','L',false);

  $pdf -> Cell(39,5,'Pendidikan',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['pendidikan_akhir'],'0','0','L');
  $pdf -> Cell(35,5,'Pendidikan Suami',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['pnd_suami'],'0','1','L',false);

  $pdf -> Cell(39,5,'Pekerjaan',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['pekerjaan'],'0','0','L');
  $pdf -> Cell(35,5,'Pekerjaan Suami',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['kerja_suami'],'0','1','L',false);

  $pdf -> Cell(39,5,'Alamat',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['alamat'],'0','0','L');
  $pdf -> Cell(35,5,'No. Telp',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah['no_hp'],'0','1','L',false);
  $pdf->ln(3);

  $pdf -> SetFont('Arial','B',10);
  $pdf -> Cell(0,5,'Pemeriksaan Kehamilan','0','1','L',false);
  $pdf -> SetFont('Arial','',9);

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

}}

  $no_rm= $_GET['no_rm'];
  $query1 = mysqli_query($db,"SELECT anc_det.* FROM anc_det WHERE id_pemeriksaan='$id_pemeriksaan' AND no_rm='$no_rm'");

  $pdf -> SetFont('Arial','',7);
  $pdf->ln(3);
  $pdf -> Cell(15,6,'',0,0,'C');
  $pdf -> Cell(11,6,'Anak Ke',1,0,'C');
  $pdf -> Cell(12,6,'Tahun',1,0,'C');
  $pdf -> Cell(25,6,'Umur Anak',1,0,'C');
  $pdf -> Cell(10,6,'P/L',1,0,'C');
  $pdf -> Cell(25,6,'BBL',1,0,'C');
  $pdf -> Cell(25,6,'Cara Persalinan',1,0,'C');
  $pdf -> Cell(20,6,'Penolong',1,0,'C');
  $pdf -> Cell(30,6,'Tempat Bersalin',1,1,'C');

  $hitung1 = mysqli_num_rows($query1);
    if ($hitung1>0) {
      while ($pecah1 = mysqli_fetch_assoc($query1)) {

        if($pecah1['jk']=='Laki-Laki') {
    $jkl="L";
  }elseif ($pecah1['jk']=='Perempuan') {
    $jkl="P";
  }

  $pdf -> Cell(15,6,'',0,0,'C');
  $pdf -> Cell(11,6,$pecah1['anak'],1,0,'C');
  $pdf -> Cell(12,6,$pecah1['tahun'],1,0,'C');
  $pdf -> Cell(25,6,$pecah1['umur'],1,0,'C');
  $pdf -> Cell(10,6,$jkl,1,0,'C');
  $pdf -> Cell(25,6,$pecah1['bbl'] ."Kg" ,1,0,'C');
  $pdf -> Cell(25,6,$pecah1['cara_persalinan'],1,0,'C');
  $pdf -> Cell(20,6,$pecah1['penolong'],1,0,'C');
  $pdf -> Cell(30,6,$pecah1['tmp_persalinan'],1,1,'C');

}}

  $pdf -> SetFont('Arial','B',10);
  $pdf -> Cell(0,5,'Riwayat Kehamilan Sekarang','0','1','L',false);
  $pdf -> SetFont('Arial','B',9);

  $query2 = mysqli_query($db,"SELECT anc_ku.*,anc.hpht,anc.hpl FROM anc_ku JOIN anc ON anc_ku.id_pemeriksaan=anc.id_pemeriksaan WHERE anc_ku.id_pemeriksaan='$id_pemeriksaan'");

   $hitung2 = mysqli_num_rows($query2);
    if ($hitung2>0) {
      while ($pecah2 = mysqli_fetch_assoc($query2)) {

  if($pecah2['derita_sakit']=='') {
    $derita="-";
  }else{
    $derita=$pecah2['derita_sakit'];
  }

  if($pecah2['rw_sktkeluarga']=='') {
    $skt_fam="-";
  }else{
    $skt_fam=$pecah2['rw_sktkeluarga'];
  }

  if($pecah2['kebiasaan']=='') {
    $kbsn="-";
  }else{
    $kbsn=$pecah2['kebiasaan'];
  }

  if($pecah2['keluhan']=='') {
    $klhn="-";
  }else{
    $klhn=$pecah2['keluhan'];
  }

  $pdf -> Cell(39,5,'HPHT',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,date("d-m-Y",strtotime($pecah2['hpht'])),'0','0','L');
  $pdf -> Cell(35,5,'HPL',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,date("d-m-Y",strtotime($pecah2['hpl'])),'0','1','L',false);

  $pdf -> SetFont('Arial','',9);

  $pdf -> Cell(39,5,'Muntah-Muntah',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah2['muntah'],'0','0','L');
  $pdf -> Cell(35,5,'Nyeri Perut',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah2['nyeri_perut'],'0','1','L',false);

  $pdf -> Cell(39,5,'Pusing-pusing',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah2['pusing'],'0','0','L');
  $pdf -> Cell(35,5,'Nafsu Makan',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah2['nfsu_mkn'],'0','1','L',false);

  $pdf -> Cell(39,5,'Pendarahan',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah2['pendarahan'],'0','1','L');

  $pdf -> Cell(39,5,'Penyakit Yang Diderita',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$derita,'0','1','L');

  $pdf -> Cell(39,5,'Riwayat Penyakit Keluarga',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$skt_fam,'0','1','L');

  $pdf -> Cell(39,5,'Kebiasaan',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$kbsn,'0','1','L');

  $pdf -> Cell(39,5,'Keluhan',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$klhn,'0','1','L');

  $pdf -> Cell(39,5,'Pasangan Sexual Istri',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah2['ps_sexistri'],'0','1','L');

  $pdf -> Cell(39,5,'Pasangan Sexual Suami',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah2['ps_sexsuami'],'0','1','L');
}}
  
  $pdf -> ln(3);
  $query3 = mysqli_query($db,"SELECT anc_prs.* FROM anc_prs WHERE id_pemeriksaan='$id_pemeriksaan'");

  

  $pdf -> SetFont('Arial','B',10);
  $pdf -> Cell(0,5,'Pemeriksaan','0','1','L',false);
  $pdf -> SetFont('Arial','',9);

  $hitung3 = mysqli_num_rows($query3);
    if ($hitung3>0) {
      while ($pecah3 = mysqli_fetch_assoc($query3)) {

  $pdf -> Cell(39,5,'Bentuk Tubuh',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah3['bntuk_tbh'],'0','0','L');
  $pdf -> Cell(35,5,'Paru',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah3['paru'],'0','1','L',false);

  $pdf -> Cell(39,5,'Kesadaran',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah3['kesadaran'],'0','0','L');
  $pdf -> Cell(35,5,'Jantung',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah3['jantung'],'0','1','L',false);

  $pdf -> Cell(39,5,'Mata',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah3['mata'],'0','0','L');
  $pdf -> Cell(35,5,'Hati',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah3['hati'],'0','1','L',false);

  $pdf -> Cell(39,5,'Leher',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah3['leher'],'0','0','L');
  $pdf -> Cell(35,5,'Suhu Badan',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah3['sb'],'0','1','L',false);

  $pdf -> Cell(39,5,'Payudara',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah3['payudara'],'0','0','L');
  $pdf -> Cell(35,5,'Genetelia',0,0);
  $pdf -> Cell(2,5,':','0','0');
  $pdf -> Cell(80,5,$pecah3['genetelia'],'0','1','L',false);

}}

  $pdf->ln(3);
  $pdf -> Cell(190,0.6,'','0','1','C',true);
  $pdf -> SetFont('Arial','',9);
  $pdf->ln(3);

  $query4 = mysqli_query($db,"SELECT anc.id_pemeriksaan,pasien.nama_lengkap,bidan.nama AS nama_bidan,anc.tgl_pemeriksaan FROM anc JOIN pasien ON anc.no_rm=pasien.no_rm JOIN bidan ON anc.id_bidan=bidan.id_bidan WHERE anc.id_pemeriksaan='$id_pemeriksaan'");

  $hitung4 = mysqli_num_rows($query4);
    if ($hitung4>0) {
      while ($pecah4 = mysqli_fetch_assoc($query4)) {

        $namaps= $pecah4['nama_lengkap'];
        $namab= $pecah4['nama_bidan'];



  $pdf -> MultiCell(190,8,"Kami yang bertanda tangan dibawah ini nama:".$namaps. " Setelah mendapat penjelasan dan mengerti sepenuhnya segala hal-hal yang berkaitan dengan kehamilan serta kami berdua (Suami/Istri), bersama ini kami menyatakan secara sukarela untuk memeriksa kehamilan saya pada  bidan: ".$namab,'0','0');  

  $pdf->ln(3);

  $pdf -> Cell(39,5,'',0,0);
  $pdf -> Cell(2,5,'','0','0');
  $pdf -> Cell(80,5,'','0','','L');
  $pdf -> Cell(35,5,"Bantul, ".date("d-m-Y",strtotime($pecah4['tgl_pemeriksaan'])),0,0);
  $pdf -> Cell(2,5,'','0','0');
  $pdf -> Cell(80,5,'','0','0','L',false);
  $pdf->ln(4);

  $pdf -> Cell(119,5,'Yang Memberi Penjelasan',0,0);
  $pdf -> Cell(39,5,'Yang Membuat Pernyatan',0,1);
    $pdf->ln(15);
  $pdf -> Cell(119,5,$namab,0,0);
  $pdf -> Cell(39,5,$namaps,0,1);

  

}}

  $pdf->Output("LaporanANC.pdf","I");

 ?>
