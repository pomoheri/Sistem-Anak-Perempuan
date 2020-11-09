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
                    <strong class="h5 card-title">Detail Order Bahan Baku</strong>
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
                                         </div>
                                            <div class="card-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover data" id="bootstrap-data-table-export">
                                                <?php
                                                include("../../koneksi.php");
                                                $result = mysql_query("SELECT * FROM order_bbk join rancangan on rancangan.id_rancangan=order_bbk.id_rancangan ORDER BY id_order ASC");
                                                $query=mysql_query("SELECT * FROM rancangan WHERE id_rancangan='$_GET[id]'");
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <th>Style</th>
                                                        <th>Nama Bahan</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                while($user_data = mysql_fetch_array($query)){
                                                ?>
                                                
                                                <tr>
                                                  <td><?php echo $user_data['nmstyle']?><br>QTY : <?php echo $user_data['quantity']?> Pcs</td>
                                                  <td>Logo <?php echo $user_data['logo']?><br><?php echo $user_data['jnselastic']?><br><?php echo $user_data['jnstb']?><br><?php echo $user_data['velcro']?><br>Lycra <?php echo $user_data['lycra']?><br> <?php echo $user_data['envelope']?><br><?php echo $user_data['innerbox']?><br><?php echo $user_data['jnscarton']?><br><?php echo $user_data['jnsbenang']?></td>
                                                  <td align="right"><?php echo $user_data['quantity']?> Pcs<br><?php echo $user_data['quantity']?> M<br><?php echo $user_data['quantity']?> M<br><?php echo $user_data['quantity']?> M<br><?php echo $user_data['quantity']?> M<br><?php echo $user_data['quantity']?> Pcs<br><?php echo $user_data['quantity']?> PCE<br><?php echo $user_data['quantity']?> PCE<br><?php echo $user_data['quantity']?> CJ</td>  
                                                </tr>
                                                </tbody>
                                                <?php $no++; }?>    
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
            $('.data').DataTable();
        });
    </script>
</html>