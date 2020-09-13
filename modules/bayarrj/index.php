<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $id_resep= $_GET['id_resep'];
    mysqli_query($db, "DELETE FROM resep_obat WHERE id_resep='$id_resep'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=dafambilobat'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Pembayaran Rawat Jalan</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">    
      <label>Tanggal</label>    
      <input type="text" value="<?php echo date('d-m-Y'); ?>" style="width:80px;" readonly><br><br>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Pemeriksaan</th>
              <th>ID Pemeriksaan</th>
              <th>Nama Pasien</th>
              <th>Jenis Kelamin</th>
              <th>Layanan</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $no     = 1;
            $date = date('Y-m-d');
             
            $query  = mysqli_query($db,"SELECT pemeriksaan.*,det_poly.kd_detpol,det_poly.layanan,pasien.nama_lengkap,pasien.jk FROM pemeriksaan JOIN det_poly ON pemeriksaan.kd_detpol=det_poly.kd_detpol JOIN pasien ON pemeriksaan.no_rm=pasien.no_rm AND DATE(pemeriksaan.tgl_pemeriksaan)='$date'  WHERE pemeriksaan.keterangan='Telah Melakukan Pembayaran' OR pemeriksaan.keterangan='Telah Mengambil Obat'");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo date("d-m-Y",strtotime($pecah ['tgl_pemeriksaan'])); ?></td>
                  <td><?php echo $pecah ['id_pemeriksaan']; ?></td>
                  <td><?php echo $pecah ['nama_lengkap'];?></td>
                  <td><?php echo $pecah ['jk'];?></td>
                  <td><?php echo $pecah ['layanan'];?></td>
                  <td><?php echo "<span class='label label-info'>".$pecah['keterangan']."</span>" ?></td>
               <td>
                <?php if ($pecah['keterangan']=='Telah Melakukan Pembayaran') { ?>              
                  <a class="btn btn-xs btn-success" href="./modules/bayarrj/notarj.php?id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Cetak Nota"><i class="fa fa-print"></i></a>
                  <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=bayrj&aksi=hapus&id_resep=<?php echo $pecah['id_resep']; ?>" data-toggle="tooltip" data-placement="bottom" title="Bayar">
                  <i class="fa fa-trash"></i></a>
                  <?php }else{ ?>
                  <a class="btn btn-xs btn-info" href="index.php?page=transbayrj&id_pemeriksaan=<?php echo $pecah['id_pemeriksaan'];?>" data-toggle="tooltip" data-placement="bottom" title="Bayar"><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=bayrj&aksi=hapus&id_resep=<?php echo $pecah['id_resep']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
                <?php } ?>
                </td>
                
                
              </tr>
              <?php $no++; }} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
