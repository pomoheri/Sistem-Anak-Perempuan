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
            <h1 class="h3 mb-0 text-gray-800">Edit Bahan Baku Keluar</h1>
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
                          $query = mysql_query("SELECT * FROM det_bbk_keluar JOIN bbk_keluar ON det_bbk_keluar.id_bbkkeluar=bbk_keluar.id_bbkkeluar JOIN order_bbk ON bbk_keluar.id_order=order_bbk.id_order JOIN bahan_baku ON det_bbk_keluar.id_bahan=bahan_baku.id_bahan where id_detbbkkeluar='$_GET[id]'");
                          $data = mysql_fetch_array($query);
                        ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit Bahan Baku Keluar</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">ID bahan Keluar</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" value="<?php echo $data['id_bbkkeluar'];?>" type="text" name="id_bbkkeluar" readonly>    
                                                </div>
                                            </div>
                                            <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">ID DET bahan Keluar</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" value="<?php echo $data['id_detbbkkeluar'];?>" type="text" name="id_detbbkkeluar" readonly>    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Tanggal Order</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="text-input" value="<?php echo $data['tglorder'];?>" name="tglorder" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Tanggal Keluar</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="text-input" value="<?php echo $data['tglkeluar'];?>" name="tglkeluar" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                              <div class="col col-md-3">
                                                <label class=" form-control-label">Nama Bahan</label>
                                              </div>
                                              <div class="col-12 col-md-9">
                                                    <select name="id_bahan" id="id_bahan" class="form-control">
                                                        <?php
                                                         $query_bbk="SELECT * FROM bahan_baku";
                                                         $sql_bbk=mysql_query($query_bbk);
                                                         while ($data_bbk=mysql_fetch_array($sql_bbk)) {
                                                          if ($data['id_bahan']==$data_bbk['id_bahan']) {
                                                           $select="selected";
                                                          }else{
                                                           $select="";
                                                          }
                                                          echo "<option $select>".$data_bbk['id_bahan']."|".$data_bbk['nmbhn']."</option>";
                                                         }
                                                        ?>      
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Jumlah Bahan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                  <input class="form-control" value="<?php echo $data['jmlkeluar'];?>" type="text" name="jmlkeluar">
                                                </div>
                                           </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Keterangan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="keterangan" class="form-control" id="text-input" value= "<?php echo $data['keterangan']?>"> <?php echo $data['keterangan']?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Disetujui</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" value="<?php echo $data['disetujui'];?>" type="text" name="disetujui">
                                                </div>
                                           </div> 
                                           <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Karyawan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" value="<?php echo $_SESSION['id_kar'];?>" type="text" name="id_kar" readonly>
                                                </div>
                                           </div>                                 
                                        </form>
                                      <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="editbbkkeluar">
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