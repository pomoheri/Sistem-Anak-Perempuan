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
                    <strong class="h5 card-title">Daftar Pengguna</strong>
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
                                         <a href="pengguna.php" class="btn btn-primary btn-sm" ><i class="fa fa-plus"></i> Tambah Data</a>
                                         </div>
                                            <div class="card-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover data" id="dataTables">
                                                <?php
                                                include("../../koneksi.php");
                                                $result = mysql_query("SELECT * FROM datpeng ORDER BY idpeng ASC");
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Pengguna</th>
                                                        <th>Alamat</th>
                                                        <th>Telepone</th>
                                                        <th>Tgl Catat</th>
                                                        <th>Level</th>
                                                        <th>Status Pengguna</th>
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
                                                    <td>".$user_data['namap']."</td>
                                                    <td>".$user_data['alamatp']."</td>
                                                    <td>".$user_data['telpp']."</td>
                                                    <td>".$user_data['tglcatat']."</td>
                                                    <td>".$user_data['level']."</td>
                                                    <td>".$user_data['statpeng']."</td>
                                                  ";
                                               ?>
                                                    <td>
                                                    <div class="dropdown">
                                                     <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                                     Aksi
                                                     <span class="caret"></span></button>
                                                     <ul class="dropdown-menu">
                                                      <li><a href="editpengguna.php?id=<?php echo $user_data['idpeng']?>" class="btn btn-primary btn-sm icon-btn">edit<i class="fa fa-fw fa-lg fa-edit"></i></a></li>
                                                      <?php if ($user_data['statpeng']=='aktif') { ?>
                                                      <li><a href="aksi.php?id=<?php echo $user_data['idpeng'] ?>&nonaktif=nonaktif" class="btn btn-danger btn-sm icon-btn">Nonaktifkan<i class="fa fa-fw fa-lg fa-edit"></i></a></li>
                                                      <?php } 
                                                      else { ?>
                                                      <li><a href="aksi.php?id=<?php echo $user_data['idpeng'] ?>&aktif=nonaktif" class="btn btn-danger btn-sm icon-btn">Aktifkan<i class="fa fa-fw fa-lg fa-edit"></i></a></li>
                                                      <?php } ?>
                                                     </ul>
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