<script type="text/javascript" src="aset/jsnew.js"></script>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <ul class="nav navbar-right">                                            
        <li>
          <a href="index.php?page=rm_pas" class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="x_title">
        <h2>Form Tambah Rekam Medis Pasien </h2>        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <!-- Smart Wizard -->
        <div id="wizard" class="form_wizard wizard_horizontal">
          <ul class="wizard_steps">
            <li>
              <a href="#step-1">
                <span class="step_no">1</span>
                <span class="step_descr">
                  Pemeriksaan<br/>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-2">
                <span class="step_no">2</span>
                <span class="step_descr">
                  Terapi / Resep Dokter<br/>
                </span>
              </a>
            </li>
          </ul>
          <div id="step-1">            
            <form class="form-horizontal" method="post" style=" overflow-y: hidden;">              

              <div class="form-group">
                <?php
                $date= date("Y-m-d");

                          // NOMOR URUT ORDER
                $sql  = "SELECT max(id_pemeriksaan) AS terakhir FROM pendaftaran";
                $hasil  = mysqli_query($db, $sql);
                $data   = mysqli_fetch_assoc($hasil);
                $lastid = $data['terakhir'];
                $lastnourut = (int)substr($lastid,4,4);
                $nexturut   = $lastnourut+1;
                $nextid     = "PRS-".sprintf("%04s",$nexturut);

                ?>                
                  <!-- <label>ID Pemeriksaan</label>                   -->
                  <input type="hidden" name="id_pemeriksaan"  class="form-control col-md-6 col-xs-6" value="<?php echo $nextid.date('dmYHis'); ?>" readonly>                                  
                
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>No RM</label>                  
                  <input type="text" name="no_rm" id="no_rm" class="form-control col-md-6 col-xs-6"  readonly>
                  <button type="button"  class="btn btn-default fa fa-search-plus" data-toggle="modal" data-target="#datapasien" ></button>  
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Nama</label>
                  <input type="text" name="nama" id="namapsn" class="form-control col-md-6 col-xs-6"  readonly>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Umur</label>
                  <input class="form-control form-control col-md-6 col-xs-6" required="required" name="umur" type="text" >
                </div>                
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Dokter</label>
                  <select class="form-control" name="id_dokter">
                    <?php
                    $query = mysqli_query($db, "SELECT * FROM dokter");
                    while ($row = mysqli_fetch_assoc($query)) {
                      echo "<option value='$row[id_dokter]'>$row[nama]</option>";
                    }
                    ?>
                  </select>
                </div>                
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Tannggal Pemeriksaan</label>
                  <input type="datetime-local" name="tgl_periksa" class="form-control">
                </div>                
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Alergi Obat</label>
                  <textarea name="alergi" rows="3" id="alergi_obat" class="form-control col-md-6 col-sm-6 col-xs-6"></textarea>
                </div>                
              </div>                                          

              <div class="form-group has-feedback">                              
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Tekanan Darah</label>
                  <input class="form-control form-control col-md-7 col-xs-12" required="required" name="tekanandarah">                  
                  <span class="form-control-feedback right" aria-hidden="true">mmHg</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Suhu Badan</label>
                  <input class="form-control form-control col-md-7 col-xs-12" required="required" name="suhubadan">                 
                  <span class="form-control-feedback right" aria-hidden="true">&#8451;</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Berat Badan</label>
                  <input class="form-control form-control col-md-7 col-xs-12" required="required" name="bb">
                  <span class="form-control-feedback right" aria-hidden="true">Kg</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Anamnesa</label>
                  <textarea name="anamnesa" rows="5" class="form-control col-md-6 col-sm-6 col-xs-6"></textarea>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Diagnosa</label>
                  <textarea name="diagnosa" rows="5" class="form-control col-md-6 col-sm-6 col-xs-6"></textarea>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Edukasi</label>
                  <textarea name="edukasi" rows="5" class="form-control col-md-6 col-sm-6 col-xs-6"></textarea>
                </div>
              </div>              

            </form>

          </div>
          <div id="step-2">
            <h2>Resep Obat</h2>
            <form class="form-horizontal form-label-left" method="post">
              <div class="form-group">
              <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Resep
              </label> -->
              <?php

              $sql1  = "SELECT max(id_resep) AS terakhirpas FROM resep_obat";
              $hasil1  = mysqli_query($db, $sql1);
              $data1   = mysqli_fetch_assoc($hasil1);
              $lastid1 = $data1['terakhirpas'];
              $lastnourut1 = (int)substr($lastid1,4,4);
              $nexturut1   = $lastnourut1+1;
              $nextid1     = "RSP-".sprintf("%04s",$nexturut1);

              ?>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="hidden"  name="id_resep" id="id_resep" class="form-control col-md-7 col-xs-12" value="<?php echo $nextid1; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Obat
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"  name="kd_obat" id="kd_obt" class="form-control col-md-7 col-xs-12" readonly>
              </div>
              <button type="button" class="btn btn-default fa fa-search-plus" data-toggle="modal" data-target="#dataobt" ></button>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Obat
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"  name="nama_obat" id="nama_obat" class="form-control col-md-7 col-xs-12"  readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah
              </label>
              <div class="col-md-1 col-sm-1 col-xs-1">
                <input type="nimber"  name="jumlah" id="jumlah" class="form-control col-md-7 col-xs-12" >
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2">
                <input type="text"  name="satuan" id="satuan" class="form-control col-md-7 col-xs-12" placeholder="satuan" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Aturan Minum
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"  name="aturan_minum" class="form-control col-md-7 col-xs-12" id="aturan">
              </div>
            </div>
          </form>
          <button style="position:absolute; left:26%;" onclick="insertdata()" class="btn btn-success">Simpan</button><br>
          <p id="pesaneror"></p><br>
          <div class="x_title"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_content">
               <br> <br>
               <table id="tableadd" class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>                                      
                    <th>Satuan</th>
                    <th>Aturan Minum</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="barisdata">

                </tbody>
              </table>

              <script type="text/javascript">

              //view data

              function loaddata(){
                var datahandler = $("#barisdata");
                var id_resep = $("[name='id_resep']").val();
                datahandler.html("");
                $.ajax({
                  type: "POST",
                  data : "id_resep="+id_resep,
                  url :'http://localhost:8080/klinikcm/modules/rm/view.php',
                  success : function(result){
                    var resultobj = JSON.parse(result);
                    var nomor = 1;


                    $.each(resultobj,function(key,val){
                      var newrow = $("<tr>");
                      newrow.html("<td>"+nomor+"</td><td>"+val.nama_obat+"</td><td>"+val.jumlah+"</td><td>"+val.satuan+"</td><td>"+val.aturan_minum+"</td><td><button onclick='hapusdata("+val.id_detresep+")' class='btn btn-danger' >Hapus</button></td>");

                      datahandler.append(newrow);
                      nomor++;
                    });
                  }
                });
              }

                // insert data
                loaddata();
                function insertdata(){
                  var id_resep = $("[name='id_resep']").val();
                  var kd_obat = $("[name='kd_obat']").val();
                  var jumlah = $("[name='jumlah']").val();
                  var satuan = $("[name='satuan']").val();
                  var aturan_minum = $("[name='aturan_minum']").val();

                  $.ajax({
                    type  : "POST",
                    data  : "id_resep="+id_resep+"&kd_obat="+kd_obat+"&jumlah="+jumlah+"&satuan="+satuan+"&aturan_minum="+aturan_minum,
                    url   : 'http://localhost:8080/klinikcm/modules/rm/insert.php',
                    success : function(result){
                      var resultobj = JSON.parse(result);
                      $("#pesaneror").html(resultobj.message);
                      $("[name='kd_obat']").val("");
                      $("[name='nama_obat']").val("");
                      $("[name='jumlah']").val("");
                      $("[name='satuan']").val("");
                      $("[name='aturan_minum']").val("");
                      loaddata();
                    }
                  });
                }

                    //Hapus
                    function hapusdata(id_detresep){
                      var tanya = confirm("Apakah Anda Yakin Akan Mengghapus Obat Ini?");
                      if (tanya) {
                        $.ajax({
                          type : "POST",
                          data : "id_detresep="+id_detresep,
                          url : "http://localhost:8080/klinikcm/modules/rm/hapus.php",
                          success : function(result){
                            loaddata();
                          }
                        });
                      }
                    }

                  </script>
                </div>
              </div>
            </div>

          </div>
        </div>          

      </div>
      <!-- End SmartWizard Content -->
      <!-- End SmartWizard Content -->
    </div>
  </div>

