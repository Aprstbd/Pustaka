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
        Input Transaksi Pustaka
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">

            <form role="form" method="POST" action="">
              <div class="form-group">
                <label>Nomor Anggota</label> <!-- onkeydown onkeypress onkeyup   -->
                <input class="form-control" name="nomor" type="text" onkeyup="lihat();daftar()" id="nomor" />
				<div id="daftar"></div>
              </div>
              <input type="hidden" type="text" id="id" name="id">
              <div class="form-group">
                <label>Nama</label>
                <input class="form-control" id="nama" name="nama" type="text" disabled />
              </div>
              <div class="form-group">
                <label>Judul</label>
                <input class="form-control" id="judul" name="judul" autocomplete="off" />
              </div>
              <div id="List"></div>
              <div class="form-group">
                <label>Jumlah Pinjam</label>
                <input class="form-control" name="jml" autocomplete="off" />

                <div class="form-group">

                  <input type="submit" value="Simpan" name="submit" class="btn btn-primary" />
				  <a href="?page=lap_transaksi" class="btn btn-danger"> <i class="fa fa-minus-circle"></i>Kembali</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/jquery.min.js"></script>
<script type="text/javascript">
  function lihat() {
    var nomor = $("#nomor").val();
    $.ajax({
      url: 'http://localhost/www/pustaka/lihatdata.php',
      data: "nomor=" + nomor,
    }).success(function(data) {
      var json = data,
        obj = JSON.parse(json);
      $('#id').val(obj.id);
      $('#nama').val(obj.nama);
    });
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#nomor').keyup(function() {
      var query = $(this).val();
      if (query != '') {
        $.ajax({
          url: "http://localhost/www/pustaka/lihatdaftar.php",
          method: "POST",
          data: {
            query: query
          },
          success: function(data) {
            $('#daftar').fadeIn();
            $('#daftar').html(data);
          }
        });
      }
    });
    //$(document).on('click', 'dt', function() {
      //$('#nomor').val($(this).text());
      //$('#daftar').fadeOut();
    //});
  });
</script>
<script>
  $(document).ready(function() {
    $('#judul').keyup(function() {
      var query = $(this).val();
      if (query != '') {
        $.ajax({
          url: "search.php",
          method: "POST",
          data: {
            query: query
          },
          success: function(data) {
            $('#list').fadeIn();
            $('#List').html(data);
          }
        });
      }
    });
    $(document).on('click', 'li', function() {
      $('#judul').val($(this).text());
      $('#List').fadeOut();
    });
  });
</script>
<?php

if (isset($_POST['submit'])) {

  $kode = $_POST['judul'];
  $idbuku = (int) substr($kode, 0, 3);
  $tanggal = date("Y-m-d");
  $lb = mysqli_fetch_array(mysqli_query($koneksi, "select * from buku where id='$idbuku'"));
  $jml = $lb['jml_buku'] - $_POST['jml'];

  if ($jml < 0) {
    echo  " <script>
 alert('Jumlah Buku tidak Mencukupi');
 document.location.href='index.php?page=lap_transaksi';
  </script>";
  } else {
    //  echo "jumlah buku= $jml";
    //  exit();

    mysqli_query($koneksi, "insert into transaksi values('',$_POST[id],$idbuku,'$tanggal',$_POST[jml],'')");
    mysqli_query($koneksi, "UPDATE buku set jml_buku ='$jml' WHERE id ='$idbuku'");
    echo "
  <script>
 alert('transaksi berhasil');
 document.location.href='index.php?page=lap_transaksi';
  </script>
  
  ";
  }
}


?>