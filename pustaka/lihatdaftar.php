<?php
include 'koneksi.php';

$key = "%" . $_POST['query'] . "%";

$query = mysqli_query($koneksi, "SELECT * FROM anggota where nmr_anggota like '%" . $key . "%' order by id ");
//$json = array();
$output = '';
$output = '<dl class="nav nav-pills">';
while ($row = mysqli_fetch_array($query)) {

	$output .= '<dt style="cursor:pointer">' . $row["nmr_anggota"] . '</dt>';
}
$output .= '</dl>';
echo $output;

//. $row["id"] . "   " .