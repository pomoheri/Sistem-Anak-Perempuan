<!DOCTYPE html>
<html lang="en">

<head>
    <link href="img/logo/logo.png" rel="icon">
  <title>Sistem Informasi PPA - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
</head>

<body class="bg-gradient-light ">
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Registrasi Pengguna</h1>
                    <img src="img/logo/logo.jpg" height="" width="100px" alt="logo">
                  </div>
                  <br>
            <!-- Buat isi content di dalam sini -->
             <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <!--isi konten disini-->
                            <div class="col-lg-12">
                            <form role="form" method="post" action="aksi.php">
                       <?php
                           include('koneksi.php');
                           $query = mysql_query("Select max(idpeng) as maxID FROM datpeng");
                           $data = mysql_fetch_array($query);
                           $idMax = $data['maxID'];
                           $noUrut = (int) substr($idMax,3);
                           $noUrut++;
                           $newID = "P00".sprintf("%02s",$noUrut);
                           $tglsekarang = date("Y-m-d");
                       ?>
                                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">ID Pengguna</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" value="<?php echo $newID;?>" type="text" name="idpeng" readonly>    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nama Pengguna</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="namap" placeholder="Masukkan Nama pengguna" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Alamat</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea type="text" id="text-input" name="alamatp" placeholder="Masukkan Alamat " class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Telephone</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="telpp" placeholder="Masukkan Telephone " class="form-control" required>
                                                </div>
                                           </div>
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="nmuser" placeholder="Masukkan Username " class="form-control">
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="text-input" name="passw" placeholder="Masukkan Password " class="form-control">
                                                </div>
                                           </div> 
                                           <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Level</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="level" value="masyarakat" class="form-control">
                                                </div>
                                           </div>
                                           <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Tanggal Catat</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="text-input" name="tglcatat" value="<?php echo $tglsekarang;?>" class="form-control" readonly>
                                                </div>
                                           </div> 
                                           <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Status Pengguna</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <input type="text" id="text-input" name="statpeng" value="aktif" class="form-control" readonly> 
                                                </div>
                                           </div>                             
                                        
                                  <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary" name="inputmasyarakat">
                                            <i class="fa fa-dot-circle-o"></i> Daftar
                                        </button>
                                        <a type="reset" href="index.php" class="btn btn-danger">
                                            <i class="fa fa-ban"></i> Batal</a>
                                        </button>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </section>
        <!---batas isi content-->
      <!-- Footer -->

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
</body>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>