<div class="center_col" role="main">
          <div class="">            

            <div class="clearfix"></div>

            <div class="row">              
              
              <div class="clearfix"></div>
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Rekam Medis Imunisasi</h2>                   
                    <ul class="nav navbar-right">                      
                      <li><a href="index.php?page=imunisasi"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <?php 

                     $no_rm= $_GET['no_rm'];

                       $query = mysqli_query($db,"SELECT imunisasi.*,bidan.nama,pasien.nama_lengkap,pasien.tempat_lahir,pasien.tgl_lahir,pasien.alamat FROM imunisasi JOIN pasien ON imunisasi.no_rm=pasien.no_rm JOIN bidan ON imunisasi.id_bidan=bidan.id_bidan WHERE imunisasi.no_rm='$no_rm'");
                          $pecah = mysqli_fetch_assoc($query);
                            
                     ?>
                                
                    <table>
                  <tr>
                    <td>Nama</td>  
                    <td>&emsp;: </td>  
                    <td><?php echo $pecah['nama_lengkap']; ?></td>  
                  </tr>
                  <tr>
                  <td>TTL</td>  
                  <td>&emsp;:&ensp; </td>  
                  <td><?php echo $pecah['tempat_lahir'] ." , ". $pecah['tgl_lahir']; ?></td>  
                  </tr>                  
                  <tr>
                  <td>Nama Ibu</td>  
                  <td>&emsp;:&ensp; </td>  
                  <td><?php echo $pecah['nm_ibu']; ?></td>  
                  </tr>
                  <tr>
                  <td>Nama Ayah</td>  
                  <td>&emsp;:&ensp; </td>  
                  <td><?php echo $pecah['nm_ayah']; ?></td>  
                  </tr>
                  <tr>
                  <td>No HP</td>  
                  <td>&emsp;:&ensp; </td>  
                  <td><?php echo $pecah['no_telp']; ?></td>  
                  </tr>
                  <tr>
                  <td>Alergi Obat</td>  
                  <td>&emsp;:&ensp; </td>  
                  <td><?php echo $pecah['alamat']; ?></td>  
                  </tr>
                  <tr>
                  <td style="text-decoration: underline;">Data Lahir</td>  
                  </tr>
                  <tr>
                    <td>BB Lahir</td>  
                    <td>&emsp;:&ensp; </td>  
                    <td><?php echo $pecah['bb_lhr'] ." Kg"; ?></td>  
                  </tr>
                  <tr>
                    <td>PB Lahir</td>  
                    <td>&emsp;:&ensp; </td>  
                    <td><?php echo $pecah['pb_lhr']." Cm"; ?></td>  
                  </tr>

                  </table>                  
                    <br>
                    <table class="table table-bordered">                                            
                      <thead>
                        <tr>                          
                          <th>ID Layanan</th>
                          <th>Tanggal Dilayani</th>
                          <th>umur</th>
                          <th>PB</th>
                          <th>BBL</th>
                          <th>Vaksin</th>
                        </tr>
                      </thead>  
                      <?php 

                        $id_pemeriksaan = $_GET['id_pemeriksaan'];

                        $query1 = mysqli_query($db,"SELECT imunisasi.tgl_pemeriksaan,imunisasi.bb,imunisasi.pb,imunisasi.umur,det_imun.kd_detimun,det_imun.id_pemeriksaan,det_imun.kd_vaksin,GROUP_CONCAT(imun_vaksin.nm_vaksin) AS vaksin FROM imunisasi JOIN det_imun ON det_imun.id_pemeriksaan=imunisasi.id_pemeriksaan JOIN imun_vaksin ON det_imun.kd_vaksin=imun_vaksin.kd_vaksin WHERE imunisasi.no_rm='$no_rm' GROUP BY imunisasi.id_pemeriksaan");
                         $hitung1 = mysqli_num_rows($query1);
                            if ($hitung1>0) {
                              while ($pecah1 = mysqli_fetch_assoc($query1)) {
                       ?>                    
                      <tbody>
                         
                        <tr>
                          <th><?php echo $pecah1['id_pemeriksaan']; ?></th>
                          <th><?php echo date("d-m-Y H:i",strtotime($pecah1['tgl_pemeriksaan'])); ?></th>
                          <td><?php echo $pecah1['umur']; ?></td>
                          <td><?php echo $pecah1['pb'] ." Cm"; ?></td>                        
                          <td><?php echo $pecah1['bb'] ." Kg";?></td>                            
                          <td><?php echo $pecah1['vaksin'];?></td>                            
                        </tr>                                                
                      </tbody>                      
                    <?php }} ?>
                    </table>                  
                  </div>                                  
                </div>


              </div>                            

            </div>            
          </div>
        </div>