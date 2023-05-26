<?php

include "koneksi.php";
mysqli_query($koneksi, "delete from user where id_user='$_GET[id]'");
echo "
  <script>
 alert('data berhasil di hapus');
 document.location.href='index.php?page=lap_user';
  </script>
  
  ";

  