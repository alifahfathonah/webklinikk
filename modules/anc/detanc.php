
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2> Pemeriksaan Kehamilan </h2>
                      <ul class="nav navbar-right">
                        <li><a class="close-link" href="index.php?page=anc" class="pull-right"><i class="fa fa-close"></i></a></li>
                    </ul>
                      <div class="clearfix"></div>
                    </div>
                     <?php

                         $id_pemeriksaan = $_GET['id_pemeriksaan'];
                         $no_rm = $_GET['no_rm'];

                         $query  = mysqli_query($db,"SELECT anc.tgl_pemeriksaan,anc.id_pemeriksaan,pasien.nama_lengkap,anc.umur,pasien.agama,pasien.pendidikan_akhir,pasien.pekerjaan,pasien.alamat,anc.nm_suami,anc.umur_suami,anc.agama_suami,anc.pnd_suami,anc.kerja_suami,anc.jum_hamil,anc.jum_persalinan,anc.jum_keguguran,pasien.no_hp,bidan.nama AS nama_bidan FROM anc JOIN pasien ON anc.no_rm = pasien.no_rm JOIN bidan ON anc.id_bidan=bidan.id_bidan WHERE anc.id_pemeriksaan='$id_pemeriksaan'");
                         $hitung = mysqli_num_rows($query);

                         $query1  = mysqli_query($db,"SELECT anc_det.* FROM anc_det WHERE id_pemeriksaan='$id_pemeriksaan' AND no_rm='$no_rm'");
                         $hitung1 = mysqli_num_rows($query1);

                         $query2  = mysqli_query($db,"SELECT anc_ku.*,anc.hpht,anc.hpl FROM anc_ku JOIN anc ON anc_ku.id_pemeriksaan=anc.id_pemeriksaan WHERE anc_ku.id_pemeriksaan='$id_pemeriksaan'");
                         $hitung2 = mysqli_num_rows($query2);

                         $query3  = mysqli_query($db,"SELECT anc_prs.* FROM anc_prs WHERE id_pemeriksaan='$id_pemeriksaan'");
                         $hitung3 = mysqli_num_rows($query3);
                      ?>
                    <div class="x_content">                     
        <table id="datatable" class="table table-striped table-bordered" style="text-align:bold">            
          <?php 
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

           ?>
            <tr>
                <td>ID Layanan</td>
                <td><?php echo $pecah['id_pemeriksaan']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Dilayani</td>
                <td><?php echo date("d-m-Y",strtotime($pecah['tgl_pemeriksaan'])); ?></td>
            </tr>
            <tr>
                <td>Penanggung Jawab Pelayanan ANC</td>
                <td><?php echo $pecah['nama_bidan'] ; ?></td>
            </tr>
            <tr>
                <td style="width: 255px;">Nama</td>
                <td><?php echo $pecah['nama_lengkap']; ?></td>
            </tr>                        
            <tr>
                <td>Umur</td>
                <td><?php echo $pecah['umur']; ?></td>                
            </tr>
            <tr>
                <td>Agama</td>
                <td><?php echo $pecah['agama']; ?></td>                
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td><?php echo $pecah['pendidikan_akhir']; ?></td>                
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td><?php echo $pecah['pekerjaan']; ?></td>                
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo $pecah['alamat']; ?></td>                
            </tr>
            <tr>
                <td>Nama Suami</td>
                <td><?php echo $pecah['nm_suami']; ?></td>
            </tr>
            <tr>
                <td>Umur Suami</td>
                <td><?php echo $pecah['umur_suami']; ?></td>
            </tr>
            <tr>
                <td>Agama Suami</td>
                <td><?php echo $pecah['agama_suami']; ?></td>
            </tr>
            <tr>
                <td>Pekerjaan Suami</td>
                <td><?php echo $pecah['kerja_suami']; ?></td>
            </tr>
            <tr>
                <td>No.Telp</td>
                <td><?php echo $pecah['no_hp']; ?></td>
            </tr>
            <tr>
             <td style="text-decoration: underline; font-size: 15px;"><b>Pemeriksaan Kehamilan</b></td> 
             <td style="border: none;"></td>
           </tr>
            <tr>
                <td>Jumlah GPA</td>
                <td>Gravida(Kehamilan) : <?php echo $pecah['jum_hamil'] ."&emsp;Partus (Persalinan):&emsp;".$pecah['jum_persalinan'] ."&emsp;Abortus (Keguguran):&emsp;". $pecah['jum_keguguran']; ?></td>                
            </tr>
          </table>

            <?php }} ?>

            <table  class="table table-bordered" style="text-align:bold">                
             
           <thead>
            <tr>
              <th>Anak Ke</th>                            
              <th>Tahun</th>
              <th>Umur Anak</th>                            
              <th>P/L</th>
              <th>BBL</th>
              <th>Cara Persalinan</th>
              <th>Penolong</th>
              <th>Tempat Bersalin</th>
            </tr>
          </thead>
          <?php 
            if ($hitung1>0) {
              while ($pecah1 = mysqli_fetch_assoc($query1)) {

           ?>
          <tbody>
            <td><?php echo $pecah1['anak']; ?></td>
            <td><?php echo $pecah1['tahun']; ?></td>
            <td><?php echo $pecah1['umur']; ?></td>
            <td><?php if ($pecah1['jk']=='Laki-Laki') {
              echo "L";
            }else{ echo "P";} ?></td>
            <td><?php echo $pecah1['bbl']; ?></td>
            <td><?php echo $pecah1['cara_persalinan']; ?></td>
            <td><?php echo $pecah1['penolong']; ?></td>
            <td><?php echo $pecah1['tmp_persalinan']; ?></td>
          </tbody>
          <?php }} ?>

          </table>

          <table class="table table-striped table-bordered" style="text-align:bold">
          
          
           <tr>
             <td  style="text-decoration: underline; font-size: 15px;"><b>Riwayat Kehamilan Sekarang</b></td> 
             <td style="border: none;"></td>
           </tr>
           <?php 
            if ($hitung2>0) {
              while ($pecah2 = mysqli_fetch_assoc($query2)) {

           ?>
            <tr>
                <td style="width:255px;">HPHT</td>
                <td><?php echo date("d-m-Y",strtotime($pecah2['hpht'])); ?></td>
            </tr>
            <tr>
                <td>HPL</td>
                <td><?php echo date("d-m-Y",strtotime($pecah2['hpl'])); ?></td>
            </tr>
            <tr>
                <td>Muntah-Muntah</td>
                <td><?php echo $pecah2['muntah']; ?></td>
            </tr>
            <tr>
                <td>Nyeri Perut</td>
                <td><?php echo $pecah2['nyeri_perut']; ?></td>
            </tr>            
            <tr>
                <td>Pusing-Pusing</td>
                <td><?php echo $pecah2['pusing']; ?></td>
            </tr>
            <tr>
                <td>Nafsu Makan</td>
                <td><?php echo $pecah2['nfsu_mkn']; ?></td>
            </tr>            
            <tr>
                <td>Pendarahan</td>
                <td><?php echo $pecah2['pendarahan']; ?></td>
            </tr>
            <tr>
                <td>Derita Sakit</td>
                <td><?php if ($pecah2['derita_sakit']=='') {
                  echo "-";
                }else{echo $pecah2['derita_sakit']; } ?></td>
            </tr>
            <tr>
                <td>Riwayat Sakit Keluarga</td>
                <td><?php if ($pecah2['rw_sktkeluarga']=='') {
                  echo "-";
                }else{ echo $pecah2['rw_sktkeluarga'];} ?></td>
            </tr>
            <tr>
                <td>Kebiasaan</td>
                <td><?php if ($pecah2['kebiasaan']=='') {
                  echo "-";
                }else{ echo $pecah2['kebiasaan'];} ?></td>
            </tr>
             <tr>
                <td>Keluhan</td>
                <td><?php if ($pecah2['keluhan']=='') {
                  echo "-";
                }else{ echo $pecah2['keluhan'];} ?></td>
            </tr>           
            <tr>
                <td>Pasangan Sexual Istri</td>
                <td><?php echo $pecah2['ps_sexistri']; ?></td>
            </tr>
            <tr>
                <td>Pasangan Sexual Suami</td>
                <td><?php echo $pecah2['ps_sexsuami']; ?></td>
            </tr>
          <?php }} ?>

           <tr>
             <td style="text-decoration: underline; font-size: 15px;"><b>Pemeriksaan</b></td> 
             <td style="border: none;"></td>
           </tr>

          <?php 
            if ($hitung3>0) {
              while ($pecah3 = mysqli_fetch_assoc($query3)) {

           ?>

           <tr>
                <td>Bentuk Tubuh</td>
                <td><?php echo $pecah3['bntuk_tbh']; ?></td>
            </tr>
            <tr>
                <td>Paru</td>
                <td><?php echo $pecah3['paru']; ?></td>
            </tr>
             <tr>
                <td>Kesadaran</td>
                <td><?php echo $pecah3['kesadaran']; ?></td>
            </tr>
            <tr>
                <td>Jantung</td>
                <td><?php echo $pecah3['jantung']; ?></td>
            </tr>
             <tr>
                <td>Mata</td>
                <td><?php echo $pecah3['mata']; ?></td>
            </tr>
            <tr>
                <td>Hati</td>
                <td><?php echo $pecah3['hati']; ?></td>
            </tr>
             <tr>
                <td>Leher</td>
                <td><?php echo $pecah3['leher']; ?></td>
            </tr>
            <tr>
                <td>Suhu Badan</td>
                <td><?php echo $pecah3['sb']; ?></td>
            </tr>
             <tr>
                <td>Payudara</td>
                <td><?php echo $pecah3['payudara']; ?></td>
            </tr>
            <tr>
                <td>Paru</td>
                <td><?php echo $pecah3['genetelia']; ?></td>
            </tr>
          <?php }} ?>
        </table>
      
      </div>
    </div>
  </div>

  </div>
