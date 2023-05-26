<?php
if(!defined('pustaka')){
  header('location:index.php');
}
?>
<div class="panel panel-default">
  <div class="panel-heading">
    Data User Perpustakaan STMIK Amik Riau
  </div>
  <div class="panel">
    <div>
      <a href="?page=user" class="btn btn-primary"> <i class="fa fa-plus-circle"></i>Tambah Data</a>
    </div>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
		    <th>No.</th>
            <th>ID.</th>
            <th>User Name</th>
            <th>Password</th>
            <th>Level</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          include "koneksi.php";
          //error_reporting(0);

          $no = 1;
          $lap = mysqli_query($koneksi, "SELECT * FROM user");
          while ($r = mysqli_fetch_array($lap)) {
          ?>
            <tr class="odd gradeX">
              <td><?= $no; ?></td>
              <td class="center"><?=$r['id_user']?></td>
              <td class="center"><?=$r['username']; ?></td>
              <td class="center"><?=$r['password']; ?></td>
              <td class="center"><?=$r['level']; ?></td>
              <td class="center" width="180">
                <a href="?page=update_user&id=<?= $r['id_user']; ?>" class="btn btn-success" >Update</a> |
                <a href="?page=hapus_user&id=<?= $r['id_user']; ?>" disabled="disabled" class="btn btn-danger">Delete</a>|
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