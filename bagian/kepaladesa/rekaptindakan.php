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
                    <strong class="h5 card-title">Rekapitulasi Tindakan</strong>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="./">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                  </div>
            <!-- tabel mulai dari sini -->
            <section>
                 <div class="content mt-3">
                     <div class="animated fadeIn">
                         <div class="row">
                            <div class="col-md-12">
                                 <div class="card">
                                     <div class="card-header">  
                                         <div class="row">
                                              <b>Pilih Tahun</b><div class="col-6 col-md-4 col-mt-3"><select class="form-control" id="th">
                                                 <option value="">Semua Tahun</option>
                                                 <?php 
                                                 include("../../koneksi.php");
                                                 $th=mysql_query("SELECT year(tgltin) as tahun, idkasus from dattin group by tahun");
                                                 while ( $row= mysql_fetch_array($th)) {
                                                   # code... ?>
                                                   <option value="<?php echo $row['tahun'] ?>"><?php echo $row['tahun'] ?></option>
                                                   <?php 
                                                   } ?>
                                               </select></div>
                                              </div>
                                         </div>
                                            <div class="card-body">
                                             
                                            <table width="100%" class="table table-striped table-bordered table-hover data">
                                               
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Jumlah Kasus</th>
                                                        <th>Jumlah Tindakan</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='result'>
                                               
                                                </tbody>
                                            </table>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                          </div>
                        </div>

 <!---akir tabel dan konten-->
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
    <!-- ini untuk javascript table data -->
    <?php include('../komponen/js.php');?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTables').DataTable();
        });
    </script>
    <?php include('rekaptindakan.js');?>
</html>