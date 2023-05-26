<?php
include 'koneksi.php';
//variabel nomor yang dikirimkan form.php
$nomor = $_GET['nomor'];
//$iddaftar = $_GET['iddaftar'];

//mengambil data

$query = mysqli_query($koneksi, "select * from anggota where nmr_anggota='$nomor'");
$r = mysqli_fetch_array($query);
$data = array(
  'id'      =>  $r['id'],
  'nama'    =>  $r['nama'],
);

//tampil data
echo json_encode($data);