</div>

<script type="text/javascript">
  function simpandata(){
    var id_pemeriksaan = $("[name='id_pemeriksaan']").val();
    var id_dokter = $("[name='id_dokter']").val();
    var tgl_periksa = $("[name='tgl_periksa']").val();
    var no_rm = $("[name='no_rm']").val();                                  
    var anamnesa = $("[name='anamnesa']").val();
    var diagnosa = $("[name='diagnosa']").val();
    var edukasi = $("[name='edukasi']").val();
    var suhubadan = $("[name='suhubadan']").val();
    var tekanandarah = $("[name='tekanandarah']").val();
    var id_resep = $("[name='id_resep']").val();
    var umur = $("[name='umur']").val();              
    var bb = $("[name='bb']").val();
    var alergi = $("[name='alergi']").val();

    $.ajax({
      type  : "POST",
      data  : "id_pemeriksaan="+id_pemeriksaan+"&id_dokter="+id_dokter+"&no_rm="+no_rm+"&anamnesa="+anamnesa+"&diagnosa="+diagnosa+"&edukasi="+edukasi+"&suhubadan="+suhubadan+"&tekanandarah="+tekanandarah+"&id_resep="+id_resep+"&umur="+umur+"&tgl_periksa="+tgl_periksa+"&bb="+bb+"&alergi="+alergi,
      url   : 'http://localhost:8080/klinikcm/modules/rm/insert2.php',
      success : function(hasil){
        loaddata();
        window.location.href = "index.php?page=rm_pas";
        alert('Data Pendaftaran Berhasil Disimpan');
      }
    });
  }   
