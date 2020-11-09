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
            <h5 class=" mb-0 text-gray-800">Tambah Warga</h5>
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
                           $tglsekarang = date("Y-m-d");
                       ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Input Warga</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">NIK</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                 <input class="form-control" placeholder="Masukan NIK" type="text" name="nik" required>    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nama</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="nama" placeholder="Masukkan Nama" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Jenis Kelamin</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="radio" name="kelamin"
                                                    <?php if (isset($kelamin) && $kelamin=="laki-laki") echo "checked";?> value="laki-laki">laki-laki
                                                    <input type="radio" name="kelamin" 
                                                    <?php if (isset($kelamin) && $kelamin=="perempuan") echo "checked";?> value="perempuan">perempuan
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Tanggal Lahir</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="text-input" name="tglh" placeholder="Masukkan Tanggal Lahir " class="form-control">
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                              <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">pendidikan</label>
                                              </div>
                                              <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="pendd" placeholder="Masukkan Pendidikan terakhir " class="form-control">
                                                </div>
                                           </div> 
                                           <div class="row form-group">
                                              <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Alamat</label>
                                              </div>
                                              <div class="col-12 col-md-9">
                                                <textarea type="text" id="text-input" name="alamat" placeholder="Masukkan Alamat " class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Nama RT</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="idrt" class="form-control" required>
                                                      <?php 
                                                        include('../../koneksi.php');
                                                        $sql=mysql_query('SELECT * FROM datrt ORDER by idrt DESC');
                                                        $no=1;
                                                         while ($data=mysql_fetch_array($sql)) { 
                                                        ?>
                                                        <option  value= "<?php echo $data['idrt']?>"> <?php echo $data['namart']?></option>
                                                        <?php $no++; } ?>
                                                      </select>
                                                </div>
                                            </div>
                                           <div class="row form-group">
                                              <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Status Keberadaan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" name="stkeb">
                                                        <option value="#" disable selected hidden>Pilih</option>
                                                        <option value="orangtua">Orang Tua</option>
                                                        <option value="wali">Wali</option>
                                                    </select>
                                                </div>
                                           </div>                          
                                        </form>
                                <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="inputwarga">
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