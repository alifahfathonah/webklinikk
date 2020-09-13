<!DOCTYPE html>
<?php

include 'database.php';

if (empty($_SESSION['no_user'])) {
  echo "<script>alert('Silahkan Login Dulu')</script>";
  echo "<script>window.location='login.php'</script>";
}

if (isset($_GET ['aksi'])) {
  if ($_GET ['aksi'] == 'logout') {

    session_destroy();


    echo "<script>alert('Anda Telah Logout')</script>";
    echo "<script>window.location='login.php'</script>";
  }
}
date_default_timezone_set('Asia/Jakarta');

function rupiah($angka){
  $hasil_rupiah="Rp.".number_format($angka,0,'.','.');
  return $hasil_rupiah;
}

function getDayIndonesia($date)
{
  if($date != '0000-00-00'){
    $data = hari(date('D', strtotime($date)));
  }else{
    $data = '-';
  }

  return $data;
}


function days($day) {
  $hari = $day;

  switch ($hari) {
    case "Sun":
    $hari = "Minggu";
    break;
    case "Mon":
    $hari = "Senin";
    break;
    case "Tue":
    $hari = "Selasa";
    break;
    case "Wed":
    $hari = "Rabu";
    break;
    case "Thu":
    $hari = "Kamis";
    break;
    case "Fri":
    $hari = "Jum'at";
    break;
    case "Sat":
    $hari = "Sabtu";
    break;
  }
  return $hari;
}


