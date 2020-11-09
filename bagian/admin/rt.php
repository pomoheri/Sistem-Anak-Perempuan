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
            <h1 class="h3 mb-0 text-gray-800">Tambah RT</h1>
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
                           $query = mysql_query("Select max(idrt) as maxID FROM datrt");
                           $data = mysql_fetch_array($query);
                           $idMax = $data['maxID'];
                           $noUrut = (int) substr($idMax,3);
                           $noUrut++;
                           $newID = "RT".sprintf("%02s",$noUrut);
                           $tglsekarang = date("Y-m-d");
                       ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Input RT</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">ID RT</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" value="<?php echo $newID;?>" type="text" name="idrt" readonly>    
                                                </div>
                                            </div>    
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Nama RT</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" placeholder="Masukan Nama RT" type="text" name="namart">    
                                                </div>
                                            </div>
                                              <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Nama RW</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="idrw" class="form-control" required>
                                                      <?php 
                                                        include('../../koneksi.php');
                                                        $sql=mysql_query('SELECT * FROM datrw ORDER by idrw DESC');
                                                        $no=1;
                                                         while ($data=mysql_fetch_array($sql)) { 
                                                        ?>
                                                        <option  value= "<?php echo $data['idrw']?>"> <?php echo $data['namarw']?></option>
                                                        <?php $no++; } ?>
                                                      </select>
                                                </div>
                                            </div>                              
                                        </form>
                                <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="inputrt">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
                                        <button type="reset" class="btn btn-danger">
                                            <i class="fa fa-ban"></i> Batal
                                        </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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