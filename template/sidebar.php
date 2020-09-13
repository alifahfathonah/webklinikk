  <div class="col-md-3 left_col  menu_fixed">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a  href="index.php" class="site_title"><span style="font-size:medium">  Klinik Citra Madina</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="images/user1.png" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span><?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['level'];} ?></span>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />


      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side">
        <div class="menu_section">
          <p style="color:white;">&emsp;<?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['nama'];} ?></p>          
          <ul class="nav side-menu">
            <li><a href="index.php?page=dashboard"><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron"></span></a> </li>
            <?php if  ($_SESSION['level'] == 'Administrasi') {
             ?>
             <li><a><i class="fa fa-database"></i> Master Data <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="index.php?page=pasien"> Data Pasien</a></li>
                <li><a href="index.php?page=dokter"> Data Dokter</a></li>
                <li><a href="index.php?page=bidan"> Data Bidan</a></li>
                <li><a href="index.php?page=pegawai"> Data Pegawai</a></li>
                <li><a href="index.php?page=poly"> Data Poly</a></li>
                <li><a href="index.php?page=obat"> Data Obat</a></li>
                <li><a href="index.php?page=imun_vaksin"> Data Vaksin Imunisasi</a></li>
                <li><a href="index.php?page=kontrasepsi"> Data Alat Kontrasespsi</a></li>
                <li><a href="index.php?page=owner"> Owner</a></li>
              </ul>
            </li>
            
            <li><a><i class="fa fa-calendar"></i> Jadwal Praktek <span class="fa fa-chevron-down"></span></a>
             <ul class="nav child_menu"> 
              <li><a href="index.php?page=jaddok"> Jadwal Dokter</a></li>
              <li><a href="index.php?page=jadbid"> Jadwal Bidan</a></li>
            </ul>
          </li>

          <li><a href="index.php?page=rm_pas"><i class="fa fa-book"></i> Rekam Medis </a></li>
          
        <?php } ?>

        <!-- bidan -->
        <?php if  ($_SESSION['level'] == 'Bidan') {
         ?>
         <li><a href="index.php?page=pasien"><i class="glyphicon glyphicon-user"></i> Data Pasien</a></li>
         <li><a><i class="fa fa-download"></i> Pendaftaran Layanan <span class="fa fa-chevron-down"></span></a>
           <ul class="nav child_menu">
            <li><a href="index.php?page=dfpoumum">Poly Umum</a>
            </li>
            <li><a href="index.php?page=dafkia">Poly KIA</a>
            </li>
          </ul>
        </li>
        <li><a><i class="fa fa-plus-square"></i> Pelayanan <span class="fa fa-chevron-down"></span></a>
         <ul class="nav child_menu">               
           <li><a href="index.php?page=laykb"> Keluarga Berencana (KB)</a></li>
           <li><a href="index.php?page=anc">Antenatal Care (ANC)</a></li>
           <li><a href="index.php?page=imunisasi"> Imunisasi</a></li>             
         </ul>
       </li>
       <li><a><i class="fa fa-money"></i> Pembayaran <span class="fa fa-chevron-down"></span></a>
         <ul class="nav child_menu">               
          <li><a href="index.php?page=bayrj"> Rawat Jalan</a></li>
          <li><a href="index.php?page=baykb"> Keluarga Berencana (KB)</a></li>
          <li><a href="index.php?page=bayanc">Antenatal Care (ANC)</a></li>
          <li><a href="index.php?page=bayimun"> Imunisasi</a></li>             
        </ul>
      </li>
      
    <?php } ?>

    <!-- dokter -->
    <?php if  ($_SESSION['level'] == 'Dokter') {
     ?>        
     <li><a href="index.php?page=dafperiksa"><i class="fa fa-stethoscope"></i> Pemeriksaan Rawat Jalan</a></li>
     <!-- <li><a href=""><i class="fa fa-file-text-o"></i> Laporan Rekam Medis</a></li>           -->
   <?php } ?>

   <!-- Apoteker -->
   <?php if  ($_SESSION['level'] == 'Apoteker') { ?>          
    <li><a href="index.php?page=obat"><i class="fa fa-database"></i> Data Obat</a></li>            
    <li><a href="index.php?page=imun_vaksin"><i class="fa fa-database"></i> Data Vaksin Imunisasi</a></li>
    <li><a href="index.php?page=dafambilobat"><i class="glyphicon glyphicon-check"></i> Pengambilan Obat</a></li>            
  <?php } ?>

  <!-- owner -->
  <?php if  ($_SESSION['level'] == 'Owner') { ?>
        <li><a href="index.php?page=cekpendapatan"><i class="fa fa-file-pdf-o"></i> Laporan Pendapatan</a></li>
        <li><a href="index.php?page=kunpas"><i class="fa fa-bar-chart"></i> Range Kunjungan Pasien</a></li>      
  <?php } ?>


</div>

</div>
<!-- /sidebar menu -->
</div>
</div>
