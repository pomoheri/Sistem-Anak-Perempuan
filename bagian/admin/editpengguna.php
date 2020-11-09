<?php
  session_start();
  error_reporting(0);
    if($_SESSION['level']!=='admin'){
      
      echo"<script>window.alert('Anda tidak mempunyai hak akses untuk halaman ini!. Silahkan login kembali untuk masuk ke halaman yang Anda tuju.');window.location=('../../logout.php')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../komponen/css.php');?>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
     <?php include('../komponen/sidebaradmin.php');?> 
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include('../komponen/header.php');?>  
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Pengguna</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

            <!-- Buat isi content di dalam sini -->
             <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <!--isi konten disini-->
                            <div class="col-lg-12">
                            <form role="form" method="post" action="aksi.php">
                        <?php
                          include('../../koneksi.php');
                          $query = mysql_query("Select * FROM datpeng where idpeng='$_GET[id]'");
                          $data = mysql_fetch_array($query);
                        ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit Pengguna</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">ID Pengguna</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" value="<?php echo $data['idpeng'];?>" type="text" name="idpeng" readonly>    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nama Pengguna</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" value="<?php echo $data['namap'];?>" name="namap" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Alamat</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="alamatp" class="form-control" id="text-input" value= "<?php echo $data['alamatp']?>"> <?php echo $data['alamatp']?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Telephone</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="telpp"  value="<?php echo $data['telpp'];?>" class="form-control">
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Nama User</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="nmuser"  value="<?php echo $data['nmuser'];?>" class="form-control">
                                                </div>
                                           </div>
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="passw" id="text-input" name="passw"  value="<?php echo $data['passw'];?>" class="form-control">
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Level</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="level" class="form-control">
                                                      <option value="<?php echo $data['level'];?>"><?php echo $data['level'];?></option>
                                                      <option>admin</option>admin</option>
                                                      <option>satgas</option>satgas</option>
                                                      <option>dinsos</option>dinsos</option>
                                                      <option>kepaladesa</option>kepaladesa<M/option>
                                                    </select>
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="text-input" name="tglcatat"  value="<?php echo $data['tglcatat'];?>"class="form-control">
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Status Pengguna</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="statpeng" class="form-control">
                                                      <option value="<?php echo $data['statpeng'];?>"><?php echo $data['statpeng'];?></option>
                                                      <option>aktif</option>aktif</option>
                                                      <option>nonaktif</option>nonaktif<M/option>
                                                    </select>
                                                </div>
                                           </div>                                 
                                        </form>
                                <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="editpengguna">
                                          <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
                                        <a type="reset" href="daftarpengguna.php" class="btn btn-danger">
                                            <i class="fa fa-ban"></i> Batal</a>
                                        </button>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            </section>
        <!---batas isi content-->
      <!-- Footer -->
         <?php include('../komponen/footer.php');?>  
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
</body>
    <?php include('../komponen/js.php');?>
</html>