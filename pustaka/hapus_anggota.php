<?php

include "koneksi.php";
mysqli_query($koneksi, "delete from anggota where id='$_GET[id]'");
echo "
  <script>
 alert('data berhasil di hapus');
 document.location.href='index.php?page=lap_anggota';
  </script>
  
  ";
