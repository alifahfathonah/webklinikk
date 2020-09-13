 <!-- page content -->                  

 <div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <ul class="nav navbar-right">                                            
        <li>
          <a href="index.php?page=anc" class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="x_title">
        <h2>Form Layanan Antenatal Care (ANC)</h2>                   
        <div class="clearfix"></div>
      </div>

      <div class="x_content">

        <div id="wizard" class="form_wizard wizard_horizontal">
          <ul class="wizard_steps">
            <li>
              <a href="#step-1">
                <span class="step_no">1</span>
                <span class="step_descr">                                              
                  <p>Data Pribadi</p>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-2">
                <span class="step_no">2</span>
                <span class="step_descr">
                  <p>Riwayat Kehamilan</p>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-3">
                <span class="step_no">3</span>
                <span class="step_descr">
                  <p>Riwayat Kehamilan Sekarang</p>
                </span>
              </a>
            </li>                        
            <li>
              <a href="#step-4">
                <span class="step_no">3</span>
                <span class="step_descr">
                  <p>Pemeriksaan</p>
                </span>
              </a>
            </li>                        
          </ul>
          <div id="step-1">
            <?php 

            $id_pemeriksaan = $_GET['id_pemeriksaan'];

            $query  = mysqli_query($db,"SELECT pendaftaran.id_pemeriksaan,pendaftaran.no_rm,pendaftaran.umur,pendaftaran.id_bidan,pendaftaran.kd_detpol,pasien.nama_lengkap,pasien.tgl_lahir,pasien.pendidikan_akhir,pasien.pekerjaan,pasien.alergi_obat,pasien.agama FROM pendaftaran JOIN pasien ON pasien.no_rm=pendaftaran.no_rm WHERE pendaftaran.id_pemeriksaan='$id_pemeriksaan'");
            $hitung = mysqli_num_rows($query);

            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

               ?>

               <form class="form-horizontal form-label-left" style=" overflow-y: hidden;" method="post">

                <input type="hidden" name="id_pemeriksaan" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['id_pemeriksaan']; ?>" readonly>
                <input type="hidden" name="no_rm" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['no_rm']; ?>" readonly>
                <input type="hidden" name="id_bidan" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['id_bidan']; ?>" readonly>
                <input type="text" name="kd_detpol" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['kd_detpol']; ?>" readonly>

                <div class="form-group">                            
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Nama Peserta KB </label>
                    <input type="text" name="nama" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['nama_lengkap']; ?>" readonly>
                  </div>
                  <div class="col-md-4 col-sm-5 col-xs-5">
                    <label>Tanggal/Bulan/Lahir </label>
                    <input type="text" name="ttl" class="form-control col-md-5 col-xs-5" value="<?php echo date('d-m-Y',strtotime($pecah['tgl_lahir'])); ?>" readonly>          
                  </div>
                  <div class="col-md-2 col-sm-1 col-xs-1">                              
                    <label> &ensp;&ensp;Umur </label>
                    <input type="text" name="umur" value="<?php echo $pecah['umur']; ?>" class="form-control col-md-1 col-xs-1"  readonly>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Agama </label>
                    <input type="text" name="agama" value="<?php echo $pecah['agama']; ?>" class="form-control col-md-6 col-xs-6" readonly>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Pendidikan Terkahir Istri </label>
                    <input type="text" name="pendidikan_istri" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['pendidikan_akhir']; ?>" readonly>
                  </div>
                </div>  

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Pekerjaan </label>
                    <input type="text" name="pekerjaan" value="<?php echo $pecah['pekerjaan']; ?>" class="form-control col-md-6 col-xs-6" readonly>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Alergi Obat </label>
                    <textarea class="form-control col-md-6 col-xs-6" name="alergi_obat"><?php echo $pecah['alergi_obat']; ?></textarea>
                  </div>                                                        
                </div>  

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Nama Suami </label>
                    <input type="text" name="nama_s" class="form-control col-md-6 col-xs-6">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Umur Suami </label>
                    <input type="text" name="umur_s" class="form-control col-md-6 col-xs-6">
                  </div>                            
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Agama Suami </label>
                    <input type="text" name="agama_s" class="form-control">
                  </div>                                                        
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Pendidikikan Suami </label>
                    <select class="form-control"  name="pndk_s">
                      <option>SD</option>
                      <option>SMP</option>
                      <option>SMA</option>
                      <option>D3</option>
                      <option>D4</option>
                      <option>S1</option>
                      <option>S2</option>
                      <option>S3</option>
                    </select>
                  </div>                                                        
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Pekerjaan </label>
                    <input type="text" name="kerja_s" class="form-control">
                  </div>                                                        
                </div>

              </form>
            <?php }} ?>
          </div>

          <div id="step-2">                                    
            <strong><h4 style="text-decoration-line: underline;">Riwayat Kehamilan</h4></strong>   

            <form class="form-horizontal form-label-left" style=" overflow-y: hidden;" method="post">

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Anak Ke</label>
                  <input type="number" name="anak" class="form-control col-md-6 col-xs-6" min="0">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Tahun</label>
                  <select name="tahun" id="tahun" class="form-control"></select>


                  <script type="text/javascript" src="aset/jsnew.js"></script>
                  <script type="text/javascript">
                    let startYear = 1800;
                    let endYear = new Date().getFullYear();
                    for (i = endYear; i > startYear; i--)
                    {
                      $('#tahun').append($('<option />').val(i).html(i));
                    }
                  </script>

                </div>                            
              </div>

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Umur</label>
                  <input type="text" name="umur_a" class="form-control col-md-6 col-xs-6">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" name="jk_a">
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                  </select>
                </div>                            
              </div>

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>BBL</label>
                  <input type="text" name="bbl_a" class="form-control col-md-6 col-xs-6">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Cara Persalinan</label>
                  <input type="text" name="persalinan_a" class="form-control col-md-6 col-xs-6">
                </div>                            
              </div>

              <div class="form-group">                  
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Penolong</label>
                  <input type="text" name="penolong" class="form-control col-md-6 col-xs-6">
                </div> 
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Tempat Bersalinan</label>
                  <input type="text" name="tmp_salinan" class="form-control col-md-6 col-xs-6">
                </div>                           
              </div>

              <div class="form-group">
                &ensp;&ensp;<input type="button" class="btn btn-success" onclick="insertdata()" value="Simpan"><br><br>
                <p id="pesaneror"></p>
              </div>

              <br>
				
              <table id="tableadd" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Anak Ke</th>
                    <th>Tahun</th>
                    <th>Umur Anak</th>                                      
                    <th>JK</th>
                    <th>BBL</th>
                    <th>Cara Persalinan</th>
                    <th>Penolong</th>
                    <th>Tempat Bersalinan</th>                                    
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="barisdata">

                </tbody>
              </table>
          

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label class="control-label col-md-2 col-xs-3">Jumlah GPA</label>
                  <br>                            
                  <div class="col-md-3 col-sm-2 col-xs-2">                              
                    <input type="number" name="jum_kehamilan" class="form-control col-md-1 col-xs-1" placeholder="Kehamilan"> 
                  </div>                            
                  <div class="col-md-3 col-sm-2 col-xs-2">                            
                    <input type="number" name="jum_persalinan" class="form-control col-md-3" placeholder="Persalinan"> 
                  </div>                            
                  <div class="col-md-3 col-sm-2 col-xs-2">                              
                    <input type="number" name="jum_keguguran" class="form-control col-md-5" placeholder="Keguguran"> 
                  </div>      
                </div>
              </div>
            </form> 

            <script type="text/javascript">

                          //view data

                          function loaddata(){
                            var datahandler = $("#barisdata");
                            var id_pemeriksaan = $("[name='id_pemeriksaan']").val();
                            var no_rm = $("[name='no_rm']").val();
                            datahandler.html("");
                            $.ajax({
                              type: "POST",
                              data : "id_pemeriksaan="+id_pemeriksaan+"&no_rm="+no_rm,
                              url :'http://localhost:8080/klinikcm/modules/anc/view_rk.php',
                              success : function(result){
                                var resultobj = JSON.parse(result);                                

                                $.each(resultobj,function(key,val){
                                  var newrow = $("<tr>");
                                  newrow.html("<td>"+val.anak+"</td><td>"+val.tahun+"</td><td>"+val.umur+"</td><td>"+val.jk+"</td><td>"+val.bbl+"</td><td>"+val.cara_persalinan+"</td><td>"+val.penolong+"</td><td>"+val.tmp_persalinan+"</td><td><input type='button' onclick='hapusdata("+val.id_detanc+")' class='btn btn-danger fa fa-trash' value='Hapus'> </td>");

                                  datahandler.append(newrow);

                                });
                              }
                            });
                          }

                            // insert data
                            loaddata();
                            function insertdata(){
                              var id_pemeriksaan = $("[name='id_pemeriksaan']").val();
                              var no_rm = $("[name='no_rm']").val();
                              var anak = $("[name='anak']").val();
                              var tahun = $("[name='tahun']").val();
                              var umur_a = $("[name='umur_a']").val();
                              var jk_a = $("[name='jk_a']").val();
                              var bbl_a = $("[name='bbl_a']").val();
                              var persalinan_a = $("[name='persalinan_a']").val();
                              var penolong = $("[name='penolong']").val();
                              var tmp_salinan = $("[name='tmp_salinan']").val();

                              $.ajax({
                                type  : "POST",
                                data  : "anak="+anak+"&tahun="+tahun+"&umur_a="+umur_a+"&jk_a="+jk_a+"&bbl_a="+bbl_a+"&persalinan_a="+persalinan_a+"&penolong="+penolong+"&tmp_salinan="+tmp_salinan+"&id_pemeriksaan="+id_pemeriksaan+"&no_rm="+no_rm,
                                url   : 'http://localhost:8080/klinikcm/modules/anc/insert_rk.php',
                                success : function(result){
                                  var resultobj = JSON.parse(result);
                                  $("#pesaneror").html(resultobj.message);
                                  $("[name='anak']").val("");
                                  $("[name='tahun']").val("");
                                  $("[name='umur_a']").val("");
                                  $("[name='jk_a']").val("");
                                  $("[name='bbl_a']").val("");
                                  $("[name='persalinan_a']").val("");
                                  $("[name='penolong']").val("");
                                  $("[name='tmp_salinan']").val("");
                                  loaddata();
                                }
                              });
                            }

                                //Hapus
                                function hapusdata(id_detanc){
                                  var tanya = confirm("Apakah Anda Yakin Akan Mengghapus Obat Ini?");
                                  if (tanya) {
                                    $.ajax({
                                      type : "POST",
                                      data : "id_detanc="+id_detanc,
                                      url : "http://localhost:8080/klinikcm/modules/anc/hapus_rk.php",
                                      success : function(result){
                                        loaddata();
                                      }
                                    });
                                  }
                                }



                              </script>        

                            </div>

                            <div id="step-3">
                              <strong><h4>Riwayat Kehamilan Sekarang</h4></strong>   
                              <strong><p style="text-decoration: underline;">KU</p></strong>

                              <form class="form-horizontal form-label-left" style=" overflow-y: hidden;" method="post">

                               <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>HPHT</label>
                                  <input type="date" name="hpht" class="form-control col-md-6 col-xs-6">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>HPL</label>
                                  <input type="date" name="hpl" class="form-control col-md-6 col-xs-6">
                                </div>                            
                              </div>

                              <div class="form-group">                  
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Mutah-Muntah</label>
                                  <select name="muntah" class="form-control">
                                    <option>Biasa</option>
                                    <option>Terus Menerus</option>
                                  </select>
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Nyeri Perut</label>
                                  <select name="nyeri_perut" class="form-control">
                                    <option>Ada</option>
                                    <option>Tidak</option>
                                  </select>
                                </div>                           
                              </div>

                              <div class="form-group">                  
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Pusing-Pusing</label>
                                  <select name="pusing" class="form-control">
                                    <option>Biasa</option>
                                    <option>Terus Menerus</option>
                                  </select>
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Nafsu Makan</label>
                                  <select name="nafs_mkn" class="form-control">
                                    <option>Baik</option>
                                    <option>Menurun</option>
                                  </select>
                                </div>                           
                              </div>

                              <div class="form-group">                  
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <label>Pendarahan</label>
                                  <select name="pendarahan" class="form-control">
                                    <option>Ada</option>
                                    <option>Tidak</option>
                                  </select>
                                </div> 

                                <div class="col-md-12 col-sm-12 col-xs-12">                    
                                  <label class="control-label">Penyakit Yang Diderita:&ensp;</label>
                                  <div class="checkbox-inline">                      

                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value" value="Paru" class="form-check-input">Paru
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="checkbox-label">
                                      <input type="checkbox" class="get_value" value="DM" class="form-check-input">DM
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value" value="Jantung" class="form-check-input">Jantung
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value" value="Epilepsi" class="form-check-input" >Epilepsi
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value" value="Hati" class="form-check-input">Hati
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value" value="Psikosis" class="form-check-input">Psikosis
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value" value="Ginjal" class="form-check-input">Ginjal
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value" value="Malaria" class="form-check-input" >Malaria
                                    </label>
                                  </div>
                                </div> 

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <label>Riwayat Penyakit Keluarga:&ensp;</label>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value1" value="Hipertensi" class="form-check-input">Hipertensi
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value1" value="DM" class="form-check-input">DM
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value1" value="KP" class="form-check-input">KP
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value1" value="Jantung" class="form-check-input">Jantung
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value1" value="Epilepsi" class="form-check-input">Epilepsi
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value1" value="Gemeli" class="form-check-input">Gemeli
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value1" value="Psikosis" class="form-check-input">Psikosis
                                    </label>
                                  </div>

                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value1" value="Cacat Bawaan" class="form-check-input">Cacat Bawaan
                                    </label>
                                  </div>
                                </div>  

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <label>Kebiasaan:&ensp;</label>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value2" value="Merokok" class="form-check-input">Merokok
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value2" value="Minuman Keras" class="form-check-input">Minuman Keras
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value2" value="Narkoba" class="form-check-input">Narkotik
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value2" value="Obat Penenang" class="form-check-input">Obat Penenang
                                    </label>
                                  </div>
                                </div> 

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <label>Keluahan Fluor Albus:&ensp;</label> 
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value3" value="Gatal" class="form-check-input">Gatal
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value3" value="Berbau" class="form-check-input">Berbau
                                    </label>
                                  </div>                    
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value3" value="Seperti Susu" class="form-check-input">Seperti Susu
                                    </label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="get_value3" value="Busa Cair" class="form-check-input">Busa Cair
                                    </label>
                                  </div>
                                </div> 

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <label>Pasangan Sexual Istri</label>
                                  <select name="passex_istri" class="form-control">
                                    <option>Satu</option>
                                    <option>Lebih Dari Satu</option>
                                  </select>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <label>Pasangan Sexual Suami</label>
                                  <select name="passex_suami" class="form-control">
                                    <option>Satu</option>
                                    <option>Lebih Dari Satu</option>
                                  </select>
                                </div> 
                              </div>
                            </form>
                          </div>

                          <div id="step-4">
                            <strong><h2>Pemeriksaan</h2></strong>

                            <form class="form-horizontal form-label-left" style=" overflow-y: hidden;" method="post">
                              <div class="form-group">                  
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Bentuk Tubuh</label>
                                  <select name="bt" class="form-control">
                                    <option>Normal</option>
                                    <option>Kelainan</option>
                                    <option>Abnormal</option>
                                  </select>
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Paru</label>
                                  <select name="paru" class="form-control">
                                    <option>Normal</option>
                                    <option>Bentuk Dada</option>
                                  </select>
                                </div>                           
                              </div>

                              <div class="form-group">                  
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Kesadaran</label>
                                  <select name="sadar" class="form-control">
                                    <option>Baik</option>
                                    <option>Ada Gannguan</option>                      
                                  </select>
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Jantung</label>
                                  <select name="jantung" class="form-control">
                                    <option>Nafas Normal</option>
                                    <option>Sesak</option>
                                  </select>
                                </div>                           
                              </div>

                              <div class="form-group">                  
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Mata</label>
                                  <select name="mata" class="form-control">
                                    <option>Normal</option>
                                    <option>Kuning Pucat</option>                      
                                  </select>
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Hati</label>
                                  <select name="hati" class="form-control">
                                    <option>Normal</option>
                                    <option>Pembesaran</option>
                                  </select>
                                </div>                           
                              </div>

                              <div class="form-group">                  
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Leher</label>
                                  <select name="leher" class="form-control">
                                    <option>Besar</option>
                                    <option>Tidak</option>                      
                                  </select>
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Suhu Badan</label>
                                  <select name="sb" class="form-control">
                                    <option>Normal</option>
                                    <option>Demam</option>
                                  </select>
                                </div>                           
                              </div>

                              <div class="form-group">                  
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Payudara</label>
                                  <select name="payudara" class="form-control">
                                    <option>Normal</option>
                                    <option>Ada Benjolan</option>                      
                                    <option>Kemerahan</option>
                                    <option>Puting Masuk</option>                      
                                  </select>
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                  <label>Genetelia</label>
                                  <select name="genetelia" class="form-control">
                                    <option>Varises</option>
                                    <option>Jengger</option>
                                    <option>Condilo</option>
                                    <option>Bartolinitis</option>
                                  </select>
                                </div>                           
                              </div>


                            </form>



                          </div>


                        </div>                      


                      </div>
                      <!-- End SmartWizard Content --> 

                    </div>
                  </div>
                </div>
              </div>  

              <script type="text/javascript">              
                function simpandata(){

                  var id_pemeriksaan = $("[name='id_pemeriksaan']").val();
                  var no_rm = $("[name='no_rm']").val();                                  
                  var id_bidan = $("[name='id_bidan']").val();
                  var umur = $("[name='umur']").val();
                  var alergi_obat = $("[name='alergi_obat']").val();
                  var nama_s = $("[name='nama_s']").val();
                  var umur_s = $("[name='umur_s']").val();
                  var agama_s = $("[name='agama_s']").val();                                  
                  var pndk_s = $("[name='pndk_s']").val();
                  var kerja_s = $("[name='kerja_s']").val();
                  var anak = $("[name='anak']").val();
                  var tahun = $("[name='tahun']").val();
                  var jum_kehamilan = $("[name='jum_kehamilan']").val();
                  var jum_persalinan = $("[name='jum_persalinan']").val();                                  
                  var jum_keguguran = $("[name='jum_keguguran']").val();
                  var hpht = $("[name='hpht']").val();
                  var hpl = $("[name='hpl']").val();
                  var muntah = $("[name='muntah']").val();
                  var nyeri_perut = $("[name='nyeri_perut']").val();
                  var pusing = $("[name='pusing']").val();                                  
                  var nafs_mkn = $("[name='nafs_mkn']").val();
                  var pendarahan = $("[name='pendarahan']").val();                  
                  var passex_istri = $("[name='passex_istri']").val();
                  var passex_suami = $("[name='passex_suami']").val();
                  var bt = $("[name='bt']").val();
                  var paru = $("[name='paru']").val();
                  var sadar = $("[name='sadar']").val();
                  var jantung = $("[name='jantung']").val();                                  
                  var mata = $("[name='mata']").val();
                  var hati = $("[name='hati']").val();
                  var leher = $("[name='leher']").val();
                  var sb = $("[name='sb']").val();  
                  var payudara = $("[name='payudara']").val();
                  var genetelia = $("[name='genetelia']").val();                  
                  var kd_detpol = $("[name='kd_detpol']").val();                  
                  var derita_sakit = [];  
                   $('.get_value').each(function(){  
                        if($(this).is(":checked"))  
                        {  
                             derita_sakit.push($(this).val());  
                        }  
                   });  
                   derita_sakit = derita_sakit.toString();                 
                  var rw_skt = []; 
                  $('.get_value1').each(function(){  
                        if($(this).is(":checked"))  
                        {  
                             rw_skt.push($(this).val());  
                        }  
                   });  
                   rw_skt = rw_skt.toString();
                  var kebiasaan = []; 
                  $('.get_value2').each(function(){  
                        if($(this).is(":checked"))  
                        {  
                             kebiasaan.push($(this).val());  
                        }  
                   }); 
                  kebiasaan = kebiasaan.toString();
                  var keluhan = []; 
                  $('.get_value3').each(function(){  
                        if($(this).is(":checked"))  
                        {  
                             keluhan.push($(this).val());  
                        }  
                   }); 
                  keluhan = keluhan.toString();

                 

                  $.ajax({
                    type  : "POST",
                    data  : "id_pemeriksaan="+id_pemeriksaan+"&no_rm="+no_rm+"&id_bidan="+id_bidan+"&umur="+umur+"&alergi_obat="+alergi_obat+"&nama_s="+nama_s+"&umur_s="+umur_s+"&agama_s="+agama_s+"&pndk_s="+pndk_s+"&kerja_s="+kerja_s+"&anak="+anak+"&tahun="+tahun+"&jum_kehamilan="+jum_kehamilan+"&jum_persalinan="+jum_persalinan+"&jum_keguguran="+jum_keguguran+"&hpht="+hpht+"&hpl="+hpl+"&muntah="+muntah+"&nyeri_perut="+nyeri_perut+"&pusing="+pusing+"&nafs_mkn="+nafs_mkn+"&pendarahan="+pendarahan+"&derita_sakit="+derita_sakit+"&rw_skt="+rw_skt+"&kebiasaan="+kebiasaan+"&keluhan="+keluhan+"&passex_istri="+passex_istri+"&passex_suami="+passex_suami+"&bt="+bt+"&paru="+paru+"&sadar="+sadar+"&jantung="+jantung+"&mata="+mata+"&hati="+hati+"&leher="+leher+"&sb="+sb+"&payudara="+payudara+"&genetelia="+genetelia+"&kd_detpol="+kd_detpol,
                    url   : 'http://localhost:8080/klinikcm/modules/anc/insert.php',
                                    success : function(hasil){      
                                      loaddata();
                                      window.location.href = "index.php?page=anc";
                                      alert('Data Pelayanan ANC Berhasil Disimpan');
                                    }

                                  });
                }
              </script>                 

        <!-- /page content -->