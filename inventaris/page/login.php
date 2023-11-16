<?php
  if(!empty($user)){
    ?>
      <script>
          window.Location.href ="?p=home";
      </script>
    <?php
  }
?>
<style>
    body {
  padding-top: 40px;
  padding-bottom: 40px;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.navbar {
    display: none;
}

.footer {
    display: none;
}

</style>

<form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Silahkan Login</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="masuk" type="submit">Login</button>
      </form>

<?php
  if(isset($_POST['masuk'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE username = '$username'";
    $query = mysqli_query($koneksi, $sql);
    $cek = mysqli_num_rows($query);
    
    if($cek > 0){
      $data = mysqli_fetch_array($query);
      $password = $password;
      $pass_db = $data['password'];

      if($password == $pass_db){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['id_level'];
        ?>
          <script type="text/javascript">
            window.location.href="?p=home";
          </script>
        <?php
      }else{
        ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>GAGAL!</strong> Maaf,password anda salah.
        </div>
      <?php
      }

    }else{
      ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>GAGAL!</strong> Maaf, Username atau password anda salah.
        </div>
      <?php
    }
  }
?>