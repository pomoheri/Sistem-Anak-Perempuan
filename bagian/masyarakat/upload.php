<?php
  include("../../koneksi.php");
   if(isset($_POST['inputkas'])){
   	$idkasus = $_POST['idkasus'];
		$kategori = $_POST['kategori'];
		$nik = $_POST['nik'];
		$tglkas = $_POST['tglkas'];
		$kejadian = $_POST['kejadian'];
		$idpeng = $_POST['idpeng'];
		$jenkas = $_POST['jenkas'];
		$statkas = $_POST['statkas'];
	$ekstensi_diperbolehkan	= array('png','jpg','pdf');
	$nama = $_FILES['lambuk']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['lambuk']['size'];
	$file_tmp = $_FILES['lambuk']['tmp_name'];	
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, '../komponen/lambuk/'.$nama);
			$query = mysql_query("INSERT INTO datkas SET idkasus = '$idkasus', kategori = '$kategori', lambuk = '$nama', nik = '$nik',tglkas = '$tglkas',kejadian = '$kejadian',idpeng = '$idpeng',jenkas = '$jenkas',statkas = '$statkas'") or die(mysql_error());
			if($query){
		header('location:daftarkasus.php?status=sukses');
			}else{
				header('location:aduan.php?status=gagal');
			}
		    }else{
			echo 'UKURAN FILE TERLALU BESAR';
		    }
	       }else{
		echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	       }
    }
?>