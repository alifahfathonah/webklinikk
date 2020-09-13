<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $id_pasien= $_GET['id_pasien'];
    mysqli_query($db, "DELETE FROM pasien WHERE no_rm = '$id_pasien'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=pasien'</script>";
  }
}

?>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Pasien </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a href="index.php?page=tambahpasien" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Pasien</a> <br> <br>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>NO RM</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Pekerjaan</th>
              <th>No Hp</th>
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

                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $pecah ['no_rm']; ?></td>
                  <td><?php echo $pecah ['nama_lengkap'];?></td>
                  <td><?php echo $pecah ['jk'];?></td>
                  <td><?php if ($pecah ['pekerjaan']=="") {
                    echo "-";
                  }else{
                   echo $pecah ['pekerjaan']; 
                 } ?></td>
                 <td><?php if ($pecah ['no_hp']=="") {
                  echo "-";
                }else{
                 echo $pecah ['no_hp']; 
               } ?></td>
               <td>
                <a class="btn btn-xs btn-info" href="index.php?page=editpasien&no_rm=<?php echo $pecah['no_rm']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                <a class="btn btn-xs btn-success" href="index.php?page=detailpasien&no_rm=<?php echo $pecah['no_rm']; ?>" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-search"></i></a>
                <a class="btn btn-xs btn-success" href="./modules/pasien/kartupasien.php?no_rm=<?php echo $pecah['no_rm']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Cetak Kartu"><i class="fa fa-print"></i></a>
                <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=pasien&aksi=hapus&no_rm=<?php echo $pecah['no_rm']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                  <i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php $no++; }} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