?>

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/logo1.png" type="image/ico" />

  <title>Klinik Citra Madina</title>

  <!-- Bootstrap -->
  <link href="aset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="aset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="aset/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="aset/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="aset/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link href="aset/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="aset/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- starrr -->
  <link href="aset/vendors/starrr/dist/starrr.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="aset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="aset/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="aset/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="aset/build/css/custom.min.css" rel="stylesheet">
  <!-- data table -->  
  <link href="aset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="aset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="aset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="aset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="aset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- sidebar -->
      <?php
      include 'template/sidebar.php';
      ?>
      <!--end  -->
      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/user1.png" alt=""><?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['nama'];} ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li>
                    <a href="index.php?page=gantipass">
                      <i class="fa fa-key pull-left"></i> Ganti Password
                    </a>
                  </li>
                  <li><a href="index.php?aksi=logout"><i class="fa fa-sign-out pull-left"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->

      <div class="right_col" role="main">
        <div class="">
          <!-- top tiles -->
          <?php
          if (isset($_GET['page'])) {

            if ($_GET['page'] == 'pasien') {
              include 'modules/pasien/index.php';
            }
            else if ($_GET['page'] == 'tambahpasien') {
              include 'modules/pasien/tambahpasien.php';
            }
            else if ($_GET['page'] == 'editpasien') {
              include 'modules/pasien/editpasien.php';
            }
            else if ($_GET['page'] == 'detailpasien') {
              include 'modules/pasien/detailpasien.php';
            }            
            else if ($_GET['page'] == 'dokter') {
              include 'modules/dokter/index.php';
            }
            else if ($_GET['page'] == 'tambahdokter') {
              include 'modules/dokter/tambahdokter.php';
            }
            else if ($_GET['page'] == 'editdokter') {
              include 'modules/dokter/editdokter.php';
            }
            else if ($_GET['page'] == 'detaildokter') {
              include 'modules/dokter/detaildokter.php';
            }
            else if ($_GET['page'] == 'pegawai') {
              include 'modules/pegawai/index.php';
            }
            else if ($_GET['page'] == 'tambahpegawai') {
              include 'modules/pegawai/tambahpegawai.php';
            }
            else if ($_GET['page'] == 'editpegawai') {
              include 'modules/pegawai/editpegawai.php';
            }
            else if ($_GET['page'] == 'detailpegawai') {
              include 'modules/pegawai/detailpegawai.php';
            }
            else if ($_GET['page'] == 'poly') {
              include 'modules/poly/index.php';
            }
            else if ($_GET['page'] == 'layanan') {
              include 'modules/poly/layanan.php';
            }
            else if ($_GET['page'] == 'tambahpoly') {
              include 'modules/poly/tambahpoly.php';
            }
            else if ($_GET['page'] == 'editpoly') {
              include 'modules/poly/editpoly.php';
            }
            else if ($_GET['page'] == 'tambahlayanan') {
              include 'modules/poly/tambahlayanan.php';
            }
            else if ($_GET['page'] == 'editlayanan') {
              include 'modules/poly/editlayanan.php';
            }
            else if ($_GET['page'] == 'obat') {
              include 'modules/obat/index.php';
            }
            else if ($_GET['page'] == 'tambahobat') {
              include 'modules/obat/tambahobat.php';
            }
            else if ($_GET['page'] == 'editobat') {
              include 'modules/obat/editobat.php';
            }
            else if ($_GET['page'] == 'bidan') {
              include 'modules/bidan/index.php';
            }
            else if ($_GET['page'] == 'tambahbidan') {
              include 'modules/bidan/tambahbidan.php';
            }
            else if ($_GET['page'] == 'editbidan') {
              include 'modules/bidan/editbidan.php';
            }
            else if ($_GET['page'] == 'detailbidan') {
              include 'modules/bidan/detailbidan.php';
            }
            else if ($_GET['page'] == 'users') {
              include 'modules/users/index.php';
            }
            else if ($_GET['page'] == 'tambahuser') {
              include 'modules/users/tambahuser.php';
            }
            else if ($_GET['page'] == 'owner') {
              include 'modules/owner/index.php';
            }
            else if ($_GET['page'] == 'tambahowner') {
              include 'modules/owner/tambahowner.php';
            }
            else if ($_GET['page'] == 'editowner') {
              include 'modules/owner/editowner.php';
            }
            else if ($_GET['page'] == 'detailowner') {
              include 'modules/owner/detailowner.php';
            }
            else if ($_GET['page'] == 'imun_vaksin') {
              include 'modules/vaksin/index.php';
            }
            else if ($_GET['page'] == 'tambah_vaksin') {
              include 'modules/vaksin/tambah_vksn.php';
            }
            else if ($_GET['page'] == 'edit_vaksin') {
              include 'modules/vaksin/edit_vksn.php';
            }
            else if ($_GET['page'] == 'kontrasepsi') {
              include 'modules/alatkb/index.php';
            }
            else if ($_GET['page'] == 'tamkontrasepsi') {
              include 'modules/alatkb/tamalatkb.php';
            }       
            else if ($_GET['page'] == 'edtkontrasepsi') {
              include 'modules/alatkb/edit_alatkb.php';
            }            
            else if ($_GET['page'] == 'dfpoumum') {
              include 'modules/dfpoumum/index.php';
            }
            else if ($_GET['page'] == 'daftarumum') {
              include 'modules/dfpoumum/daftarumum.php';
            }
            else if ($_GET['page'] == 'dafkia') {
              include 'modules/dfpokia/index.php';
            }
            else if ($_GET['page'] == 'daftarkia') {
              include 'modules/dfpokia/daftarkia.php';
            }
            else if ($_GET['page'] == 'gantipass') {
              include 'modules/gantipass/ganti.php';
            }
            else if ($_GET['page'] == 'dafperiksa') {
              include 'modules/periksa/index.php';
            }
            else if ($_GET['page'] == 'pemeriksaan') {
              include 'modules/periksa/pemeriksaan.php';
            }
            else if ($_GET['page'] == 'rm') {
              include 'modules/periksa/rm.php';
            }
            else if ($_GET['page'] == 'jaddok') {
              include 'modules/jadwaldok/index.php';
            }
            else if ($_GET['page'] == 'tamjaddok') {
              include 'modules/jadwaldok/tambahjaddok.php';
            }
            else if ($_GET['page'] == 'editjaddok') {
              include 'modules/jadwaldok/editjaddok.php';
            }
            else if ($_GET['page'] == 'jadbid') {
              include 'modules/jadwalbidan/index.php';
            }
            else if ($_GET['page'] == 'tamjadbid') {
              include 'modules/jadwalbidan/tambahjadbid.php';
            }
            else if ($_GET['page'] == 'editjadbid') {
              include 'modules/jadwalbidan/editjadbid.php';
            }
            else if ($_GET['page'] == 'laykb') {
              include 'modules/kb/index.php';
            }
            else if ($_GET['page'] == 'layanankb') {
              include 'modules/kb/layanan.php';
            }
            else if ($_GET['page'] == 'detailkb') {
              include 'modules/kb/detailkb.php';
            }
            else if ($_GET['page'] == 'anc') {
              include 'modules/anc/index.php';
            }
            else if ($_GET['page'] == 'layanc') {
              include 'modules/anc/layanan.php';
            }
            else if ($_GET['page'] == 'detanc') {
              include 'modules/anc/detanc.php';
            }
            else if ($_GET['page'] == 'imunisasi') {
              include 'modules/imunisasi/index.php';
            }
            else if ($_GET['page'] == 'lay_imun') {
              include 'modules/imunisasi/layanan.php';
            }
            else if ($_GET['page'] == 'rm_imun') {
              include 'modules/imunisasi/rm.php';
            }
            else if ($_GET['page'] == 'rm_pas') {
              include 'modules/rm/index.php';
            }
            else if ($_GET['page'] == 'tam_rm') {
              include 'modules/rm/tambahrm.php';
            }
            else if ($_GET['page'] == 'rekammedis') {
              include 'modules/rm/viewrm.php';
            }
            else if ($_GET['page'] == 'editrm') {
              include 'modules/rm/editrm.php';
            }            
            else if ($_GET['page'] == 'dafambilobat') {
              include 'modules/ambilobat/index.php';
            }
            else if ($_GET['page'] == 'ambilobt') {
              include 'modules/ambilobat/transaksi.php';
            }
            else if ($_GET['page'] == 'bayrj') {
              include 'modules/bayarrj/index.php';
            }
            else if ($_GET['page'] == 'transbayrj') {
              include 'modules/bayarrj/transaksi.php';
            }
            else if ($_GET['page'] == 'bayanc') {
              include 'modules/bayaranc/index.php';
            }
            else if ($_GET['page'] == 'transanc') {
              include 'modules/bayaranc/transaksi.php';
            }
            else if ($_GET['page'] == 'bayimun') {
              include 'modules/bayarimun/index.php';
            }
            else if ($_GET['page'] == 'transimun') {
              include 'modules/bayarimun/transaksi.php';
            }
            else if ($_GET['page'] == 'baykb') {
              include 'modules/bayarkb/index.php';
            }
            else if ($_GET['page'] == 'transkb') {
              include 'modules/bayarkb/transaksi.php';
            }
            else if ($_GET['page'] == 'cekpendapatan') {
              include 'modules/lappendapatan/index.php';
            }
            else if ($_GET['page'] == 'lapmasuk') {
              include 'modules/lappendapatan/lapmasuk.php';
            }
            else if ($_GET['page'] == 'kunpas') {
              include 'modules/lappendapatan/kunjungan.php';
            }
            else if ($_GET['page'] == 'dashboard'){
              include 'modules/beranda/index.php';
            }
          }
          else {
            include 'modules/beranda/index.php';
          }

          ?>
        </div>

        <!-- /top tiles -->
      </div>
      <!-- /page content -->

      <!-- footer content -->

      <footer>
        <div class="pull-right">
          <strong><?php echo "Copyright © " . (int)date('Y') . " Klinik Citra Madina"; ?></strong>
        </div>
        <div class="clearfix"></div>
      </footer>

      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->    
  <script src="aset/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="aset/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="aset/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="aset/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="aset/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="aset/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="aset/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="aset/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="aset/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="aset/vendors/Flot/jquery.flot.js"></script>
  <script src="aset/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="aset/vendors/Flot/jquery.flot.time.js"></script>
  <script src="aset/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="aset/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="aset/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="aset/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="aset/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="aset/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="aset/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="aset/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="aset/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="aset/vendors/moment/min/moment.min.js"></script>
  <script src="aset/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="aset/build/js/custom.min.js"></script>
  <!-- data tables -->    
  <script src="aset/vendors/datatables.net/js/jquery.dataTables.js"></script>
  <script src="aset/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="aset/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="aset/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="aset/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="aset/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="aset/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="aset/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="aset/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="aset/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="aset/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="aset/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="aset/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="aset/vendors/jszip/dist/jszip.min.js"></script>
  <script src="aset/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="aset/vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- bootstrap-wysiwyg -->
  <script src="aset/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="aset/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="aset/vendors/google-code-prettify/src/prettify.js"></script>

  <!-- jQuery Tags Input -->
  <script src="aset/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>

  <!-- Switchery -->
  <script src="aset/vendors/switchery/dist/switchery.min.js"></script>

  <!-- Select2 -->
  <script src="aset/vendors/select2/dist/js/select2.full.min.js"></script>

  <!-- Parsley -->
  <script src="aset/vendors/parsleyjs/dist/parsley.min.js"></script>

  <!-- Autosize -->
  <script src="aset/vendors/autosize/dist/autosize.min.js"></script>

  <!-- jQuery autocomplete -->
  <script src="aset/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>

  <!-- starrr -->
  <script src="aset/vendors/starrr/dist/starrr.js"></script>

  <!-- jQuery Smart Wizard -->
  <script src="aset/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

  <!-- Chart.js -->
  <script src="aset/vendors/Chart.js/dist/Chart.min.js"></script>


