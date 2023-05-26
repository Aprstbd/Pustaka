<?php
if(!defined('pustaka')){
  header('location:index.php');
}
include "koneksi.php";
?>
<div class="row">
  <div class="col-md-12">
    <!-- Form Elements -->
    <div class="panel panel-default">
      <div class="panel-heading">
        Input data User
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">

            <form role="form" method="POST" action="index.php?page=user">
              <div class="form-group">
                <label>ID User</label>
				<?php
				$lap = mysqli_query($koneksi, "SELECT * FROM user");
				while ($r = mysqli_fetch_array($lap))
				{	$idu=$r['id_user']+1;	}
				?>
                <input class="form-control" name="" value="<?=$idu?>" disabled />
              </div>
              <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" />
              </div>
              <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="password" type='password'/>
              </div>
              <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level">
                  <option selected="0">---Pilih Level---</option>
                  <option value="admin">admin</option>
                  <option value="operator">operator</option>
                  <option value="Anggota">Anggota</option>

                </select>
              </div>
              <div class="form-group">

                <input type="submit" value="Simpan" name="submit" class="btn btn-primary" />
				<a href="?page=lap_user" class="btn btn-danger"> <i class="fa fa-minus-circle"></i>Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['submit'])) {
  include "koneksi.php";
  $username	=$_POST['username'];
  $password	=$_POST['password'];
  $level	=$_POST['level'];
  $password	=md5($password);
  mysqli_query($koneksi, "insert into user values
  (NULL,'$username','$password','$level')");
  echo "
  <script>
 alert('data berhasil ditambahkan');
 document.location.href='index.php?page=lap_user';
  </script>
  
  ";
}
?>