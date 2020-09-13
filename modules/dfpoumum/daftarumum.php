<?php
if (isset($_POST['daftar'])) {
  $id_pemeriksaan  = $_POST['id_pemeriksaan'];
  $no_antri  = $_POST['no_antri'];
  $tgl_daftar   = $_POST['tgl_daftar'];
  $jm_daftar = $_POST['jm_daftar'];
  $tgl_pendaftaran = $tgl_daftar." ".$jm_daftar.":00";
  $no_rm  = $_POST['no_rm'];
  $umur  = $_POST['umur'];
  $id_dokter = $_POST['id_dokter'];
  $pelayanan = $_POST['pelayanan'];

  mysqli_query($db, "INSERT INTO pendaftaran(id_pemeriksaan,tgl_pendaftaran,pelayanan,id_dokter,no_rm,kd_detpol,umur,keterangan) VALUES ('$id_pemeriksaan','$tgl_pendaftaran','$pelayanan','$id_dokter','$no_rm','5','$umur','Menunggu Antrian')");

  mysqli_query($db, "INSERT INTO antrian(no_antrian,id_pemeriksaan) VALUES ('$no_antri','$id_pemeriksaan')");

  echo "<script>alert('Data Pendaftaran Berhasil Disimpan. No Antrian Anda ".$no_antri."')</script>";
  echo "<script>window.location='index.php?page=dfpoumum'</script>";

}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div>
        <h2>Form Tambah Pendaftaran Poly Umum </h2>
        <div class="clearfix"></div>
      </div>                  
      <div class="x_content">
        <br />
        <form id="demo-form2"  class="form-horizontal form-label-left" method="post">                      

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
                          <input type="hidden" name="id_pemeriksaan" class="form-control col-md-7 col-xs-12" value="<?php echo $nextid.date('dmYHis'); ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal / Jam</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="date" name="tgl_daftar" value="<?php echo $date; ?>" id="tgl_daftar1" class="form-control col-md-7 col-xs-12"   MIN="<?php echo $date ?>">
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input name="jm_daftar" id="jm_daftar" class="form-control col-md-7 col-xs-12" type="time" value="<?php echo $jam; ?>">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="viewjad()">Cek Dokter</button>
                      </div>                         

                      <div class="row" id="viewjadwaldok">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_content">                             
                           <table id="tableadd" class="table table-bordered" style="display:;">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Dokter</th>
                                <th>Tanggal</th>                                      
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody id="barisdata">

                            </tbody>
                          </table>
                          <br><p id="pesaneror"></p>
                          <script type="text/javascript">
                            function viewjad(){                                

                              var datahandler = $("#barisdata");
                              var tgl_daftar = $("[name='tgl_daftar']").val();
                              var jm_daftar = $("[name='jm_daftar']").val();


                              datahandler.html("");

                              $.ajax({
                                type: "POST",
                                data : "tgl_daftar="+tgl_daftar+"&jm_daftar="+jm_daftar,
                                url :'http://localhost:8080/klinikcm/modules/dfpoumum/view.php',

                                success : function(data){                                  
                                  var resultobj = JSON.parse(data);                                  
                                  $("#antrian").val(resultobj.data2);
                                  var nomor = 1;                                  
                                  $.each(resultobj.datajad,function(key,val){
                                    var newrow = $("<tr>");          
                                    newrow.html("<td>"+nomor+"</td><td>"+val.nama+"</td><td>"+val.hari+"</td><td>"+val.waktu_mulai+"</td><td>"+val.waktu_selesai+"</td><td><input type='button' class='pilihdok' data-dokter="+val.id_dokter+" data-dokternam='"+val.nama+"' class='btn btn-default' value='Pilih'></td>");
                                    datahandler.append(newrow);
                                    nomor++;

                                  });                                    
                                }                                

                              });

                            }
                            

                          </script>

                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">No Antrian
                      </label>              -->       
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="hidden" id="antrian" name="no_antri" class="form-control col-md-7 col-xs-12"  readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">No Rekam Medis
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rm" name="no_rm" class="form-control col-md-7 col-xs-12" readonly>
                      </div>
                      <button type="button" class="btn btn-default fa fa-search-plus" data-toggle="modal" data-target="#datapasienumum"></button>
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
                        <input type="radio" name="pelayanan" value="umum">
                        <label>Umum</label> &ensp;&ensp;
                        <input type="radio" name="pelayanan" value="bpjs">
                        <label>BPJS</label>
                      </div>
                    </div>                                            
                    <div class="form-group">
                      <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Dokter
                      </label>              -->           
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="hidden" name="id_dokter" id="id_dokter" class="form-control col-md-7 col-xs-12" readonly>                          
                      </div>                                             
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Dokter <span ></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="nama_dok" id="nama_dok" class="form-control col-md-7 col-xs-12" readonly>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="index.php?page=dfpoumum" class="btn btn-danger"> Kembali</a>
                        <button type="submit" class="btn btn-success" name="daftar">Daftar</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- modal -->

          <div class="modal fade bs-example-modal-lg" id="datapasienumum" tabindex="-1" role="dialog" aria-hidden="true">
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
                              $no     = 1;
                              $query  = mysqli_query($db,"SELECT * FROM pasien");
                              $hitung = mysqli_num_rows($query);
                              if ($hitung>0) {
                                while ($pecah = mysqli_fetch_assoc($query)) {


                                    // tanggal lahir
                                  $tanggal = new DateTime($pecah['tgl_lahir']);

                                    // tanggal hari ini
                                  $today = new DateTime('today');

                                    // tahun
                                  $y = $today->diff($tanggal)->y;

                                    // bulan
                                  $m = $today->diff($tanggal)->m;


                                  ?>
                                  <tr>
                                    <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $no; ?></td>
                                    <td class="col-md-3 col-sm-3 col-xs-3"> <?php echo $pecah ['no_rm']; ?></td>
                                    <td><?php echo $pecah ['nama_lengkap'];?></td>
                                    <td><?php if($pecah['alergi_obat']==''){echo "Tidak Ada Alergi Obat";}else{echo $pecah['alergi_obat'];}?></td>
                                    <td>
                                      <button id="selectpas" data-rm="<?php echo $pecah['no_rm']; ?>" data-nama="<?php echo $pecah['nama_lengkap']; ?>" data-jk="<?php echo $pecah['jk']; ?>" data-alamat="<?php echo $pecah['alamat']; ?>" data-umur="<?php if ($y=='0') {
                                        echo $umur = $m . " bulan ";
                                        }else{
                                          echo $umur=  $y . " tahun " . $m . " bulan ";
                                        } ?>" data-alergi="<?php echo $pecah['alergi_obat']; ?>"><i class="fa fa-check"></i>Pilih</button>
                                      </td>
                                    </tr>
                                    <?php $no++; }} ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="modal-footer">
                        <a href="index.php?page=daftarkia" class="btn btn-danger">Back</a>
                      </div>
                    </div>
                  </div>
                </div>

