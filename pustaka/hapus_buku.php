<?php

include "koneksi.php";
mysqli_query($koneksi, "delete from buku where id='$_GET[id]'");
echo "
  <script>
 alert('data berhasil di hapus');
 document.location.href='index.php?page=lap_buku';
  </script>
  
  ";

  