<?php
  session_start();
  error_reporting(0);
    if($_SESSION['level']!=='admin'){
      
      echo"<script>window.alert('Anda tidak mempunyai hak akses untuk halaman ini!. Silahkan login kembali untuk masuk ke halaman yang Anda tuju.');window.location=('../../logout.php')</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<style>
  table {
  width: 100%;
  border-collapse: collapse;
  }
  
  table, td{
    border: 1px solid black;
  }
  th{
  border: 1px solid black;
  background-color: #6777EF;
  color: white;
  }
  tr:nth-child(even) {background-color: #f2f2f2;}
  
  </style>

  <body onload="window.print()">
            <section>
    
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <!--isi konten disini-->
                <table>
                <tr>
                  <td align="center"><img class="logo" src="../../img/logo/logo2.png" alt="" width="100"></td>
                  <td>
                    <center>
                        <h2>SISTEM INFORMASI MANAJEMEN</h2>
                        <h3>PERLINDUNGAN PEREMPUAN DAN ANAK</h3>
                        <h3>KABUPATEN SLEMAN</h3>
                    </center>
                  </td>
                </tr>
              </table>
               <table width="100%" class="table table-striped table-bordered table-hover data" id="bootstrap-data-table-export">
               <hr></hr>
               <hr></hr>
               <center><h4>DAFTAR WARGA</h4></center>
               
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
                </tr></br>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while($user_data = mysql_fetch_array($result)){
                ?>
                <tr>
                <td><?php echo $no; ?></td>
                <td><center><?php echo $user_data['nik']?></center></td>
                <td><center><?php echo $user_data['nama']?></center></td>
                <td><center><?php echo $user_data['kelamin']?></center></td>
                <td><center><?php echo $user_data['tglh']?></center></td>
                <td><center><?php echo $user_data['pendd']?></center></td>
                <td><center><?php echo $user_data['alamat']?></center></td>
                <td><center><?php echo $user_data['stkeb']?></center></td>
                <td><center><?php echo $user_data['alamat']?></center></td>
                </tr>
                </tbody>
                <?php $no++; }?>  
              </table>
              <br>
              <br>
              <br>
                           
              <div align="right">Sleman,<?php $tgl=date('d-m-Y'); echo $tgl;?></div><p></p>
              <div align="right"><p>Yang Bersangkutan</p><p> <?php echo $_SESSION['level']; ?></p></div>
              <br>
              <br>
              <br>
              <div align="right"><p><?php echo $_SESSION['namap']; ?></p></div>
                        </div>
                    </div>
                </div>
            </section>
      
      <body>
      <?php include('../komponen/js.php');?>

</html>
<!-- end document-->