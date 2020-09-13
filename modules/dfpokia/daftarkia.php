<?php
if (isset($_POST['daftar'])) {
  $id_pemeriksaan  = $_POST['id_pemeriksaan'];
  $no_antri  = $_POST['no_antri'];
  $tgl_daftar   = $_POST['tgl_daftar'];
  $jm_daftar = $_POST['jm_daftar'];
  $tgl_pendaftaran = $tgl_daftar." ".$jm_daftar.":00";
  $no_rm  = $_POST['no_rm'];
  $umur  = $_POST['umur'];
  $id_bidan = $_POST['id_bidan'];        
  $pelayanan = $_POST['pelayanan']; 

  mysqli_query($db, "INSERT INTO pendaftaran(id_pemeriksaan,tgl_pendaftaran,id_bidan,no_rm,kd_detpol,umur,keterangan) VALUES ('$id_pemeriksaan','$tgl_pendaftaran','$id_bidan','$no_rm','$pelayanan','$umur','Menunggu Antrian')");

  mysqli_query($db, "INSERT INTO antrian_kia(no_antrian,id_pemeriksaan) VALUES ('$no_antri','$id_pemeriksaan')");    

  echo "<script>alert('Data Pendaftaran Berhasil Disimpan. No Antrian Anda ".$no_antri."')</script>";
  echo "<script>window.location='index.php?page=dafkia'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div>
        <h2>Form Tambah Pendaftaran Poly KIA </h2>
        <div class="clearfix"></div>
      </div>      
      <div class="x_content">
        <br />
        <form id="demo-form2" class="form-horizontal form-label-left" method="post">
          

          <div class="form-group">
                        <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Pemeriksaan
                        </label> -->
                        <?php
                        $date= date("Y-m-d");
                        $jam= date("H:i");

                          // NOMOR URUT ORDER
                        $sql  = "SELECT max(id_pemeriksaan) AS terakhir FROM pendaftaran";
                        $hasil  = mysqli_query($db, $sql);
                        $data   = mysqli_fetch_assoc($hasil);
                        $lastid = $data['terakhir'];
                        $lastnourut = (int)substr($lastid,4,4);
                        $nexturut   = $lastnourut+1;
                        $nextid     = "PRS-".sprintf("%04s",$nexturut);
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="id_pemeriksaan" class="form-control col-md-7 col-xs-12" value="<?php echo $nextid.date('dmYHis') ?>" readonly>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="no_antri" class="form-control col-md-7 col-xs-12" id="antrian" readonly>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="id_bidan" class="form-control col-md-7 col-xs-12" value="<?php echo $_SESSION['id_user']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal / Jam</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input name="tgl_daftar" value="<?php echo $date; ?>" id="tgl_daftar1" class="form-control col-md-7 col-xs-12" type="date"  MIN="<?php echo $date ?>">
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input name="jm_daftar" id="jm_daftar" class="form-control col-md-7 col-xs-12" type="time" value="<?php echo $jam; ?>">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="viewjad()">Cek Bidan</button>
                      </div>                         

                      <div class="row" id="viewjadwaldok">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_content">                             
                           <table id="tableaddbid" class="table table-bordered" style="display:;">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Bidan</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody id="barisdata">

                            </tbody>
                          </table>
                          <br><p id="pesaneror"></p>                          
                        </div>
                      </div>
                    </div>                      
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">No Rekam Medis
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rm" name="no_rm" class="form-control col-md-7 col-xs-12" readonly>
                      </div>
                      <button type="button" class="btn btn-default fa fa-search-plus" data-toggle="modal" data-target="#datapasienkia"></button>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="nama_lengkap" id="nama" class="form-control col-md-7 col-xs-12" type="text" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div>
                          <input name="jk" id="gender" class="form-control col-md-7 col-xs-12" type="text" readonly>
                        </div>
                      </div>
                    </div>                      
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Umur</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="umur" id="umur" class="form-control col-md-7 col-xs-12" type="text" readonly>
                      </div>
                    </div>                      
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pelayanan</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="pelayanan">
                          <?php
                          $query1 = mysqli_query($db, "SELECT * FROM det_poly WHERE kd_detpol!='5'");
                          while ($row = mysqli_fetch_assoc($query1)) {
                            echo "<option value='$row[kd_detpol]'>$row[layanan]</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>                      

                    <div class="form-group">
                      <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Bidan</label> -->
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="id_bidan" id="id_bidan" class="form-control col-md-7 col-xs-12" type="hidden" readonly>
                      </div>
                    </div>                      
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Bidan</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="nm_bidan" id="nm_bidan" class="form-control col-md-7 col-xs-12" type="text" readonly>
                      </div>
                    </div>                      
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="index.php?page=dafkia" class="btn btn-danger"> Kembali</a>
                        <button type="submit" class="btn btn-success" name="daftar">Daftar</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- modal -->

          <div class="modal fade bs-example-modal-lg" id="datapasienkia" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Data Pasien</h4>
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
                                <th>No RM</th>
                                <th>Nama Lengkap</th>
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


                                    // tanggal lahir
                                  $tanggal = new DateTime($pecah1['tgl_lahir']);

                                    // tanggal hari ini
                                  $today = new DateTime('today');

                                    // tahun
                                  $y = $today->diff($tanggal)->y;

                                    // bulan
                                  $m = $today->diff($tanggal)->m;


                                  ?>
                                  <tr>
                                    <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $no1; ?></td>
                                    <td class="col-md-3 col-sm-3 col-xs-3"> <?php echo $pecah1 ['no_rm']; ?></td>
                                    <td><?php echo $pecah1 ['nama_lengkap'];?></td>
                                    <td><?php if($pecah1['alergi_obat']==''){echo "Tidak Ada Alergi Obat";}else{echo $pecah1['alergi_obat'];}?></td>
                                    <td>
                                      <button class="selectkia" data-rmkia="<?php echo $pecah1['no_rm']; ?>" data-namakia="<?php echo $pecah1['nama_lengkap']; ?>" data-jkkia="<?php echo $pecah1['jk']; ?>"  data-umurkia="<?php if ($y=='0') {
                                        echo $umur = $m . " bulan ";
                                        }else{
                                          echo $umur=  $y . " tahun " . $m . " bulan ";
                                        } ?>" data-alergikia="<?php echo $pecah1['alergi_obat']; ?>"><i class="fa fa-check"></i>Pilih</button>
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
                        <a href="index.php?page=daftarkia" class="btn btn-danger">Kembali</a>
                      </div>
                    </div>
                  </div>
                </div>


                <script type="text/javascript">
                  function viewjad(){                                

                    var datahandler = $("#barisdata");
                    var tgl_daftar = $("[name='tgl_daftar']").val();
                    var jm_daftar = $("[name='jm_daftar']").val();
                    var id_bidan = $("[name='id_bidan']").val();


                    datahandler.html("");

                    $.ajax({
                      type: "POST",
                      data : "tgl_daftar="+tgl_daftar+"&jm_daftar="+jm_daftar+"&id_bidan="+id_bidan,
                      url :'http://localhost:8080/klinikcm/modules/dfpokia/view.php',

                      success : function(result){                                  
                        var resultobj = JSON.parse(result);                                  
                        $("#antrian").val(resultobj.data2);
                        var nomor = 1;
                        $.each(resultobj.datajad,function(key,val){                                    
                          var newrow = $("<tr>");          
                          newrow.html("<td>"+nomor+"</td><td>"+val.hari+"</td><td>"+val.nama+"</td><td>"+val.waktu_mulai+"</td><td>"+val.waktu_selesai+"</td><td><input type='button' class='pilihbid' data-bidan="+val.id_bidan+" data-bidannam='"+val.nama+"' class='btn btn-default' value='Pilih'></td>");
                          datahandler.append(newrow);
                          nomor++;

                        });                                    
                      }                                

                    });

                  }

                </script>
