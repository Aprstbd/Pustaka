<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_pustaka";
$koneksi = mysqli_connect($server, $username, $password, $database);
mysqli_connect($server, $username, $password, $database);
if (mysqli_connect_errno()) {

  echo "<h1>Koneksi database gagal" . mysqli_connect_errno() . "</h1>";
}
if (!function_exists('tgl')) {
  function tgl($tanggal)
  {
    $bulan = array(
      1 => 'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $data = explode("-", $tanggal);
    return $data[2] . ' ' . $bulan[(int)$data[1]] . ' ' . $data[0];
  }
}