</body>
</html>

<!-- daftar pasien poly KIA-->
<script type="text/javascript">

  $(document).ready(function(){
    $(document).on('click','.selectkia', function(){
      var no_rmkia = $(this).data('rmkia');
      var namakia = $(this).data('namakia');
      var jkkia = $(this).data('jkkia');      
      var umurkia = $(this).data('umurkia');    
      $('#rm').val(no_rmkia);
      $('#nama').val(namakia);
      $('#gender').val(jkkia);      
      $('#umur').val(umurkia);      
      $('#datapasienkia').modal('hide');
    })
  })
</script>

<!-- daftar Poly umum -->
<script type="text/javascript">

  $(document).ready(function(){
    $(document).on('click','#selectpas', function(){
      var no_rm = $(this).data('rm');
      var nama = $(this).data('nama');
      var jk = $(this).data('jk');      
      var umur = $(this).data('umur');    
      $('#rm').val(no_rm);
      $('#nama').val(nama);
      $('#gender').val(jk);        
      $('#umur').val(umur);      
      $('#datapasienumum').modal('hide');
    })
  })

</script>  

<!-- resep -->
<script type="text/javascript">

  $(document).ready(function(){
    $(document).on('click','#select3', function(){
      var kd_obat = $(this).data('kdobat');
      var namaobat = $(this).data('namaobat');
      var satuan = $(this).data('satuan');
      $('#kd_obat').val(kd_obat);
      $('#nama_obat').val(namaobat);
      $('#satuan').val(satuan);
      $('#dataobat').modal('hide');
    })
  })

