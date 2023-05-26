
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perpustakaan</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>


  <div class="container" style="margin-top: 100px;">
    <div class="row">
      <div class="col-md-4 col-sm-4">
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Login Form Pustaka
          </div>
          <div class="panel-body">
            <form role="form" method="POST" action="">
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control" placeholder="Username" name="username">
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
                <input type="password" class="form-control" placeholder="password" name="password">
              </div>

          </div>
          <div class="panel-footer">
            <button type="submit" name="login" class="btn btn-primary">Sign-in</button>
          </div>
        </div>
      </div>
      </form>
    </div>

  </div>



  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="assets/js/custom.js"></script>


</body>

</html>
<?php
session_start();
include "koneksi.php";
if (isset($_POST['login'])) {
  $pass = md5($_POST['password']);
  $sql = mysqli_query($koneksi, "select * from user where username='$_POST[username]' AND password='$pass'");
  $cek = mysqli_num_rows($sql);
  if ($cek > 0) {
    $r = mysqli_fetch_array( $sql);

    $_SESSION['id'] = $r['id_user'];
    $_SESSION['nama'] = $r['username'];
    $_SESSION['login'] = true;
    echo "<script>document.location.href='index.php';</script>";
  } else {

    echo "
  <script>
 alert('Username dan password salah');
 document.location.href='login.php';
  </script>
  
  ";
  }
}

?>