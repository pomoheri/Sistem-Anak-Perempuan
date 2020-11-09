<?php
  session_start();
  error_reporting(0);
    if($_SESSION['jabatan']!=='Administrator'){
      
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
            <h1 class="h3 mb-0 text-gray-800">Tambah Rancangan</h1>
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
                     $query = mysql_query("Select max(id_rancangan) as maxID FROM rancangan");
                     $data = mysql_fetch_array($query);
                     $idMax = $data['maxID'];
                     $noUrut = (int) substr($idMax,4);
                     $noUrut++;
                     $newID = "RAN".sprintf("%04s",$noUrut);
                     $tglsekarang = date("Y-m-d");
                     ?>
                  <div class="card">
                    <div class="card-header">
                      <strong>Input Rancangan</strong> 
                    </div>
              <div class="row">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="col-md-6">
                    <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label class=" form-control-label">ID Rancangan</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input class="form-control" value="<?php echo $newID;?>" type="text" name="id_rancangan" readonly>    
                         </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Nama Style</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="text" id="text-input" name="nmstyle" placeholder="Masukkan Nama Style " class="form-control" required>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Quantity</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="number" id="text-input" name="quantity" placeholder="Masukkan jumlah rancangan " class="form-control" required>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Main Material</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="text" id="text-input" name="mainmaterial" placeholder="Masukkan Main Material " class="form-control" required>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Machi</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="text" id="text-input" name="machi" placeholder="Masukkan nama Machi " class="form-control" required>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Logo</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="text" id="text-input" name="logo" placeholder="Masukkan nama Logo " class="form-control" required>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Jenis Elastic</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <select class="form-control" name="jnselastic">
                            <option value="#" disable selected hidden>Pilih</option>
                            <option value="ELASTIC 6 MM SJ WHITE">ELASTIC 6 MM SJ WHITE</option>
                            <option value="ELASTIC 8 MM SJ WHITE">ELASTIC 8 MM SJ WHITE</option>
                            <option value="ELASTIC 12 MM SJ WHITE">ELASTIC 12 MM SJ WHITE</option>
                            <option value="ELASTIC 12 MM SJ BLACK">ELASTIC 12 MM SJ BLACK</option>
                            <option value="ELASTIC 6 MM GU WHITE">ELASTIC 6 MM GU WHITE</option>
                            <option value="ELASTIC 12 MM GU WHITE">ELASTIC 12 MM GU WHITE</option>
                            <option value="ELASTIC 8 MM MIL WHITE">ELASTIC 8 MM MIL WHITE</option>
                          </select>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Terryband</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <select class="form-control" name="jnstb">
                            <option value="#" disable selected hidden>Pilih</option>
                            <option value="TERRYBAND 20 MM WHITE">TERRYBAND 20 MM WHITE</option>
                            <option value="TERRYBAND 25 MM WHITE">TERRYBAND 25 MM WHITE</option>
                            <option value="TERRYBAND 25 MM BLACK">TERRYBAND 25 MM BLACK </option>
                          </select>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Herry</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="number" id="text-input" name="herry" placeholder="Masukkan jumlah herry " class="form-control" required>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Velcro</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <select class="form-control" name="velcro" required>
                            <option value="#" disable selected hidden>Pilih</option>
                            <option value="VELCRO SAMCRO BLACK">VELCRO SAMCRO BLACK HOOK</option>
                            <option value="VELCRO BLACK LOOP">VELCRO SAMCRO BLACK LOOP</option>
                            <option value="VELCRO SAMCRO RED">VELCRO SAMCRO RED HOOK</option>
                            <option value="VELCRO COATS BLACK">VELCRO COATS BLACK HOOK</option>
                            <option value="VELCRO SAMCRO RED">VELCRO SAMCRO RED HOOK</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                      
                      <!-- form kanan-->
                  <div class="col-md-6">
                    <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Lycra</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="text" id="text-input" name="lycra" placeholder="Masukkan Warna Lycra " class="form-control" required>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Label</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="text" id="text-input" name="label" placeholder="Masukkan Label " class="form-control" required>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Envelope</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <select class="form-control" name="envelope" required>
                            <option value="#" disable selected hidden>Pilih</option>
                            <option value="ENV Paper">ENV Paper</option>
                            <option value="ENV PVC">ENV PVC</option>
                            <option value="No ENV">No ENV</option>
                          </select>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">InnerBox</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <select class="form-control" name="innerbox" required>
                            <option value="#" disable selected hidden>Pilih</option>
                            <option value="InnerBox Bigten">InnerBox Bigten</option>
                            <option value="InnerBox USG">InnerBox USG</option>
                            <option value="No Inner">No Inner</option>
                          </select>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Cartoon</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <select class="form-control" name="jnscarton" required>
                            <option value="#" disable selected hidden>Pilih</option>
                            <option value="CARTON DUREX">CARTON DUREX</option>
                            <option value="CARTON BIGTEN">CARTON BIGTEN</option>
                            <option value="CARTON LOTTEMART">CARTON LOTTEMART</option>
                            <option value="CARTON USG">CARTON USG</option>
                          </select>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Patch</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <select class="form-control" name="patch" required>
                            <option value="#" disable selected hidden>Pilih</option>
                            <option value="YES PATCH">YES PATCH</option>
                            <option value="NO PATCH">NO PATCH</option>
                          </select>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Packing</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="text" id="text-input" name="packing" placeholder="Masukkan packing" class="form-control" required>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label for="email-input" class=" form-control-label">Benang</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <select class="form-control" name="jnsbenang" required>
                            <option value="#" disable selected hidden>Pilih</option>
                            <option value="BENANG NATURAL">BENANG NATURAL</option>
                            <option value="BENANG BEIGE">BENANG BEIGE</option>
                            <option value="BENANG IVORY">BENANG IVORY</option>
                            <option value="BENANG KHAKY">BENANG KHAKY</option>
                            <option value="BENANG BMTP">BENANG BMTP</option>
                          </select>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3">
                          <label class=" form-control-label">ID Pesan</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <select name="id_pesan" class="form-control" required>
                            <?php 
                              include('../../koneksi.php');
                              $sql=mysql_query('SELECT * FROM pesan ORDER by id_pesan DESC');
                              $no=1;
                              while ($data=mysql_fetch_array($sql)) { 
                            ?>
                            <option  value= "<?php echo $data['id_pesan']?>"> <?php echo $data['id_pesan']?></option>
                            <?php $no++; } ?>
                          </select>
                        </div>
                      </div>
                  </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary btn-md" name="inputrancangan">
                            <i class="fa fa-dot-circle-o"></i> Simpan
                          </button>
                          <button type="reset" class="btn btn-danger btn-md">
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
</form>
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