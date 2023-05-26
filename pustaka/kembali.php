<?php
if(!defined('pustaka')){
  header('location:index.php');
}
include "koneksi.php";
//cek data transaksi
$query = mysqli_query ($koneksi, "SELECT * FROM transaksi where id='$_GET[id]'");
$r = mysqli_fetch_array($query);

//cek jumlah buku yg ada ditable buku
$q = mysqli_query($koneksi, "SELECT * FROM buku where id='$r[id_buku]'");
$d = mysqli_fetch_array($q);

//update jumlah buku
mysqli_query($koneksi, "update buku set jml_buku=$d[jml_buku]+$r[jml] where id='$r[id_buku]'");

//update transaksi
$tgl = date("Y-m-d");
mysqli_query($koneksi, "update transaksi set tglkembali='$tgl' where id='$r[id]'");

echo "
  <script>
 alert('Buku sudah di kembalikan');
 document.location.href='index.php?page=lap_transaksi';
  </script>
  
  ";
