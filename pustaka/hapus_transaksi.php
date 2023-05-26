<?php

include "koneksi.php";
$idbk	=$_GET['idbk'];
$jmlhold=$_GET['jmlhold'];
$tglretur=$_GET['tglretur'];

//cek jumlah buku yg ada ditable buku
$q = mysqli_query($koneksi, "SELECT * FROM buku where id='$idbk'");
$d = mysqli_fetch_array($q);
$jmlh=$d[jml_buku]+$jmlhold;
if ($tglretur == '0000-00-00') {
mysqli_query($koneksi, "UPDATE buku set jml_buku ='$jmlh' WHERE id ='$idbk'");
}
mysqli_query($koneksi, "delete from transaksi where id='$_GET[id]'");
echo "
  <script>
 alert('data berhasil di hapus');
 document.location.href='index.php?page=lap_transaksi';
  </script>
  
  ";

  