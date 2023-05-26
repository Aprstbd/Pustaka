<?php
if(!defined('pustaka')){
  header('location:index.php');
}
include "koneksi.php";
?>
<div class="panel panel-default">
  <div class="panel-heading">
    Data Peminjaman Perpustakaan STMIK Amik Riau
  </div>
  <div class="panel">
    <div>
      <a href="?page=transaksi" class="btn btn-primary"> <i class="fa fa-plus-circle"></i>Tambah Data</a>
    </div>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Judul Buku</th>
            <th>Jumlah Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          include "koneksi.php";
          error_reporting(0);

          $no = 1;
          $lap = mysqli_query($koneksi, "select * from anggota,buku,transaksi where transaksi.id_anggota=anggota.id AND
                                                   transaksi.id_buku=buku.id");
          while ($r = mysqli_fetch_array($lap)) {

          ?>

            <tr class="odd gradeX">
              <td><?= $no; ?></td>
              <td><?= $r['nama']; ?></td>
              <td><?= $r['judul']; ?></td>
              <td><?= $r['jml']; ?></td>
              <td class="center"><?= tgl($r['tglpinjam']); ?></td>
              <?php
              if ($r['tglkembali'] == '0000-00-00') {

                echo "<td class=\"center\"><a class='btn btn-warning' href='?page=kembali&id=$r[id]'>Belum dikembalikan</a></td>";
              } else {
                echo "<td class=\"center\">".tgl($r['tglkembali'])."</td>";
              }
              ?>
              <td class="center" width="180">
                <a href="?page=update_transaksi&id=<?= $r['id']; ?>" class="btn btn-success">Update</a> |
                <a href="?page=hapus_transaksi&idbk=<?= $r['id_buku']; ?>&jmlhold=<?= $r['jml']; ?>&tglretur=<?= $r['tglkembali']; ?>&id=<?= $r['id']; ?>" class="btn btn-danger">Delete</a>
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