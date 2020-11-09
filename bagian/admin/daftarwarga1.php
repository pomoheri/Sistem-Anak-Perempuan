
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
                                              <h5 class="text-center">DAFTAR WARGA</h5>
                                            
                                            <table width="100%" class="table table-striped table-bordered table-hover data">
                                                <?php
                                                include("../../koneksi.php");
                                                $result = mysql_query("SELECT * FROM datwg JOIN datrt ON datrt.idrt=datwg.idrt ORDER BY nik");
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Kelamin</th>
                                                        <th>Tgl Lahir</th>
                                                        <th>Pendidikan</th>
                                                        <th>Alamat</th>
                                                        <th>Status Keb</th>
                                                        <th>RT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                while($user_data = mysql_fetch_array($result)){
                                                  echo "
                                                  <tr>
                                                    <td>".$no++."</td>
                                                    <td>".$user_data['nik']."</td>
                                                    <td>".$user_data['nama']."</td>
                                                    <td>".$user_data['kelamin']."</td>
                                                    <td>".$user_data['tglh']."</td>
                                                    <td>".$user_data['pendd']."</td>
                                                    <td>".$user_data['alamat']."</td>
                                                    <td>".$user_data['stkeb']."</td>
                                                    <td>".$user_data['idrt']."</td>
                                                  ";
                                               ?>
                                                </tr>
                                                 <?php }?> 
                                                </tbody>
                                            </table>
                                            <br>
                                            <div align="right">Katekan,<?php $tgl=date('d-m-Y'); echo $tgl;?></div>
                                            <div align="right"><p>Yang Bersangkutan</p><p> <?php echo $_SESSION['level']; ?></p></div>
                                            <br>
                                            <br>
                                            <br>
                                            <div align="right"><p><?php echo $_SESSION['namap']; ?></p></div>
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