</script>

<!-- datapasien pada RM -->
<script type="text/javascript">

  $(document).ready(function(){
    $(document).on('click','#select4', function(){
      var no_rm = $(this).data('no_rm');
      var namapasien = $(this).data('nama_pasien');
      var alergi = $(this).data('alergi');
      $('#no_rm').val(no_rm);
      $('#namapsn').val(namapasien);        
      $('#alergi_obat').val(alergi);        
      $('#datapasien').modal('hide');
    })
  })

</script>

<!-- dataobat pada RM -->
<script type="text/javascript">

  $(document).ready(function(){
    $(document).on('click','#select5', function(){
      var kd_obat = $(this).data('kdobat');
      var obat = $(this).data('obat');
      var satuan = $(this).data('satuan');
      $('#kd_obt').val(kd_obat);
      $('#nama_obat').val(obat);        
      $('#satuan').val(satuan);        
      $('#dataobt').modal('hide');
    })
  })

</script>

<!-- ubahstatus -->

<script type="text/javascript">

  $(document).on("click","#ubah",function(){
    var id_pemeriksaan   = $(this).data('id');
    var antrian   = $(this).data('antri');    
    var status   = $(this).data('status');

    $('#id_pemeriksaan1').val(id_pemeriksaan);
    $('#antrian1').val(antrian);    
    $('#status').val(status);
  });

