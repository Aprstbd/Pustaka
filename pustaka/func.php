<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "aprisetiabudi";
$koneksi = mysqli_connect($server, $username, $password, $database);
mysqli_connect($server, $username, $password, $database);
if (mysqli_connect_errno()) {

  echo "<h1>Koneksi database gagal" . mysqli_connect_errno() . "</h1>";
}

function jmlhpinjam($idbk){
	//$koneksi=$_GLOBALS['koneksi'];
	//include "koneksi.php";
	//require 'koneksi.php';
	global $koneksi;
	$query= mysqli_query($koneksi, "SELECT SUM(jml) AS jumlah FROM transaksi WHERE tglkembali='0000-00-00' and id_buku='$idbk'");
	$r 	= mysqli_fetch_array($query);
	$jmlh	= $r['jumlah'];
	if($jmlh>0){return $jmlh;}
	else {return 0;}
}
/*
function jmlhsisa($jmlhbk,$jmlhpinjam){
	if($jmlhbk>$jmlhpinjam){
		return $sisa=$jmlhbk-$jmlhpinjam;
	}else {
		return 0;
	}
	
}
*/

?>