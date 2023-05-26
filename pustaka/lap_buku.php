<?php
if(!defined('pustaka')){
  header('location:index.php');
}
?>
<div class="panel panel-default">
  <div class="panel-heading">
    Data Buku Perpustakaan STMIK Amik Riau
  </div>
  <div class="panel">
    <div>
      <a href="?page=buku" class="btn btn-primary"> <i class="fa fa-plus-circle"></i>Tambah Data</a>
    </div>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Jumlah Buku Tersedia</th>
            <th>Jumlah Buku Dipinjam</th>
            <th>ISBN</th>
            <th>Lokasi Buku</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          include "koneksi.php";
          //error_reporting(1);
		  include "func.php";
		  
          $no = 1;
          $lap = mysqli_query($koneksi, "select * from buku order by id DESC");
          while ($r = mysqli_fetch_array($lap)) {
			  $jpinjam	=jmlhpinjam($r['id']);
          ?>
            <tr class="odd gradeX">
              <td><?= $no; ?></td>
              <td><?php echo  $r['judul'] . " #" . $r['jml_buku']; ?></td>
              <td><?= $r['pengarang']; ?></td>
              <td class="center"><?= $r['penerbit']; ?></td>
              <td class="center">
			        <span class="btn btn-success"><?= $r['jml_buku']; ?></span>
              </td>
              <td class="center">
			        <span class="btn btn-warning"><?= $jpinjam; ?></span>
			        </td>
              <td class="center"><?= $r['isbn']; ?></td>
              <td class="center"><?= $r['lokasi']; ?></td>
              <td class="center" width="180">
                <a href="?page=update_buku&id=<?= $r['id']; ?>" class="btn btn-success">Update</a> |
                <a href="?page=hapus_buku&id=<?= $r['id']; ?>" class="btn btn-danger">Delete</a>
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