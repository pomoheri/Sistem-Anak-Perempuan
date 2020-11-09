<?php
  session_start();
  error_reporting(0);
    if($_SESSION['jabatan']!=='Karyawangudang'){
      
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
     <?php include('../komponen/sidebargudang.php');?> 
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include('../komponen/header.php');?>  
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Bahan Baku Masuk</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

            <!-- Buat isi content di dalam sini -->
             <div class="section__content section__content--p30">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12">
                      <form role="form" method="post" action="aksi.php">
                        <?php
                          include('../../koneksi.php');
                          $query = mysql_query("Select * FROM bbk_masuk where id_bbkmasuk='$_GET[id]'");
                          $data = mysql_fetch_array($query);
                        ?>
                        <div class="card">
                          <div class="card-header">
                            <strong>Edit Bahan Baku Masuk</strong> 
                          </div>
                        <div class="card-body card-block">
                          <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label class=" form-control-label">ID Bahan Masuk</label>
                              </div>
                              <div class="col-12 col-md-9">
                                <input class="form-control" value="<?php echo $data['id_bbkmasuk'];?>" type="text" name="id_bbkmasuk" readonly>    
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label for="email-input" class=" form-control-label">Tanggal Masuk</label>
                              </div>
                              <div class="col-12 col-md-9">
                                <input type="date" id="text-input" value="<?php echo $data['tglmasuk'];?>" name="tglmasuk" class="form-control">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label for="email-input" class=" form-control-label">Jumlah</label>
                              </div>
                              <div class="col-12 col-md-9">
                                <input type="number" id="text-input" value="<?php echo $data['jml'];?>" name="jml" class="form-control">
                              </div>
                            </div> 
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label class=" form-control-label">Nama Bahan</label>
                              </div>
                              <div class="col-12 col-md-9">
                                <select name="id_bahan" id="id_bahan" class="form-control">
                                  <?php
                                    $query_bahan="SELECT * FROM bahan_baku";
                                    $sql_bahan=mysql_query($query_bahan);
                                      while ($data_bahan=mysql_fetch_array($sql_bahan)) {
                                        if ($data['id_bahan']==$data_bahan['id_bahan']) {
                                          $select="selected";
                                        }else{
                                          $select="";
                                        }
                                    echo "<option $select>".$data_bahan['id_bahan']."|".$data_bahan['nmbhn']."</option>";
                                      }
                                  ?>      
                                </select>
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label class=" form-control-label">ID Detail PO</label>
                              </div>
                              <div class="col-12 col-md-9">
                                <select name="id_detpo" id="id_detpo" class="form-control">
                                  <?php
                                    $query_detpo="SELECT * FROM det_purchase_order";
                                    $sql_bahan=mysql_query($query_detpo);
                                      while ($data_detpo=mysql_fetch_array($sql_bahan)) {
                                        if ($data['id_detpo']==$data_detpo['id_detpo']) {
                                          $select="selected";
                                        }else{
                                          $select="";
                                        }
                                    echo "<option $select>".$data_detpo['id_detpo']."</option>";
                                      }
                                  ?>      
                                </select>
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label for="email-input" class=" form-control-label">ID Karyawan</label>
                              </div>
                              <div class="col-12 col-md-9">
                                <input class="form-control" value="<?php echo $_SESSION['id_kar'];?>" type="text" name="id_kar" readonly>
                              </div>
                            </div>                                
                          </form>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary" name="editbbkmasuk">
                            <i class="fa fa-dot-circle-o"></i> Simpan
                          </button>
                          <button type="reset" class="btn btn-danger">
                            <i class="fa fa-ban"></i> Batal
                          </button>
                        </div>
                      </div>
                    </div>
                   </div>
                  </div>
                </div>
              </section>
            </form>
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