<?php
include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM user where id_user='$_GET[id]'");
$r = mysqli_fetch_array($query);

?>
<div class="row">
  <div class="col-md-12">
    <!-- Form Elements -->
    <div class="panel panel-default">
      <div class="panel-heading">
        Update data User Pustaka
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">

            <form role="form" method="POST" action="">
              <div class="form-group">
                <label>ID</label>
                <input class="form-control" name="id_user" value="<?= $r['id_user']; ?>"/>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" value="<?= $r['username']; ?>"/>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="<?= $r['password']; ?>"/>
              </div>
              <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level" value="<?=$r['level']; ?>" disable />
                  <option selected="0">---Pilih Level---</option>
                  <option value="admin">admin</option>
                  <option value="operator">operator</option>
                  <option value="pengunjung">pengunjung</option>

                </select>
              </div>
              <div class="form-group">

                <input type="submit" value="Update" name="submit" class="btn btn-warning" />
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
  $username	=$_POST['username'];
  $password	=$_POST['password'];
  $level	=$_POST['level'];
  $password	=md5($password);
  mysqli_query($koneksi, "update user set username='$username',
                                          password='$password',
                                          level='$level'
                                      where id_user='$_GET[id]'");
  echo "
  <script>
 alert('data berhasil diupdate');
 document.location.href='index.php?page=lap_user';
  </script>
  
  ";
}

?>