</script>

<!-- pilih dok pada form daftar umum -->
<script type="text/javascript">
  $(document).on("click",".pilihdok",function(){
    var  id_dokter = $(this).attr('data-dokter');
    var  nama_dokter = $(this).attr('data-dokternam');   

    $('#id_dokter').val(id_dokter);    
    $('#nama_dok').val(nama_dokter);
    $('#tableadd').hide() 


  });
</script>

<!-- pilih bidan pada form kia umum -->
<script type="text/javascript">
  $(document).on("click",".pilihbid",function(){
    var  id_bidan = $(this).attr('data-bidan');
    var  nama_bidan = $(this).attr('data-bidannam');   

    $('#id_bidan').val(id_bidan);    
    $('#nm_bidan').val(nama_bidan);
    $('#tableaddbid').hide() 


  });
</script>

<script type="text/javascript">
  $(document).ready( function() {
    $('#example').DataTable( {
      "oLanguage": {
        "sSearch": "Cari:",
        "sZeroRecords": "Tidak Menemukan Data Yang Dicari",
        "sEmptyTable": "Tidak Ada Data",
        "sInfo": "Menampilkan_START_ Sampai _END_ Dari _TOTAL_ Data",
        "sInfoEmpty": "Menampilkan 0 Sampai 0 Dari 0 Data",
        "sInfoFiltered": "(Filter Dari _MAX_ total Data)",
        "sLengthMenu": "Tampilkan _MENU_ Data",        

      }
    } );
  } );
</script>

<script type="text/javascript">
  $(document).ready( function() {
    $('#example1').DataTable( {
      "oLanguage": {
        "sSearch": "Cari:",
        "sZeroRecords": "Tidak Menemukan Data Yang Dicari",
        "sEmptyTable": "Tidak Ada Data",
        "sInfo": "Menampilkan_START_ Sampai _END_ Dari _TOTAL_ Data",
        "sInfoEmpty": "Menampilkan 0 Sampai 0 Dari 0 Data",
        "sInfoFiltered": "(Filter Dari _MAX_ total Data)",
        "sLengthMenu": "Tampilkan _MENU_ Data",        

      }
    } );
  } );
</script>

<?php 
$label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
 
for($bulan = 1;$bulan < 13;$bulan++)
{
  $query = mysqli_query($db,"SELECT COUNT(id_pemeriksaan) as jumlah FROM pendaftaran WHERE 
    MONTH(tgl_pendaftaran)='$bulan' AND keterangan='Telah Melakukan Pembayaran'");
  $row = $query->fetch_array();
  $jumlah_produk[] = $row['jumlah'];
}
?>

<script type="text/javascript">
    var ctx = document.getElementById("myBarChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($label); ?>,
        datasets: [{
          label: 'Pasien',
          data: <?php echo json_encode($jumlah_produk); ?>,
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',  
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },

      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
