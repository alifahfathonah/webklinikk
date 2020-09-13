<script type="text/javascript" src="aset/jsnew.js"></script>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <ul class="nav navbar-right">                                            
        <li>
          <a href="index.php?page=dafperiksa" class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="x_title">
        <h2>Form Pemeriksaan Pasien </h2>        
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
            <?php
            $id_periksa = $_GET['id_pemeriksaan'];
            $query  = mysqli_query($db,"SELECT pendaftaran.*,pasien.nama_lengkap,pasien.jk,pasien.alergi_obat FROM pendaftaran JOIN pasien ON pendaftaran.no_rm=pasien.no_rm WHERE pendaftaran.id_pemeriksaan='$id_periksa'");
            $hitung = mysqli_num_rows($query);
            $date1= date("Y-m-d H:i:s");
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

               ?>
               <form class="form-horizontal" method="post" style=" overflow-y: hidden;">              
                <div class="form-group">
                <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Pemeriksaan <span class="required"></span>
                </label> -->
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <input type="hidden" name="id_pemeriksaan" required="required" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['id_pemeriksaan']; ?>" readonly>
                </div>
              </div>
              <input type="hidden" name="tipe" value="<?php echo $pecah['pelayanan']; ?>">
              <div class="form-group">
                <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Dokter <span class="required"></span>
                </label> -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="hidden" name="id_dokter" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pecah['id_dokter']; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>No RM</label>
                  <input type="text" name="no_rm" required="required" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['no_rm']; ?>" readonly>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Nama</label>
                  <input type="text" name="nama" required="required" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['nama_lengkap']; ?>" readonly>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Jenis Kelamin</label>
                  <input  name="jk" class="form-control form-control col-md-6 col-xs-6" required="required" type="text" value="<?php echo $pecah['jk']; ?>" readonly>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Umur</label>
                  <input class="form-control form-control col-md-6 col-xs-6" required="required" name="umur" type="text" value="<?php echo $pecah['umur']; ?>" readonly>
                </div>                
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Alergi Obat</label>
                  <textarea name="alergi" rows="3" class="form-control col-md-6 col-sm-6 col-xs-6"><?php echo $pecah['alergi_obat']; ?></textarea>
                </div>
                <div class="form-group">                
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control form-control col-md-7 col-xs-12" required="required" name="kd_detpol" type="hidden" value="<?php echo $pecah['kd_detpol']; ?>"  readonly>
                  </div>
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
          <?php }} ?>
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
                <input type="text"  name="kd_obat" id="kd_obat" class="form-control col-md-7 col-xs-12" readonly>
              </div>
              <button type="button" class="btn btn-default fa fa-search-plus" data-toggle="modal" data-target="#dataobat" ></button>
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
                <input type="text"  name="jumlah" id="jumlah" class="form-control col-md-7 col-xs-12" >
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
                              url :'http://localhost:8080/klinikcm/modules/periksa/view.php',
                              success : function(result){
                                var resultobj = JSON.parse(result);
                                var nomor = 1;


                                $.each(resultobj,function(key,val){
                                  var newrow = $("<tr>");
                                  newrow.html("<td>"+nomor+"</td><td>"+val.nama_obat+"</td><td>"+val.jumlah+"</td><td>"+val.satuan+"</td><td>"+val.aturan_minum+"</td><td><input type='button' onclick='hapusdata("+val.id_detresep+")' class='btn btn-danger' value='Batal'></td>");

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
                                url   : 'http://localhost:8080/klinikcm/modules/periksa/insert.php',
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
                                      url : "http://localhost:8080/klinikcm/modules/periksa/hapus.php",
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
                var no_rm = $("[name='no_rm']").val();                                  
                var anamnesa = $("[name='anamnesa']").val();
                var diagnosa = $("[name='diagnosa']").val();
                var edukasi = $("[name='edukasi']").val();
                var suhubadan = $("[name='suhubadan']").val();
                var tekanandarah = $("[name='tekanandarah']").val();
                var id_resep = $("[name='id_resep']").val();
                var umur = $("[name='umur']").val();
                var kd_detpol = $("[name='kd_detpol']").val();
                var tipe = $("[name='tipe']").val();
                var bb = $("[name='bb']").val();
                var alergi = $("[name='alergi']").val();

                $.ajax({
                  type  : "POST",
                  data  : "id_pemeriksaan="+id_pemeriksaan+"&id_dokter="+id_dokter+"&no_rm="+no_rm+"&anamnesa="+anamnesa+"&diagnosa="+diagnosa+"&edukasi="+edukasi+"&suhubadan="+suhubadan+"&tekanandarah="+tekanandarah+"&id_resep="+id_resep+"&umur="+umur+"&kd_detpol="+kd_detpol+"&tipe="+tipe+"&bb="+bb+"&alergi="+alergi,
                  url   : 'http://localhost:8080/klinikcm/modules/periksa/insert2.php',
                  success : function(hasil){
                    loaddata();
                    window.location.href = "index.php?page=dafperiksa";
                    alert('Data Pemeriksaan Berhasil Disimpan');
                  }
                });
              }   
            </script>


            <!-- modal obat -->

            <div class="modal fade modal fade bs-example-modal-lg" id="dataobat" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Data Obat</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Kode Obat</th>
                                  <th>Nama Obat</th>
                                  <th>Satuan</th>
                                  <th>Stok</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>


                              <tbody>
                                <?php
                                $no1     = 1;
                                $query1  = mysqli_query($db,"SELECT * FROM obat WHERE stok!=0");
                                $hitung1 = mysqli_num_rows($query1);
                                if ($hitung1>0) {
                                  while ($pecah1 = mysqli_fetch_assoc($query1)) {

                                    ?>
                                    <tr>
                                      <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $no1; ?></td>
                                      <td class="col-md-3 col-sm-3 col-xs-3"> <?php echo $pecah1 ['kd_obat']; ?></td>
                                      <td><?php echo $pecah1 ['nama_obat'];?></td>
                                      <td><?php echo $pecah1 ['satuan'];?></td>
                                      <td><?php echo $pecah1 ['stok'];?></td>
                                      <td>
                                        <button  id="select3" data-kdobat="<?php echo $pecah1['kd_obat']; ?>" data-namaobat="<?php echo $pecah1['nama_obat']; ?>" data-satuan="<?php echo $pecah1['satuan']; ?>"><i class="fa fa-check"></i>Pilih</button>
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
                        <a href="index.php?page=pemeriksaan" class="btn btn-danger">Back</a>
                      </div>

                    </div>
                  </div>
                </div>
