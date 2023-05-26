<?php
include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM buku where id='$_GET[id]'");
$r = mysqli_fetch_array($query);

?>
<div class="row">
  <div class="col-md-12">
    <!-- Form Elements -->
    <div class="panel panel-default">
      <div class="panel-heading">
        update data Buku Pustaka
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">

            <form role="form" method="POST" action="">
              <div class="form-group">
                <label>Judul</label>
                <input class="form-control" name="judul" value="<?= $r['judul']; ?>"/>
              </div>
              <div class="form-group">
                <label>Pengarang</label>
                <input class="form-control" name="pengarang" value="<?= $r['pengarang']; ?>"/>
              </div>
              <div class="form-group">
                <label>Penerbit</label>
                <input class="form-control" name="penerbit" value="<?= $r['penerbit']; ?>"/>
              </div>
              <div class="form-group">
                <label>Tahun Terbit</label>
                <input class="form-control" name="tahun_terbit" value="<?= $r['tahun_terbit']; ?>"/>
              </div>
              <div class="form-group">
                <label>ISBN</label>
                <input class="form-control" name="isbn" value="<?= $r['isbn']; ?>"/>
              </div>
              <div class="form-group">
                <label>Jumlah Buku</label>
                <input class="form-control" name="jml" value="<?= $r['jml_buku']; ?>"/>
              </div>
              <div class="form-group">
                <label>Lokasi</label>
                <select class="form-control" name="lokasi" value="<?=$r['lokasi']; ?>" disable />
                  <option selected="0">---Pilih Rak---</option>
                  <option value="rak1">rak1</option>
                  <option value="rak2">rak2</option>

                </select>
              </div>
              <div class="form-group">

                <input type="submit" value="Update" name="submit" class="btn btn-primary" />
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

  mysqli_query($koneksi, "update buku set judul ='$_POST[judul]',
                                          pengarang='$_POST[pengarang]',
                                          penerbit='$_POST[penerbit]',
                                          isbn='$_POST[isbn]',
                                          jml_buku='$_POST[jml]',
                                          lokasi='$_POST[lokasi]'
                                      where id='$_GET[id]'");
  echo "
  <script>
 alert('data berhasil diupdate');
 document.location.href='index.php?page=lap_buku';
  </script>
  
  ";
}

?>