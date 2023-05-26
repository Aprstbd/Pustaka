<?php
if(!defined('pustaka')){
  header('location:index.php');
}
?>
<div class="panel panel-default">
  <div class="panel-heading">
    Data Anggota Perpustakaan STMIK Amik Riau
  </div>
  <div class="panel">
    <div>
      <a href="?page=anggota" class="btn btn-primary"> <i class="fa fa-plus-circle"></i>Tambah Data</a>
    </div>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nomor Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Nomor Handphone</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          include "koneksi.php";
          //error_reporting(0);

          $no = 1;
          $lap = mysqli_query($koneksi, "select * from anggota order by id DESC");
          while ($r = mysqli_fetch_array($lap)) {

          ?>

            <tr class="odd gradeX">
              <td class="center"><?= $no; ?></td>
              <td class="center"><?= $r['nmr_anggota']; ?></td>
              <td class="center"><?= $r['nama']; ?></td>
              <td class="center"><?= $r['alamat']; ?></td>
              <td class="center"><?= $r['handphone']; ?></td>
              <td class="center"><?= $r['ttl']; ?></td>
              <td class="center"><?php echo "aktif"; ?></td>
              <td class="center" width="180">
              <a href="?page=update_anggota&id=<?= $r['id']; ?>"class="btn btn-success">Update</a> |
              <a href="?page=hapus_anggota&id=<?= $r['id']; ?>" class="btn btn-danger">Delete</a>


              </td>
            </tr>
          <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>