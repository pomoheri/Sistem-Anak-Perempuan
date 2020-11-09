<!-- aksi untuk CRUD warga -->
<?php
include ('../../koneksi.php');
//fungsi untuk input warga
	if(isset($_POST["inputwarga"])){
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$kelamin = $_POST['kelamin'];
		$tglh = $_POST['tglh'];
		$pendd = $_POST['pendd'];
		$alamat = $_POST['alamat'];
		$idrt = $_POST['idrt'];
		$stkeb = $_POST['stkeb'];
			
		$exec = mysql_query("INSERT INTO datwg SET nik = '$nik', nama = '$nama', kelamin = '$kelamin', tglh = '$tglh',pendd = '$pendd', alamat = '$alamat', idrt = '$idrt', stkeb = '$stkeb'")
		 or die(mysql_error());

		header('location:warga.php');

	}

//fungsi untuk mengedit data bahan baku	
	if(isset($_POST["editbbk"])){
		mysql_query("UPDATE bahan_baku SET 
                        id_bahan ='$_POST[id_bahan]',
                        nmbhn ='$_POST[nmbhn]',
                        kategori ='$_POST[kategori]',
                        satuan = '$_POST[satuan]',
						jumlah = '$_POST[jumlah]',
						status = '$_POST[status]',
						brand = '$_POST[brand]'
						WHERE id_bahan = '$_POST[id_bahan]'")or die(mysql_error());
		header('location:daftarbbk.php');

	}

?>

<!-- aksi untuk CRUD kasus-->
<?php
include ('../../koneksi.php');
   if(isset($_POST['inputkasus'])){
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

//fungsi untuk mengedit data kasus
	if(isset($_POST["editkasus"])){
		mysql_query("UPDATE datkas SET 
                        kategori ='$_POST[kategori]',
                        nik ='$_POST[nik]',
                        tglkas = '$_POST[tglkas]',
						kejadian = '$_POST[kejadian]',
						lambuk = '$_POST[lambuk]',
						idpeng = '$_POST[idpeng]',
						statkas = '$_POST[statkas]',
						jenkas = '$_POST[jenkas]'
						WHERE idkasus = '$_POST[idkasus]'")or die(mysql_error());

		header('location:daftarkasus.php');

	}

?>
<!-- aksi untuk CRUD tindakan-->
<?php
include ('../../koneksi.php');
//fungsi untuk input tindakan
	if(isset($_POST["inputtindakan"])){

		/*$file=$_FILES['lambuk']['tmp_name'];

		if (!isset($file)) {
		echo "Maaf ini bukan file gambar!";
		}else{
			$image= addslashes(file_get_contents($_FILES['lambuk']['tmp_name']));
			$image_name= 'HOTEL-'.time().$_FILES['lambuk']['name'];
			$image_size= getimagesize($_FILES['lambuk']['tmp_name']);
			
			move_uploaded_file($_FILES["lambuk"]["tmp_name"],"images/" .$image_name);*/

		$idkasus = $_POST['idkasus'];
		$tgltin = $_POST['tgltin'];
		$tindakan = $_POST['tindakan'];
		$idpeng = $_POST['idpeng'];
		$ekstensi_diperbolehkan	= array('png','jpg','pdf');
		$nama = $_FILES['lamdok']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['lamdok']['size'];
		$file_tmp = $_FILES['lamdok']['tmp_name'];	
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, '../komponen/lamdok/'.$nama);
			
		$exec = mysql_query("INSERT INTO dattin SET idkasus = '$idkasus', tgltin = '$tgltin', tindakan = '$tindakan',lamdok = '$nama',idpeng = '$idpeng'")
		 or die(mysql_error());
		$exec = mysql_query("UPDATE datkas SET statkas='D' WHERE idkasus='$_POST[idkasus]'") or die (mysql_error()); 

			if($exec){
		header('location:daftartindakan.php?status=sukses');
			}else{
				header('location:tindakan.php?status=gagal');
			}
		    }else{
			echo 'UKURAN FILE TERLALU BESAR';
		    }
	       }else{
		echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	       }
    }
?>
