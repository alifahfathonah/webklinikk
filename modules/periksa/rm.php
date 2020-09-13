<div class="center_col" role="main">
  <div class="">            

    <div class="clearfix"></div>

    <div class="row">              
      
      <div class="clearfix"></div>
      
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Rekam Medis</h2>                   
            <ul class="nav navbar-right">                      
              <li><a href="index.php?page=dafperiksa"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
           <?php 

           $no_rm= $_GET['no_rm'];

           $query = mysqli_query($db,"SELECT pemeriksaan.no_rm,pasien.nama_lengkap,pasien.jk,pemeriksaan.umur,pasien.pekerjaan,pasien.alamat,pasien.no_hp,pasien.alergi_obat FROM pemeriksaan JOIN pasien ON pemeriksaan.no_rm=pasien.no_rm WHERE pemeriksaan.no_rm='$no_rm'");
           $pecah = mysqli_fetch_assoc($query);
           
           ?>
           
           <table>
            <tr>
              <td>Nama</td>  
              <td>&emsp;:&ensp; </td>  
              <td><?php echo $pecah['nama_lengkap']; ?></td>  
            </tr>
            <tr>
              <td>Jenis Kelamin</td>  
              <td>&emsp;:&ensp; </td>  
              <td><?php echo $pecah['jk']; ?></td>  
            </tr>            
            <tr>
              <td>Pekerjaan</td>  
              <td>&emsp;:&ensp; </td>  
              <td><?php echo $pecah['pekerjaan']; ?></td>  
            </tr>
            <tr>
              <td>Alamat</td>  
              <td>&emsp;:&ensp; </td>  
              <td><?php echo $pecah['alamat']; ?></td>  
            </tr>
            <tr>
              <td>No HP</td>  
              <td>&emsp;:&ensp; </td>  
              <td><?php echo $pecah['no_hp']; ?></td>  
            </tr>
            <tr>
              <td>Alergi Obat</td>  
              <td>&emsp;:&ensp; </td>  
              <td><?php echo $pecah['alergi_obat']; ?></td>  
            </tr>
          </table>                  
          <br>
          <table class="table table-bordered">                                            
            <thead>
              <tr>                          
                <th>Tanggal Jam</th>
                <th>Umur</th>
                <th>Tekanan Darah</th>
                <th>Suhu Badan</th>
                <th>Berat Badan</th>
                <th>Anamnesa</th>
                <th>Diagnosa</th>
                <th>Terapi</th>
              </tr>
            </thead>  
            <?php 

            $query1 = mysqli_query($db,"SELECT pemeriksaan.id_pemeriksaan,pemeriksaan.tgl_pemeriksaan,pemeriksaan.umur,pemeriksaan.tekanan_darah,pemeriksaan.suhu_badan,pemeriksaan.bb,pemeriksaan.anamnesa,pemeriksaan.diagnosa,GROUP_CONCAT(obat.nama_obat) AS nama_obat,pemeriksaan.edukasi FROM pemeriksaan JOIN resep_obat ON resep_obat.id_pemeriksaan=pemeriksaan.id_pemeriksaan JOIN det_resep ON det_resep.id_resep=resep_obat.id_resep JOIN obat ON obat.kd_obat=det_resep.kd_obat WHERE pemeriksaan.no_rm='$no_rm' GROUP BY pemeriksaan.id_pemeriksaan");
            $hitung1 = mysqli_num_rows($query1);
            if ($hitung1>0) {
              while ($pecah1 = mysqli_fetch_assoc($query1)) {
               ?>                    
               <tbody>
                 
                <tr>
                  
                  <th><?php echo date("d-m-Y H:i",strtotime($pecah1['tgl_pemeriksaan'])); ?></th>
                  <th><?php echo $pecah1['umur']; ?></th>
                  <td><?php echo $pecah1['tekanan_darah'] ." mmHg"; ?></td>
                  <td><?php echo $pecah1['suhu_badan']." &#8451;"; ?></td>                        
                  <td><?php echo $pecah1['bb']." Kg";?></td>                            
                  <td><?php echo $pecah1['anamnesa']; ?></td>
                  <td><?php echo $pecah1['diagnosa']; ?></td>                        
                  <td><p><?php echo $pecah1['nama_obat'];?></p></td>                            
                </tr>                        
                <td>Edukasi</td>                        
                <td colspan="3"><?php echo $pecah1['edukasi']; ?></td>                      
              </tbody>                      
            <?php }} ?>
          </table>   
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">              
              <a class="btn btn-xs btn-info" href="./modules/periksa/cetakrm.php?no_rm=<?php echo $pecah['no_rm']; ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak RM</a>
            </div>
          </div>               
        </div>                                  
      </div>



    </div>                            

  </div>            
</div>
</div>