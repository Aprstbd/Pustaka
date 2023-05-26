<?php
if(!defined('pustaka')){
  header('location:index.php');
}
include "koneksi.php";
?>
<div class="row">
  <div class="col-md-12">
    <!-- Form Elements -->
    <div class="panel panel-default">
      <div class="panel-heading">
        Input data Buku
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">

            <form role="form" method="POST" action="index.php?page=buku">
              <div class="form-group">
                <label>Judul</label>
                <input class="form-control" name="judul" />
              </div>
              <div class="form-group">
                <label>Pengarang</label>
                <input class="form-control" name="pengarang" />
              </div>
              <div class="form-group">
                <label>Penerbit</label>
                <input class="form-control" name="penerbit" />
              </div>
              <div class="form-group">
                <label>Tahun Terbit</label>
                <input class="form-control" name="tahun" />
              </div>
              <div class="form-group">
                <label>ISBN</label>
                <input class="form-control" name="isbn" />
              </div>
              <div class="form-group">
                <label>Jumlah Buku</label>
                <input class="form-control" name="jml_buku" />
              </div>
              <div class="form-group">
                <label>Lokasi</label>
                <select class="form-control" name="lokasi">
                  <option selected="0">---Pilih Rak---</option>
                  <option value="rak1">rak1</option>
                  <option value="rak2">rak2</option>

                </select>
              </div>
              <div class="form-group">

                <input type="submit" value="Simpan" name="submit" class="btn btn-primary" />
				<a href="?page=lap_buku" class="btn btn-danger"> <i class="fa fa-minus-circle"></i>Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['submit'])) {
  include "koneksi.php";
  $tgl = date("Y-m-d");
  mysqli_query($koneksi, "insert into buku values
  ('','$_POST[judul]','$_POST[pengarang]','$_POST[penerbit]','$_POST[tahun]','$_POST[isbn]','$_POST[jml_buku]','$_POST[lokasi]','$tgl')");
  echo "
  <script>
 alert('data berhasil ditambahkan');
 document.location.href='index.php?page=lap_buku';
  </script>
  
  ";
}
?>