</script>


<!-- modal obat -->

<div class="modal fade modal fade bs-example-modal-lg" id="datapasien" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        <h4 class="modal-title" id="myModalLabel">Data Pasien</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
                <table id="example1" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No RM</th>
                      <th>Nama Pasien</th>
                      <th>Alergi Obat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php
                    $no1     = 1;
                    $query1  = mysqli_query($db,"SELECT * FROM pasien");
                    $hitung1 = mysqli_num_rows($query1);
                    if ($hitung1>0) {
                      while ($pecah1 = mysqli_fetch_assoc($query1)) {

                        ?>
                        <tr>
                          <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $no1; ?></td>
                          <td class="col-md-3 col-sm-3 col-xs-3"> <?php echo $pecah1['no_rm']; ?></td>
                          <td><?php echo $pecah1 ['nama_lengkap'];?></td>
                          <td><?php if ($pecah1['alergi_obat']=="") {
                            echo "-";
                          }else{
                            echo $pecah1['alergi_obat'];
                          }?></td>
                          <td>
                            <button  id="select4" data-no_rm="<?php echo $pecah1['no_rm']; ?>" data-nama_pasien="<?php echo $pecah1['nama_lengkap']; ?>" data-alergi="<?php echo $pecah1['alergi_obat']; ?>"><i class="fa fa-check"></i>Pilih</button>
                          </td>
                        </tr>
                        <?php $no1++; }} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            
          </div>

        </div>
      </div>
    </div>

    <!-- modal pasien -->

    <div class="modal fade modal fade bs-example-modal-lg" id="dataobt" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Data Obat</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table id="example" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Obat</th>
                          <th>Nama Obat</th>              
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $no2     = 1;
                        $query2  = mysqli_query($db,"SELECT * FROM obat");
                        $hitung2 = mysqli_num_rows($query2);
                        if ($hitung2>0) {
                          while ($pecah2 = mysqli_fetch_assoc($query2)) {

                            ?>
                            <tr>
                              <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $no2; ?></td>
                              <td class="col-md-3 col-sm-3 col-xs-3"> <?php echo $pecah2['kd_obat']; ?></td>
                              <td><?php echo $pecah2 ['nama_obat'];?></td>                      
                              <td>
                                <button  id="select5" data-kdobat="<?php echo $pecah2['kd_obat']; ?>" data-obat="<?php echo $pecah2['nama_obat']; ?>" data-satuan="<?php echo $pecah2['satuan']; ?>"><i class="fa fa-check"></i>Pilih</button>
                              </td>
                            </tr>
                            <?php $no2++; }} ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="modal-footer">                
              </div>

            </div>
          </div>
        </div>
