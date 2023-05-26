<?php
include "koneksi.php";
include "func.php";
$query = mysqli_query($koneksi, "SELECT anggota.nmr_anggota as nomor_agt,
										anggota.id as agtid,
										anggota.nama as lblnama,
										buku.id as id_bk,
										buku.judul as jdl_bk,
										buku.jml_buku as jml_bk,
										transaksi.tglkembali as tglretur,
										transaksi.jml as jmlh 
										FROM transaksi,anggota,buku 
										where transaksi.id_anggota=anggota.id 
										and transaksi.id_buku=buku.id 
										and transaksi.id='$_GET[id]'");
$r = mysqli_fetch_array($query);

$jpinjam=jmlhpinjam($r['id_bk']);
?>
<div class="row">
  <div class="col-md-12">
    <!-- Form Elements -->
    <div class="panel panel-default">
      <div class="panel-heading">
        Update Transaksi Pustaka
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">

            <form role="form" method="POST" action="">
              <div class="form-group">
			  <input value="<?= $_GET['id'] ?>" type="hidden" type="text" id="tid" name="tid">
			  <input value="<?= $r['tglretur']; ?>" type="hidden" type="text" id="tglretur" name="tglretur">
                <label>Nomor Anggota</label>
                <input value="<?= $r['nomor_agt']; ?>" class="form-control" name="nomor" type="text" onkeyup="lihat()" id="nomor" />
              </div>
              <input value="<?= $r['agtid']; ?>" type="hidden" type="text" id="id" name="id">
              <div class="form-group">
                <label>Nama</label>
                <input value="<?= $r['lblnama']; ?>" class="form-control" id="nama" name="nama" type="text" disabled />
              </div>
              <div class="form-group">
                <label>Judul</label>
                <input value="<?php echo $r["id_bk"] . "    Stok ($r[jml_bk])  " . $r['jdl_bk']; ?>" class="form-control" id="judul" name="judul" autocomplete="off" />
              </div>
              <div id="List"></div>
              <div class="form-group">
                <label>Jumlah Pinjam</label>
                <input value="<?= $r['jmlh']; ?>" class="form-control" name="jml" autocomplete="off" />
				<input value="<?= $r['jmlh']; ?>" type="hidden" name="jmlold" />
                <div class="form-group">

                  <input type="submit" value="Update" name="submit" class="btn btn-warning" />
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  function lihat() {
    var nomor = $("#nomor").val();
    $.ajax({
      url: 'lihatdata.php',
      data: "nomor=" + nomor,
    }).success(function(data) {
      var json = data,
        obj = JSON.parse(json);
      $('#id').val(obj.id);
      $('#nama').val(obj.nama);
    });
  }
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
  $jmlold = $_POST['jmlold'];
  $jmlnew = $_POST['jml'];
  $tglretur = $_POST['tglretur'];
  $tanggal = date("Y-m-d");
  $lb = mysqli_fetch_array(mysqli_query($koneksi, "select * from buku where id='$idbuku'"));
  if ($jml>$jmlold){$jml = $lb['jml_buku'] - ($jmlnew-$jmlold);}
  else{$jml = $lb['jml_buku'] + ($jmlold-$jmlnew);}
  

  if ($jml < 0) {
    echo  " <script>
 alert('Jumlah Buku tidak Mencukupi, stok ($lb[jml_buku]) Jumlah Pinjam Lama ($jmlold) Jumlah Pinjam Baru ($jmlnew) selisih pinjam ($jml)');
 document.location.href='index.php?page=lap_transaksi';
  </script>";
  } else {
    //  echo "jumlah buku= $jml";
    //  exit();
	if ($tglretur == '0000-00-00') {
    mysqli_query($koneksi, "UPDATE transaksi set jml='$_POST[jml]' WHERE id ='$_POST[tid]'");
    mysqli_query($koneksi, "UPDATE buku set jml_buku ='$jml' WHERE id ='$idbuku'");
	}
    echo "
  <script>
 alert('transaksi berhasil');
 document.location.href='index.php?page=lap_transaksi';
  </script>
  
  ";
  }
}


?>