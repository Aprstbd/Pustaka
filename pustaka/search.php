<?php
include "koneksi.php";
include "func.php";

$key = "%" . $_POST["query"] . "%";

$query = mysqli_query($koneksi, "SELECT * FROM buku where judul like '%" . $key . "%' order by id ");
//$json = array();
$output = '';
$output = '<ul class="nav nav-pills">';
while ($row = mysqli_fetch_array($query)) {
	//$jpinjam=jmlhpinjam($row['id']);
	$output .= '<li style="cursor:pointer">' . $row["id"] . "    Stok ($row[jml_buku])  " . $row["judul"] . '</li>';
}
$output .= '</ul>';
echo $output;
