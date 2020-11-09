<?php
  session_start();
  error_reporting(0);
    if($_SESSION['level']!=='admin'){
      
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
                                         <p>Satuan Tugas Penanganan Masalah Perempuan dan Anak <br>
                                          Desa Katekan Kecamatan Gantiwarno Kabupaten Klaten</p>
                                         </div>
                                            <div class="card-body">
                                              <h5 class="text-center">DAFTTAR TINDAKAN</h5>
                                            
                                            <table width="100%" class="table table-striped table-bordered table-hover data">
                                                <?php
                                                include("../../koneksi.php");
                                                $result = mysql_query("SELECT * FROM dattin JOIN datkas ON dattin.idkasus=datkas.idkasus JOIN datwg ON datwg.nik=datkas.nik JOIN datrt ON datrt.idrt=datwg.idrt JOIN datrw ON datrw.idrw=datrw.idrw JOIN dukuh ON dukuh.iddk=datrw.iddk group by datkas.kategori");
                                                ?>
                                                <thead>
                                                <thead>
                                                    <tr>
                                                        <th width="10px">No</th>
                                                        <th>Tgl Kasus</th>
                                                        <th>Nama Kasus</th>
                                                        <th>Kategori</th>
                                                        <th>Nama Warga</th>
                                                        <th>Alamat</th>
                                                        <th>RT</th>
                                                        <th>Tgl Tindakan</th>
                                                        <th>Nama Tindakan</th>
                                                        <th>Pengguna</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                while($user_data = mysql_fetch_array($result)){
                                                  ?>
                                                  <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $user_data['tglkas'];?></td>
                                                    <td><?php echo $user_data['kejadian'];?></td>
                                                    <td><?php echo $user_data['kategori'];?></td>
                                                     <td><?php echo $user_data['nama'];?></td>
                                                    <td><?php echo $user_data['alamat'];?></td>
                                                    <td><?php echo $user_data['namart'];?></td>
                                                    <td><?php echo $user_data['tgltin'];?></td>
                                                    <td><?php echo $user_data['tindakan'];?></td>
                                                    <td><?php echo $user_data['namap'];?></td>
                                                </tr>
                                                 <?php }?> 
                                                </tbody>
                                            </table>
                                            <br>
                                            <div align="right">Katekan,<?php $tgl=date('d-m-Y'); echo $tgl;?></div>
                                            <br>
                                            <br>
                                            <div align="right"><p>(.....................................)</p></p></div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </section>
                    </div>
                  </div>
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