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
                    <strong class="h5 card-title">Daftar Bahan Baku Keluar</strong>
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
                                         <a href="cetakbbkkeluar.php" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i> Cetak Data</a>
                                         </div>
                                            <div class="card-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover data" id="dataTables">
                                                <?php
                                                include("../../koneksi.php");
                                                $result = mysql_query("SELECT * FROM det_bbk_keluar JOIN bbk_keluar ON det_bbk_keluar.id_bbkkeluar=bbk_keluar.id_bbkkeluar JOIN order_bbk ON bbk_keluar.id_order=order_bbk.id_order JOIN bahan_baku ON det_bbk_keluar.id_bahan=bahan_baku.id_bahan ORDER BY id_detbbkkeluar ASC");
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Tanggal Keluar</th>
                                                        <th>Bahan</th>
                                                        <th>Satuan</th>
                                                        <th>Jumlah</th>
                                                        <th>Disetujui</th>
                                                        <th>Ket</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                while($user_data = mysql_fetch_array($result)){
                                                echo "
                                                  <tr>
                                                    <td>".$no++."</td>
                                                    <td>".$user_data['tglorder']."</td>
                                                    <td>".$user_data['tglkeluar']."</td>
                                                    <td>".$user_data['nmbhn']."</td>
                                                    <td>".$user_data['satuan']."</td>
                                                    <td>".$user_data['jmlkeluar']."</td>
                                                    <td>".$user_data['disetujui']."</td>
                                                    <td>".$user_data['keterangan']."</td>
                                                  ";
                                                  ?>
                                                    <td>
                                                      <div class="btn-group">
                                                        <a href="editbbkkeluar.php?id=<?php echo $user_data['id_detbbkkeluar']?>"class="btn btn-primary btn-sm icon-btn"><i class="fa fa-fw fa-lg fa-edit"></i>
                                                        </a> 
                                                        <a href="hapus.php?&hapusbbkkeluar=<?php echo $user_data['id_detbbkkeluar']?>" class="btn btn-danger btn-sm icon-btn" onclick="return confirm('Apakah yakin akan menghapus data ini ?')"><i class="fa fa-fw fa-lg fa-trash"></i></a>
                                                      </div>
                                                    </td>
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
                        </div>
                    </div>
                </section>
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