<?php
if(!defined('pustaka')){
  header('location:index.php');
}
include "koneksi.php";
// membuat kode otomatis dengan awalan SAR, cek dulu nomor anggota terakhir
$query = mysqli_query($koneksi, "SELECT max(nmr_anggota) as nmr_terakhir FROM anggota");
$data = mysqli_fetch_array($query);
$kode = $data['nmr_terakhir'];
$urutan = (int) substr($kode, 4, 3);
$urutan++;
$huruf = "SAR-";
$nmr = $huruf . sprintf("%03s", $urutan);
?>
<div class="row">
  <div class="col-md-12">
    <!-- Form Elements -->
    <div class="panel panel-default">
      <div class="panel-heading">
        Input Data Anggota Pustaka
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">

            <form role="form" method="POST" action="index.php?page=anggota">
              <div class="form-group">
                <label>Nomor Anggota</label>
                <input class="form-control" name="nomor" value="<?= $nmr; ?>" disabled />
              </div>
              <div class="form-group">
                <label>NAMA</label>
                <input class="form-control" name="nama" />
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" name="alamat" />
              </div>
              <div class="form-group">
                <label>Nomor Handphone</label>
                <input class="form-control" name="hp" />
              </div>
              <div class="form-group">
                <label>Tempat Tanggal Lahir</label>
                <input class="form-control" name="ttl" />
              </div>
              <div class="form-group">
                <label>Kelas/Prodi/Sem</label>
                <input class="form-control" name="kelas" />
              </div>
              <div class="form-group">

                <input type="submit" value="Simpan" name="submit" class="btn btn-primary" />
				<a href="?page=lap_anggota" class="btn btn-danger"> <i class="fa fa-minus-circle"></i>Kembali</a>
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

  mysqli_query($koneksi, "insert into anggota values
  ('','$nmr','$_POST[nama]','$_POST[alamat]','$_POST[hp]','$_POST[ttl]','$_POST[kelas]','Y')");
  echo "
  <script>
 alert('data berhasil ditambahkan');
 document.location.href='index.php?page=lap_anggota';
  </script>
  
  ";
}
?>