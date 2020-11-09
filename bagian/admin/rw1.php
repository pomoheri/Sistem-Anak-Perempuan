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
            <h1 class="h3 mb-0 text-gray-800">Tambah RW</h1>
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
                           $query = mysql_query("Select max(idrw) as maxID FROM datrw");
                           $data = mysql_fetch_array($query);
                           $idMax = $data['maxID'];
                           $noUrut = (int) substr($idMax,3);
                           $noUrut++;
                           $newID = "RW".sprintf("%02s",$noUrut);
                           $tglsekarang = date("Y-m-d");
                       ?>
                       <?php
                          include('../../koneksi.php');
                          $query = mysql_query("Select * FROM dukuh where iddk='$_GET[id]'");
                          $data = mysql_fetch_array($query);
                        ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Input RW</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">ID RW</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" value="<?php echo $newID;?>" type="text" name="idrw" readonly>    
                                                </div>
                                            </div>    
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Nama RW</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" placeholder="Masukan Nama RW" type="text" name="namarw">    
                                                </div>
                                            </div>
                                              <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Nama Dukuh</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="iddk" id="iddk" class="form-control" readonly>
                                                        <?php
                                                         $query_kon="SELECT * FROM dukuh";
                                                         $sql_kon=mysql_query($query_kon);
                                                         while ($data_kon=mysql_fetch_array($sql_kon)) {
                                                          if ($data['iddk']==$data_kon['iddk']) {
                                                           $select="selected";
                                                          }else{
                                                           $select="";
                                                          }
                                                          echo "<option $select>".$data_kon['iddk']."|".$data_kon['namadk']."</option>";
                                                         }
                                                        ?>      
                                                    </select>
                                                </div>
                                            </div>                              
                                        </form>
                                <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="inputrw">
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