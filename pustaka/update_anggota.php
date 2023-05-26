<?php
include "koneksi.php";
// membuat kode otomatis dengan awalan SAR, cek dulu nomor anggota terakhir
$query = mysqli_query($koneksi, "SELECT * FROM anggota where id='$_GET[id]'");
$r = mysqli_fetch_array($query);  

?>
<div class="row">
  <div class="col-md-12">
    <!-- Form Elements -->
    <div class="panel panel-default">
      <div class="panel-heading">
        update Data Anggota Pustaka
      </div>
      
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">

            <form role="form" method="POST" action="">
              <div class="form-group">
                <label>Nomor Anggota</label>
                <input class="form-control" name="nomor" value="<?= $r['nmr_anggota']; ?>" disabled />
              </div>

              <div class="form-group">
                <label>NAMA</label>
                <input class="form-control" name="nama" value="<?= $r['nama']; ?>" />
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" name="alamat" value="<?= $r['alamat']; ?>" />
              </div>

              <div class="form-group">
                <label>Nomor Handphone</label>
                <input class="form-control" name="hp" value="<?= $r['handphone']; ?>" />
              </div>

              <div class="form-group">
                <label>Tempat Tanggal Lahir</label>
                <input class="form-control" name="ttl" value="<?= $r['ttl']; ?>" />
              </div>

              <div class="form-group">
                <label>Kelas/Prodi/Sem</label>
                <input class="form-control" name="kelas" value="<?= $r['kelas']; ?>" />
              </div>

              <div class="form-group">

                <input type="submit" value="submit" name="submit" class="btn btn-primary" />
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

  mysqli_query($koneksi, "update anggota set nama='$_POST[nama]',
                                             alamat='$_POST[alamat]',
                                             handphone='$_POST[hp]',
                                             ttl ='$_POST[ttl]',
                                             kelas='$_POST[kelas]'
                                        where id='$_GET[id]'");
  echo "
  <script>
 alert('data berhasil diupdate');
 document.location.href='index.php?page=lap_anggota';
  </script>
  
  ";
}


?>