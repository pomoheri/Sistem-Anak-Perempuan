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
                    <strong class="h5 card-title">Daftar Order Bahan Baku</strong>
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
                                         <a href="cetakorderbbk.php" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i> Cetak Data</a>
                                         </div>
                                            <div class="card-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover data" id="dataTables">
                                                <?php
                                                include("../../koneksi.php");
                                                $result = mysql_query("SELECT * FROM order_bbk join rancangan on rancangan.id_rancangan=order_bbk.id_rancangan ORDER BY id_order ASC");
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Id Order</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Nama Style</th>
                                                        <th>Status Order</th>
                                                        <th>Id Rancangan</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                while($user_data = mysql_fetch_array($result)){
                                                echo "
                                                  <tr>
                                                    <td>".$no++."</td>
                                                    <td>".$user_data['id_order']."</td>
                                                    <td>".$user_data['tglorder']."</td>
                                                    <td>".$user_data['nmstyle']."</td>
                                                    <td>".$user_data['status']."</td>
                                                    <td>".$user_data['id_rancangan']."</td>";?>
                                                    <td><a href="dafdetailorderbbk.php?id=<?php echo $user_data['id_rancangan']?>"class="btn btn-primary btn-sm icon-btn">Lihat Detail
                                                        </a></td>
                                                  </tr>
                                                  <?php }?>
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
</html>