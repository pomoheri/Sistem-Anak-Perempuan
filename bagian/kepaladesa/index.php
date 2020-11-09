<?php
  session_start();
  error_reporting(0);
    if($_SESSION['level']!=='kepaladesa'){
      
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
     <?php include('../komponen/sidebarkades.php');?> 
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include('../komponen/header.php');?>  
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class=" mb-0 text-gray-600">Dashboard Kepala Desa</h5>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-8 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title" align="center"><h6>Rekapitulasi Kejadian</h6></div>
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div style="width: 300px;margin: 0px ;">
                        <canvas id="barkejadian"></canvas>
                      </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              
            <div class="col-xl-4 col-md-8 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title" align="center"><h6>Rekapitulasi Tindakan</h6></div>
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div style="width: 300px;margin: 0px ;">
                        <canvas id="bartindakan"></canvas>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <div class="col-xl-4 col-md-8 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title" align="center"><h6>Rekapitulasi Tindakan Per Kategori</h6></div>
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div style="width: 300px;margin: 0px ;">
                        <canvas id="bartindakankat"></canvas>
                      </div>
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
    <?php include('../kepaladesa/chart.php');?>
</html>