  <div class="row top_tiles">

    <div class="x_content bs-example-popovers">

      <div class="alert alert-info alert-dismissible fade in" role="alert" style="color: white;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <?php if  ($_SESSION['level'] == 'Administrasi') {
             ?>
        <strong>Selamat Datang</strong> <?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['nama'];} ?> Sebagai <?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['level'];} ?> Klinik Citra Madina.
      <?php } ?>

      <?php if  ($_SESSION['level'] == 'Bidan') {
             ?>
        <strong>Selamat Datang</strong> <?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['nama'];} ?> Sebagai <?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['level'];} ?> Klinik Citra Madina. 
      <?php } ?>

      <?php if  ($_SESSION['level'] == 'Dokter') {
             ?>
        <strong>Selamat Datang</strong> <?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['nama'];} ?> Sebagai <?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['level'];} ?> Klinik Citra Madina. 
      <?php } ?>

      <?php if  ($_SESSION['level'] == 'Apoteker') {
             ?>
        <strong>Selamat Datang</strong> <?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['nama'];} ?> Sebagai <?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['level'];} ?> Klinik Citra Madina. 
      <?php } ?>

      <?php if  ($_SESSION['level'] == 'Owner') {
             ?>
        <strong>Selamat Datang</strong> <?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['nama'];} ?> Sebagai <?php if(empty($_SESSION['no_user'])){echo "";}else{echo $_SESSION['level'];} ?> Klinik Citra Madina. 
      <?php } ?>
      </div>

    </div>

  </div>  

  <div>
    <img src="././images/logberanda.png" style=" width: 60%; height:auto;" class="imgberanda">
  </div>

  <style type="text/css">
    .imgberanda{
      position: absolute;
      left: 29%;
      top: 45%;      
      
    }
  </style>


