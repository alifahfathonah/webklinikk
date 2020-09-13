
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Detail Data KB </h2>
        <ul class="nav navbar-right">
          <li><a class="close-link" href="index.php?page=laykb" class="pull-right"><i class="fa fa-close"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <?php

      $id_pemeriksaan = $_GET['id_pemeriksaan'];
      $query  = mysqli_query($db,"SELECT kb.id_pemeriksaan,kb.tgl_pemeriksaan,bidan.nama,pasien.nama_lengkap,pasien.tgl_lahir,kb.nama_suami,kb.pndk_suami,pasien.pendidikan_akhir,kb.pekerjaan_suami,pasien.pekerjaan,pasien.no_hp,pasien.alergi_obat,
        pasien.alamat,kb.jkn,kb.jum_al,kb.jum_ap,kb.jum_umurterkecil,kb.status_kb,kb.kb_terakhir,kb.umur,kb.jum_al+kb.jum_ap AS jum_anak FROM kb JOIN pasien ON kb.no_rm=pasien.no_rm JOIN bidan ON kb.id_bidan=bidan.id_bidan WHERE kb.id_pemeriksaan='$id_pemeriksaan'");
      $hitung = mysqli_num_rows($query);

      $query1  = mysqli_query($db,"SELECT kb.haid_terakhir,kb.status_hamil,kb.jum_hamil,kb.jum_persalinan,kb.jum_keguguran,kb.status_menyusui,kb.riwayat_sakit FROM kb WHERE kb.id_pemeriksaan='$id_pemeriksaan'");
      $hitung1 = mysqli_num_rows($query1);

      $query2  = mysqli_query($db,"SELECT kb.keadaan,kb.bb,kb.td,kb.posisi_rahim,kb.periksa_dalam,kb.periksa_tambahan,kb.alat_kontraboleh,kb.tgl_pesan,kb.tgl_cabut,alat_kb.nama_alat FROM kb JOIN alat_kb ON kb.kd_alatkb=alat_kb.kd_alatkb WHERE kb.id_pemeriksaan='$id_pemeriksaan'");
      $hitung2 = mysqli_num_rows($query2);
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
              <td>Penanggung Jawab Pelayanan KB</td>
              <td><?php echo $_SESSION['level']." ".$pecah['nama'] ; ?></td>
            </tr>
            <tr>
              <td>Nama Peserta KB</td>
              <td><?php echo $pecah['nama_lengkap']; ?></td>
            </tr>                        
            <tr>
              <td>Tempat Tanggal Lahir/Umur</td>
              <td><?php echo date("d-m-Y",strtotime($pecah['tgl_lahir'])) ." / ". $pecah['umur']; ?></td>                
            </tr>
            <tr>
              <td>Nama Suami</td>
              <td><?php echo $pecah['nama_suami']; ?></td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir Suami</td>
              <td><?php echo $pecah['pndk_suami']; ?></td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir Istri</td>
              <td><?php echo $pecah['pendidikan_akhir']; ?></td>
            </tr>
            <tr>
              <td>Pekerjaan Suami</td>
              <td><?php echo $pecah['pekerjaan_suami']; ?></td>
            </tr>
            <tr>
              <td>Pekerjaan Istri</td>
              <td><?php echo $pecah['pekerjaan']; ?></td>
            </tr>
            <tr>
              <td>No HP Peserta KB</td>
              <td><?php echo $pecah['no_hp']; ?></td>
            </tr>
            <tr>
              <td>Alergi Obat</td>
              <td><?php echo $pecah['alergi_obat']; ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td><?php echo $pecah['alamat']; ?></td>
            </tr>
            <tr>
              <td>Status JKN</td>
              <td><?php echo $pecah['jkn']; ?></td>
            </tr>
            <tr>
              <td>Jumlah Anak</td>
              <td><?php echo $pecah['jum_anak'] ."&emsp;Laki-Laki : ". $pecah['jum_al'] ." Perempuan : ". $pecah['jum_ap'];  ?></td>                
            </tr>
            <tr>
              <td>Umur Anak Terkecil</td>
              <td><?php echo $pecah['jum_umurterkecil']; ?></td>
            </tr>
            <tr>
              <td>Status Peserta KB</td>
              <td><?php echo $pecah['status_kb']; ?></td>
            </tr>
            <tr>
              <td>Cara KB Terakhir</td>
              <td><?php if($pecah['kb_terakhir']=='') {
                echo "-";
              }else{
                echo $pecah['kb_terakhir'];
              } ?></td>
            </tr>  

          <?php }} ?>                
          <?php 
          if ($hitung1>0) {
            while ($pecah1 = mysqli_fetch_assoc($query1)) {

             ?>
             <tr>
               <td style="text-decoration: underline; font-size: 15px;"><b>Anamnese</b></td> 
               <td style="border: none;"></td>
             </tr>
             <tr>                
              <td>Haid Terakhir</td>
              <td><?php echo date("d-m-Y",strtotime($pecah1['haid_terakhir'])); ?></td>
            </tr>
            <tr>
              <td>Hamil/Diduga Hamil</td>
              <td><?php echo $pecah1['status_hamil']; ?></td>
            </tr>
            <tr>
              <td>Jumlah GPA</td>
              <td>Gravida(Kehamilan) : <?php echo $pecah1['jum_hamil'] ."&emsp;Partus (Persalinan):&emsp;".$pecah1['jum_persalinan'] ."&emsp;Abortus (Keguguran):&emsp;". $pecah1['jum_keguguran']; ?></td>                
            </tr>           
            <tr>
              <td>Menyusui</td>
              <td><?php echo $pecah1['status_menyusui']; ?></td>
            </tr>
            <tr>
              <td>Riwayat Sakit Sebelumnya</td>
              <td><?php echo $pecah1['riwayat_sakit']; ?></td>
            </tr>
          <?php }} ?>
          
          <?php 
          if ($hitung2>0) {
            while ($pecah2 = mysqli_fetch_assoc($query2)) {

             ?>
             <tr>
               <td  style="text-decoration: underline; font-size: 15px;"><b>Pemeriksaan</b></td> 
               <td style="border: none;"></td>
             </tr>
             <tr>
              <td>Keadaan Umum</td>
              <td><?php echo $pecah2['keadaan']; ?></td>
            </tr>
            <tr>
              <td>Berat Badan</td>
              <td><?php echo $pecah2['bb']." Kg"; ?></td>
            </tr>
            <tr>
              <td>Tekanan Darah</td>
              <td><?php echo $pecah2['td']." mmHg"; ?></td>
            </tr>
            <tr>
              <td>Posisi Rahim</td>
              <td><?php echo $pecah2['posisi_rahim']; ?></td>
            </tr>            
            <tr>
              <td>Hasil Pemeriksaan Dalam</td>
              <td><?php echo $pecah2['periksa_dalam']; ?></td>
            </tr>
            <tr>
              <td>Hasil Pemeriksaan Tambahan</td>
              <td><?php echo $pecah2['periksa_tambahan']; ?></td>
            </tr>
            <tr>
              <td>Alat Kontrasespsi Yang Boleh Digunakan</td>
              <td><?php echo $pecah2['alat_kontraboleh']; ?></td>
            </tr>
            <tr>
              <td>Metode dan Jenis Alat Kontrasespsi Yang Dipilih</td>
              <td><?php echo $pecah2['nama_alat']; ?></td>
            </tr>
            <tr>
              <td>Tanggal Dipesan Kembali</td>
              <td><?php echo date("d-m-Y",strtotime($pecah2['tgl_pesan'])); ?></td>
            </tr>
            <tr>
              <td>Tanggal Dicabut</td>
              <td><?php  if($pecah2['tgl_cabut']=='0000-00-00') {
                echo "-";
              }else{
                date("d-m-Y",strtotime($pecah2['tgl_cabut']));
              } ?></td>
            </tr>
          <?php }} ?>
        </table>
        
      </div>
    </div>
  </div>

</div>
