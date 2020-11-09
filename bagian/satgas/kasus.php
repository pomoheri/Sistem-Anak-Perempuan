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
            <h5 class=" mb-0 text-gray-800">Tambah Kasus</h5>
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
                           
                       <?php
                           include('../../koneksi.php');
                           $query = mysql_query("Select max(idkasus) as maxID FROM datkas");
                           $data = mysql_fetch_array($query);
                           $idMax = $data['maxID'];
                           $noUrut = (int) substr($idMax,5);
                           $noUrut++;
                           $newID = "KASUS".sprintf("%05s",$noUrut);
                           $tglsekarang = date("Y-m-d");
                       ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Input Kasus</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="aksi.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group" hidden>
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">idkasus</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" value="<?php echo $newID;?>" type="text" name="idkasus" readonly required>    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Kategori Kasus</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" name="kategori">
                                                        <option value="#" disable selected hidden>Pilih</option>
                                                        <option value="perempuan">Perempuan</option>
                                                        <option value="anak-anak">Anak-anak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">NIK</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <select name="nik" class="form-control" required>
                                                      <?php 
                                                        include('../../koneksi.php');
                                                        $sql=mysql_query('SELECT * FROM datwg');
                                                        $no=1;
                                                         while ($data=mysql_fetch_array($sql)) { 
                                                        ?>
                                                        <option  value= "<?php echo $data['nik']?>"> <?php echo $data['nik']?></option>
                                                        <?php $no++; } ?>
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Tanggal Kasus</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="text-input" name="tglkas" placeholder="Masukkan Tanggal Kasus " class="form-control">
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                              <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Kejadian</label>
                                              </div>
                                              <div class="col-12 col-md-9">
                                                <textarea type="text" id="text-input" name="kejadian" placeholder="Masukkan keterangan kejadian " class="form-control" required></textarea>
                                                </div>
                                           </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Lampiran Bukti</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="lambuk">
                                                </div>
                                            </div>
                                           <div class="row form-group">
                                              <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">ID Pengguna</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                  <input type="text" id="text-input" name="idpeng" value="<?php echo $_SESSION['idpeng'];?>" class="form-control" required readonly>
                                                </div>
                                                </div>
                                            <div class="row form-group">
                                              <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Jenis Kasus</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" name="jenkas">
                                                        <option value="#" disable selected hidden>Pilih</option>
                                                        <option value="monitoring">Monitoring</option>
                                                        <option value="aduan">Aduan</option>
                                                    </select>
                                                </div>
                                           </div>
                                           <div class="row form-group" hidden>
                                              <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Status Kasus</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                  <input type="text" id="text-input" name="statkas" value="T" class="form-control" required>
                                                </div>
                                           </div>
                                            <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="inputkasus">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
                                        <button type="reset" class="btn btn-danger">
                                            <i class="fa fa-ban"></i> Batal
                                        </button>
                                    </div>
                                        </form>
                               
                                </div>
                                </div>
                              
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