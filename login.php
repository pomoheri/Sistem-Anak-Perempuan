<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.jpg" rel="icon">
  <title>Sistem Informasi PPA - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
</head>

<body class="bg-gradient-light ">
  <?php 
  if(isset($_POST['login'])){
    include("koneksi.php");

    $username = $_POST['nmuser'];
    $pass = md5($_POST['passw']);

     $query1 = mysql_query("SELECT * FROM datpeng WHERE nmuser ='$username' AND passw='$pass'");
      if(mysql_num_rows($query1) == 0){
          //cek apakah ada hak akses sesuai username   
        echo 
            '<script language="javascript">swal({
                title: "Maaf !",
                text: "Kombinasi Username dan Password salah !",
                type: "error"
              }, function(){
                    window.location.href = "login.php";
              });</script>';
      }
      else{
        $row = mysql_fetch_assoc($query1);
        /*session_start();*/
              if($row['level'] == 'admin' ){
                $_SESSION['nmuser']=$username;
                $_SESSION['idpeng']=$row['idpeng'];
                $_SESSION['namap']=$row['namap'];
                $_SESSION['alamatp']=$row['alamatp'];
                $_SESSION['telpp']=$row['telpp'];
                $_SESSION['passw']=$row['passw'];
                $_SESSION['statpeng']=$row['statpeng'];
                $_SESSION['tglcatat']=$row['tglcatat'];
                $_SESSION['level']='admin';
                 echo 
                  '<script language="javascript">swal({
                      title: "Login Berhasil !",
                      type: "success",
                      timer : 1000
                    }, function(){
                          window.location.href = "bagian/admin/index.php";
                    });</script>';
              }else if($row['level']=='satgas'){
                $_SESSION['nmuser']=$username;
                $_SESSION['idpeng']=$row['idpeng'];
                $_SESSION['namap']=$row['namap'];
                $_SESSION['alamatp']=$row['alamatp'];
                $_SESSION['telpp']=$row['telpp'];
                $_SESSION['passw']=$row['passw'];
                $_SESSION['statpeng']=$row['statpeng'];
                $_SESSION['tglcatat']=$row['tglcatat'];
                $_SESSION['level']='satgas';
                 echo 
                  '<script language="javascript">swal({
                      title: "Login Berhasil !",
                      type: "success",
                      timer : 1000
                    }, function(){
                          window.location.href = "bagian/satgas/index.php";
                    });</script>';
              }else if($row['level']=='kepaladesa'){
                $_SESSION['nmuser']=$username;
                $_SESSION['idpeng']=$row['idpeng'];
                $_SESSION['namap']=$row['namap'];
                $_SESSION['alamatp']=$row['alamatp'];
                $_SESSION['telpp']=$row['telpp'];
                $_SESSION['passw']=$row['passw'];
                $_SESSION['statpeng']=$row['statpeng'];
                $_SESSION['tglcatat']=$row['tglcatat'];
                $_SESSION['level']='kepaladesa';
                 echo 
                  '<script language="javascript">swal({
                      title: "Login Berhasil !",
                      type: "success",
                      timer : 1000
                    }, function(){
                          window.location.href = "bagian/kepaladesa/index.php";
                    });</script>';
              }else if($row['level']=='dinsos'){
                $_SESSION['nmuser']=$username;
                $_SESSION['idpeng']=$row['idpeng'];
                $_SESSION['namap']=$row['namap'];
                $_SESSION['alamatp']=$row['alamatp'];
                $_SESSION['telpp']=$row['telpp'];
                $_SESSION['passw']=$row['passw'];
                $_SESSION['statpeng']=$row['statpeng'];
                $_SESSION['tglcatat']=$row['tglcatat'];
                $_SESSION['level']='dinsos';
                 echo 
                  '<script language="javascript">swal({
                      title: "Login Berhasil !",
                      type: "success",
                      timer : 1000
                    }, function(){
                          window.location.href = "bagian/dinsos/index.php";
                    });</script>';
              }else if($row['level']=='masyarakat'){
                $_SESSION['nmuser']=$username;
                $_SESSION['idpeng']=$row['idpeng'];
                $_SESSION['namap']=$row['namap'];
                $_SESSION['alamatp']=$row['alamatp'];
                $_SESSION['telpp']=$row['telpp'];
                $_SESSION['passw']=$row['passw'];
                $_SESSION['statpeng']=$row['statpeng'];
                $_SESSION['tglcatat']=$row['tglcatat'];
                $_SESSION['level']='masyarakat';
                 echo 
                  '<script language="javascript">swal({
                      title: "Login Berhasil !",
                      type: "success",
                      timer : 1000
                    }, function(){
                          window.location.href = "bagian/masyarakat/index.php";
                    });</script>';
              }else{
                    echo'
                    <div class="animated shake">
                <div class="alert alert-danger">Belum terdaftar!
                </div>
                </div>'
                   ;
                  }
              }
            }
          ?>
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Pengguna</h1>
                    <img src="img/logo/logo.jpg" height="" width="200px" alt="logo">
                  </div>
                  <br>
                  <form action="" method="post">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" name="nmuser" placeholder="Masukan Username" required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="passw" placeholder="Masukan Password" required>
                    </div>
                    <div class="form-group">
                      <div class="text-center">
                        <button class="btn btn-primary btn-block" type="submit" name="login">
                          Login
                        </button>
                        <a type="reset" href="index.php" class="btn btn btn-danger btn-block">
                          <i class="fa fa-ban"></i> Batal</a>
                        </button>
                    </div>
                </div>
                
              </div>
            </form>
            <div class="text-center">
                    <div class="copyrights text-center">
                      <p>Copyright ©2020</p>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>