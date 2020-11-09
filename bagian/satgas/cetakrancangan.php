<?php
  session_start();
  error_reporting(0);
    if($_SESSION['jabatan']!=='Karyawangudang'){
      
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
									<td><img class="logo" src="../../img/logo/logo.png" alt="" width="200"></td>
									<td>
										<center>
												<h2>PT SINAR UTAMA SEJAHTERA</h2>
												<h3>SPORT GLOVE MANUFACTURE AND EXPORTIR</h3>
												<h4>Tlogo Lor, Tlogo, Prambanan, Klaten 57454</h4>
								 		</center>
								 	</td>
								</tr>
							</table>
							 <table width="100%" class="table table-striped table-bordered table-hover data" id="bootstrap-data-table-export">
							 <hr></hr>
							 <hr></hr>
							 <center><h4>DAFTAR RANCANGAN</h4></center>
							 
						<?php
						include("../../koneksi.php");
						$result = mysql_query("SELECT * FROM rancangan JOIN pesan ON rancangan.id_pesan=pesan.id_pesan ORDER BY id_rancangan ASC");
						?>
                                <thead>
                                    <tr>
										<th>No</th>
                                        <th>ID Rancangan</th>
                                        <th>Style</th>
                                        <th>Qty</th>
                                        <th>Main Mat</th>
                                        <th>Machi</th>
                                        <th>Logo</th>
                                        <th>Elastic</th>
                                        <th>Terryband</th>
                                        <th>Herry</th>
                                        <th>Lycra</th>
                                        <th>Velcro</th>
                                        <th>Label</th>
                                        <th>ENV</th>
                                        <th>InnerBox</th>
                                        <th>Carton</th>
                                        <th>Patch</th>
                                        <th>Packing</th>
                                        <th>Benang</th>
                                        <th>Id Pesan</th>
                                    </tr></br>
                                </thead>
                                <tbody>
								<?php
								$no = 1;
								while($user_data = mysql_fetch_array($result)){
								?>
								<tr>
								<td><?php echo $no; ?></td>
								<td><center><?php echo $user_data['id_rancangan']?></center></td>
								<td><center><?php echo $user_data['nmstyle']?></center></td>
								<td><center><?php echo $user_data['quantity']?></center></td>
								<td><center><?php echo $user_data['mainmaterial']?></center></td>
								<td><center><?php echo $user_data['machi']?></center></td>
								<td><center><?php echo $user_data['logo']?></center></td>
								<td><center><?php echo $user_data['jnselastic']?></center></td>
								<td><center><?php echo $user_data['jnstb']?></center></td>
								<td><center><?php echo $user_data['herry']?></center></td>
								<td><center><?php echo $user_data['lycra']?></center></td>
								<td><center><?php echo $user_data['velcro']?></center></td>
								<td><center><?php echo $user_data['label']?></center></td>
								<td><center><?php echo $user_data['envelope']?></center></td>
								<td><center><?php echo $user_data['innerbox']?></center></td>
								<td><center><?php echo $user_data['jnscarton']?></center></td>
								<td><center><?php echo $user_data['patch']?></center></td>
								<td><center><?php echo $user_data['packing']?></center></td>
								<td><center><?php echo $user_data['jnsbenang']?></center></td>
								<td><center><?php echo $user_data['id_pesan']?></center></td>
								</tr>
								</tbody>
								<?php $no++; }?>	
							</table>
							<br>
							<br>
							<br>
                           
							<div align="right">Yogyakarta,<?php $tgl=date('d-m-Y'); echo $tgl;?></div><p></p>
							<div align="right">Production Manager</div>
							<br>
							<br>
							<br>
							<div align="right"><p>Ribut</p></div>
                        </div>
                    </div>
                </div>
            </section>
			
			<body>
			<?php include('../komponen/js.php');?>


</html>
<!-- end document-->