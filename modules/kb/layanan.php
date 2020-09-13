 <!-- page content -->                  

 <div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <ul class="nav navbar-right">                                            
        <li>
          <a href="index.php?page=laykb" class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="x_title">
        <h2>Form Layanan Keluarga Berencana (KB)</h2>                   
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
                  <p>Anamnesa & Pemeriksaan</p>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-3">
                <span class="step_no">3</span>
                <span class="step_descr">
                  <p>Pemilihan Metode Kontrasepsi</p>
                </span>
              </a>
            </li>                        
          </ul>
          <div id="step-1">
            <?php 

            $id_pemeriksaan = $_GET['id_pemeriksaan'];

            $query  = mysqli_query($db,"SELECT pendaftaran.id_pemeriksaan,pendaftaran.no_rm,pendaftaran.umur,pendaftaran.id_bidan,pendaftaran.kd_detpol,pasien.nama_lengkap,pasien.tgl_lahir,pasien.pendidikan_akhir,pasien.pekerjaan,pasien.alergi_obat FROM pendaftaran JOIN pasien ON pasien.no_rm=pendaftaran.no_rm WHERE pendaftaran.id_pemeriksaan='$id_pemeriksaan'");
            $hitung = mysqli_num_rows($query);

            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

               ?>

               <form class="form-horizontal form-label-left" style=" overflow-y: hidden;" method="post">

                <input type="hidden" name="id_pemeriksaan" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['id_pemeriksaan']; ?>" readonly>
                <input type="hidden" name="no_rm" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['no_rm']; ?>" readonly>
                <input type="hidden" name="id_bidan" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['id_bidan']; ?>" readonly>
                <input type="hidden" name="kd_detpol" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['kd_detpol']; ?>" readonly>

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
                    <label>Nama Suami </label>
                    <input type="text" name="nama_suami" class="form-control col-md-6 col-xs-6">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label>Pendidikan Terkahir Istri </label>
                    <input type="text" name="pendidikan_istri" class="form-control col-md-3 col-xs-3" value="<?php echo $pecah['pendidikan_akhir']; ?>" readonly>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label>Pendidikan Terkahir Suami </label>
                    <select class="form-control"  name="pendidikan_suami">
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
                    <label>pekerjaan Suami </label>
                    <input type="text" name="pekerjaan_suami" class="form-control">
                  </div>                                                        
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>pekerjaan Istri </label>
                    <input type="text" name="pekerjaan_istri" class="form-control" value="<?php echo $pecah['pekerjaan'] ?>" readonly>
                  </div>                                                        
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Alergi Obat </label>
                    <textarea class="form-control col-md-6 col-xs-6" name="alergi_obat"><?php echo $pecah['alergi_obat']; ?></textarea>
                  </div>                                                        
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Status Peserja Jaminan Kesehatan Nasiona (JKN) </label>
                    <select class="form-control" name="jkn">
                      <option>Peserta JKN Penerima Bahan Bantuan Iuran</option>
                      <option>Peserta JKN Bukan Penerima Bahan Bantuan Iuran</option>
                      <option>Bukan Peserta JKN</option>                              
                    </select>
                  </div>                                                        
                </div>

                <div class="form-group">                                                          
                  <div class="col-md-6 col-sm-6 col-xs-6">   
                    <label class="control-label col-md-4 col-sm-4 col-xs-4">Jumlah Anak </label>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                      
                      <label>Laki-Laki </label>
                      <input type="number" name="jum_laki" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                      <label>Perempuan </label>
                      <input type="number" name="jum_perempuan" class="form-control">
                    </div>                                    
                  </div>                                                                                                                                            
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Umur Anak Terkecil</label>
                    <input type="text" name="umur_tc" class="form-control">
                  </div>                                                                              
                </div>

                <script type="text/javascript">                                                       

                  function yesnoCheck(that) {
                    if (that.value == "Pernah Pakai Alat KB") {
                      document.getElementById("pilih_kbakhir").style.display = "block";
                    } else {
                      document.getElementById("pilih_kbakhir").style.display = "none";
                    }
                  }

                </script>
                

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Status Peserta KB </label>
                    <select class="form-control" name="status_kb" onchange="yesnoCheck(this);">
                      <option value="Baru Pertama Kali">Baru Pertama Kali</option>
                      <option value="Pernah Pakai Alat KB">Pernah Pakai Alat KB</option>
                    </select> 
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6" id="pilih_kbakhir" style="display: none">
                    <label>Cara KB Terakhir </label>
                    <select class="form-control" name="kb_akhir">
                      <option value="">--Pilih Alat KB Terakhir--</option>
                      <option>IUD</option>
                      <option>MOW</option>
                      <option>HOP</option>
                      <option>Kondom</option>                              
                      <option>Implan</option>                              
                      <option>Suntikan</option>                              
                      <option>Pill</option>                              
                    </select>
                  </div>                                                                          
                </div>

              </form>
            <?php }} ?>
          </div>

          <div id="step-2">                        
            <STRONG><p>
              Penapisan (Skrining) untuk menentukan  alat kontrasepsi yang dapat digunakancalon peserta KB
            </p></STRONG>
            <strong><h4 style="text-decoration-line: underline;">Anamnese</h4></strong>

            <form class="form-horizontal form-label-left" style=" overflow-y: hidden;" method="post">

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Tanggal Haid Terakhir</label>
                  <input type="date" name="terakhir_haid" class="form-control"> 
                </div>                            
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Hamil/Diduga Hamil </label>
                  <select class="form-control" name="dugaan_hamil">
                    <option>Ya</option>
                    <option>Tidak</option>
                  </select>                              
                </div>                                                                          
              </div>

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
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Menyusui </label>
                  <select class="form-control" name="menyusui">
                    <option>Ya</option>
                    <option>Tidak</option>
                  </select>                              
                </div>                                                                          
              </div><br><br>
              
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Riwayat Penyakit Sebelumnya </label>
                  <select class="form-control" name="riwayat_sakit">
                    <option>Tidak Ada</option>
                    <option>Sakit Kuning</option>
                    <option>Pendarahan Pervaginam Yang Tidak Diketahui Sebabnya</option>
                    <option>Keputihan Yang Lama</option>
                    <option>Tumor Payudara</option>
                    <option>Tumor Rahim</option>
                    <option>Tumor Indung Telur</option>
                  </select>                              
                </div> 
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="x_content bs-example-popovers">
                   <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                    <p style="color: white;">-Bila semua jawaban <strong>TIDAK,</strong> dapat diberikan salah satu cara KB (Kecuali IUD dan MOW).
                    </div>
                  </div>
                </div>
              </div>

              <strong><h4 style="text-decoration-line: underline;">Pemeriksaan</h4></strong>
              <div class="form-group has-feedback">
               <div class="col-md-6 col-sm-6 col-xs-6">
                <label>Keadaan Umum </label>
                <select class="form-control" name="kondisi">
                  <option>Baik</option>
                  <option>Sedang</option>
                  <option>Kurang</option>                                
                </select>                              
              </div> 
              <div class="col-md-6 col-sm-6 col-xs-6">
                <label>Berat Badan </label>
                <input type="text" name="bb" class="form-control">
                <span class="form-control-feedback right" aria-hidden="true">Kg</span>
              </div>
            </div>

            <div class="form-group has-feedback">
             <div class="col-md-6 col-sm-6 col-xs-6">
              <label>Tekanana Darah </label>
              <input type="text" name="td" class="form-control">                           
              <span class="form-control-feedback right" aria-hidden="true">mmHg</span>
            </div> 
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label>Posisi Rahim </label>
              <select class="form-control" name="posisi_rahim">
                <option>Retrofleksi</option>
                <option>Anterfleksi</option>
              </select>
            </div>                           
          </div>

          <script type="text/javascript">
            function yesnoCheck2(that) {
              if (that.value == "MOW") {
                document.getElementById("periksa_dlm").style.display = "block";
              }else if (that.value =="IUD") {
                document.getElementById("periksa_dlm").style.display = "block";
              }
              else{
                document.getElementById("periksa_dlm").style.display = "none";
              }

              if (that.value == "MOW") {
                document.getElementById("periksa_tmbh").style.display = "block";
              }else if (that.value =="MOP") {
                document.getElementById("periksa_tmbh").style.display = "block";
              }
              else{
                document.getElementById("periksa_tmbh").style.display = "none";
              }

            }           
          </script>

          
          <div class="form-group">
           <div class="col-md-6 col-sm-6 col-xs-6">
             <label>Alat Kontrasepsi yang Boleh Digunakan</label>
             <select class="form-control" name="kontrasepsi_boleh" onchange="yesnoCheck2(this);">
              <option value="">--Pilih--</option>
              <option value="IUD">IUD</option>
              <option value="MOW">MOW</option>
              <option value="MOP">MOP</option>
              <option value="Kondom">Kondom</option>                              
              <option value="Implan">Implan</option>                              
              <option value="Suntikan">Suntikan</option>                              
              <option value="Pill">Pill</option>
            </select>
          </div>
        </div>

        

        <div class="form-group">
         <div class="col-md-6 col-sm-6 col-xs-6" id="periksa_dlm" style="display: none;">
          <label>Sebelum Melakukan Pemasangan IUD atau MOW dilakuakan pemeriksaan dalam</label>
          <select class="form-control" name="pemeriksaan_dalam">
            <option value="-">-</option>
            <option value="Ada Tanda-Tanda Radang">Ada Tanda-Tanda Radang</option>
            <option value="Ada Tumor/Kegaanasan ginekologi">Ada Tumor/Kegaanasan ginekologi</option>
          </select>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6" id="periksa_tmbh" style="display: none;">
          <label>Periksa Tambahan (Khusus untuk Calon MOP dan MOW)</label>
          <select class="form-control" name="pemeriksaan_tambahan">
            <option value="-">-</option>
            <option value="Tanda-Tanda Diabetes">Tanda-Tanda Diabetes</option>
            <option value="Kelainan Pembekukan Darah">Kelainan Pembekukan Darah</option>
            <option value="Radang Orchitis/Epydimitis">Radang Orchitis/Epydimitis</option>
            <option value="Tumor/Keganasan Ginekologi">Tumor/Keganasan Ginekologi</option>
          </select>
        </div>
      </div>
      

    </form>
  </div>


  <script type="text/javascript">
    function yesnoCheck1(that) {
      if (that.value == 1) {
        document.getElementById("tgl_cbt").style.display = "block";
      }else if (that.value ==2) {
        document.getElementById("tgl_cbt").style.display = "block";
      } else {
        document.getElementById("tgl_cbt").style.display = "none";
      }
    }           
  </script>
  
  
  
  <div id="step-3">
    <h2 class="StepTitle">MeTode Kontrasespsi</h2>

    <form class="form-horizontal form-label-left" style=" overflow-y: hidden;" method="post">

     <div class="form-group">
       <div class="col-md-6 col-sm-6 col-xs-6">
         <label>Metode dan Jenis Alat Kontrasepsi Yang Dipilih</label>
         <select class="form-control" name="metod_kontrasepsi" onchange="yesnoCheck1(this);">
          <option value="">--Pilih Alat KB--</option>
          <?php 
          $sql=mysqli_query($db,"SELECT * FROM alat_kb");
          while ($data=mysqli_fetch_assoc($sql)) {
           ?>
           <option value="<?php echo $data['kd_alatkb']; ?>"><?php echo $data['nama_alat']; ?></option>
         <?php } ?>
       </select>
     </div>
     <div  class="col-md-3 col-sm-6 col-xs-6">
       <label>Tanggal Dipasang</label>
       <input type="date" name="tgl_pasang" class="form-control">
     </div>
     <div  class="col-md-3 col-sm-6 col-xs-6" id="tgl_cbt" style="display: none;">
       <label>Tanggal Dicabut</label>
       <input type="date" name="tgl_cabut" class="form-control">
     </div>
   </div>

 </form>
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
    var nama_suami = $("[name='nama_suami']").val();
    var pendidikan_suami = $("[name='pendidikan_suami']").val();
    var jkn = $("[name='jkn']").val();
    var jum_laki = $("[name='jum_laki']").val();
    var jum_perempuan = $("[name='jum_perempuan']").val();
    var umur_tc = $("[name='umur_tc']").val();
    var status_kb = $("[name='status_kb']").val();
    var kb_akhir = $("[name='kb_akhir']").val();
    var terakhir_haid = $("[name='terakhir_haid']").val();
    var dugaan_hamil = $("[name='dugaan_hamil']").val();
    var jum_kehamilan = $("[name='jum_kehamilan']").val();
    var jum_persalinan = $("[name='jum_persalinan']").val();
    var jum_keguguran = $("[name='jum_keguguran']").val();
    var menyusui = $("[name='menyusui']").val();
    var riwayat_sakit = $("[name='riwayat_sakit']").val();
    var kondisi = $("[name='kondisi']").val();
    var bb = $("[name='bb']").val();
    var td = $("[name='td']").val();
    var pemeriksaan_dalam = $("[name='pemeriksaan_dalam']").val();
    var posisi_rahim = $("[name='posisi_rahim']").val();
    var pemeriksaan_tambahan = $("[name='pemeriksaan_tambahan']").val();
    var kontrasepsi_boleh = $("[name='kontrasepsi_boleh']").val();
    var metod_kontrasepsi = $("[name='metod_kontrasepsi']").val();
    var tgl_pasang = $("[name='tgl_pasang']").val();
    var tgl_cabut = $("[name='tgl_cabut']").val();
    var pekerjaan_suami = $("[name='pekerjaan_suami']").val();
    var alergi_obat = $("[name='alergi_obat']").val();
    var kd_detpol = $("[name='kd_detpol']").val();

    

    $.ajax({
      type  : "POST",
      data  : "id_pemeriksaan="+id_pemeriksaan+"&no_rm="+no_rm+"&id_bidan="+id_bidan+"&umur="+umur+"&nama_suami="+nama_suami+"&pendidikan_suami="+pendidikan_suami+"&jkn="+jkn+"&jum_laki="+jum_laki+"&jum_perempuan="+jum_perempuan+"&umur_tc="+umur_tc+"&status_kb="+status_kb+"&kb_akhir="+kb_akhir+"&terakhir_haid="+terakhir_haid+"&dugaan_hamil="+dugaan_hamil+"&jum_kehamilan="+jum_kehamilan+"&jum_persalinan="+jum_persalinan+"&menyusui="+menyusui+"&riwayat_sakit="+riwayat_sakit+"&kondisi="+kondisi+"&bb="+bb+"&td="+td+"&pemeriksaan_dalam="+pemeriksaan_dalam+"&posisi_rahim="+posisi_rahim+"&pemeriksaan_tambahan="+pemeriksaan_tambahan+"&kontrasepsi_boleh="+kontrasepsi_boleh+"&metod_kontrasepsi="+metod_kontrasepsi+"&tgl_pasang="+tgl_pasang+"&tgl_cabut="+tgl_cabut+"&pekerjaan_suami="+pekerjaan_suami+"&jum_keguguran="+jum_keguguran+"&alergi_obat="+alergi_obat+"&kd_detpol="+kd_detpol,
      url   : 'http://localhost:8080/klinikcm/modules/kb/insert.php',
                                    // loaddata();
                                    success : function(hasil){      
                                      window.location.href = "index.php?page=laykb";
                                      alert('Data Pelayanan KB Berhasil Disimpan');
                                    }

                                  });
  }
</script>                 

        <!-- /page content -->