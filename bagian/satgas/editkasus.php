<?php
  session_start();
  error_reporting(0);
    if($_SESSION['level']!=='satgas'){
      
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
     <?php include('../komponen/sidebarsatgas.php');?> 
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include('../komponen/header.php');?>  
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kasus</h1>
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
                          $query = mysql_query("Select * FROM datkas join datwg on datwg.nik=datkas.nik join datpeng on datkas.idpeng=datpeng.idpeng where idkasus='$_GET[id]'");
                          $data = mysql_fetch_array($query);
                        ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit Kasus</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">ID Kasus</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" value="<?php echo $data['idkasus'];?>" type="text" name="idkasus" readonly>    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Kategori</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="kategori" class="form-control">
                                                      <option value="<?php echo $data['kategori'];?>"><?php echo $data['kategori'];?></option>
                                                      <option>perempuan</option>perempuan</option>
                                                      <option>anak-anak</option>anak-anak<M/option>
                                                    </select>
                                                </div>
                                           </div>
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Jenis Kasus</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="jenkas" class="form-control">
                                                      <option value="<?php echo $data['jenkas'];?>"><?php echo $data['jenkas'];?></option>
                                                      <option>monitoring</option>monitoring</option>
                                                      <option>aduan</option>aduan<M/option>
                                                    </select>
                                                </div>
                                           </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">NIK</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="nik" id="nik" class="form-control">
                                                        <?php
                                                         $query_kon="SELECT * FROM datwg";
                                                         $sql_kon=mysql_query($query_kon);
                                                         while ($data_kon=mysql_fetch_array($sql_kon)) {
                                                          if ($data['nik']==$data_kon['nik']) {
                                                           $select="selected";
                                                          }else{
                                                           $select="";
                                                          }
                                                          echo "<option $select>".$data_kon['nik']."</option>";
                                                         }
                                                        ?>      
                                                    </select>
                                                </div>
                                           </div>  
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Tanggal Kasus</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="text-input" name="tglkas"  value="<?php echo $data['tglkas'];?>"class="form-control">
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Kejadian</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="kejadian" class="form-control" id="text-input" value= "<?php echo $data['kejadian']?>"> <?php echo $data['kejadian']?></textarea>
                                                </div>
                                            </div>
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">lambuk</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="text-input" name="lambuk"  value="<?php echo $data['lambuk'];?>"class="form-control">
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Nama Pengguna</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="idpeng" id="idpeng" class="form-control">
                                                        <?php
                                                         $query_kon="SELECT * FROM datpeng";
                                                         $sql_kon=mysql_query($query_kon);
                                                         while ($data_kon=mysql_fetch_array($sql_kon)) {
                                                          if ($data['idpeng']==$data_kon['idpeng']) {
                                                           $select="selected";
                                                          }else{
                                                           $select="";
                                                          }
                                                          echo "<option $select>".$data_kon['idpeng']."|".$data_kon['namap']."</option>";
                                                         }
                                                        ?>      
                                                    </select>
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Status Kasus</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="statkas" class="form-control">
                                                      <option value="<?php echo $data['statkas'];?>"><?php echo $data['statkas'];?></option>
                                                      <option>T</option>T</option>
                                                      <option>D</option>D<M/option>
                                                    </select>
                                                </div>
                                           </div>                               
                                        </form>
                                <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="editkasus">
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