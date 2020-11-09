<!-- aksi untuk CRUD pengguna -->
<?php
include ('../../koneksi.php');
//fungsi untuk input data pengguna
	if(isset($_POST["inputpengguna"])){
		$idpeng = $_POST['idpeng'];
		$namap = $_POST['namap'];
		$alamatp = $_POST['alamatp'];
		$telpp = $_POST['telpp'];
		$nmuser = $_POST['nmuser'];
		$passw = md5($_POST['passw']);
		$level = $_POST['level'];
		$tglcatat = $_POST['tglcatat'];
		$statpeng = $_POST['statpeng'];
			
		$exec = mysql_query("INSERT INTO datpeng SET idpeng = '$idpeng', namap = '$namap', alamatp = '$alamatp', telpp = '$telpp',nmuser = '$nmuser', passw = '$passw', level = '$level', tglcatat = '$tglcatat', statpeng = '$statpeng'")
		 or die(mysql_error());

		header('location:pengguna.php');

	}

//fungsi untuk mengedit data pengguna	
	if(isset($_POST["editpengguna"])){
		$password = md5($_POST['passw']);
		mysql_query("UPDATE datpeng SET 
                        namap ='$_POST[namap]',
                        alamatp ='$_POST[alamatp]',
                        telpp ='$_POST[telpp]',
                        nmuser ='$_POST[nmuser]',
                        level = '$_POST[level]',
                        tglcatat = '$_POST[tglcatat]',
                        statpeng = '$_POST[statpeng]',
						passw = '$password'
						WHERE idpeng = '$_POST[idpeng]'")or die(mysql_error());
		header('location:daftarpengguna.php');

	}

	//nonaktif pengguna
	if (isset($_GET["idpeng"])) {
		
		$id=$_GET['idpeng'];

		if ($_GET["aktif"]=='aktif')
		{
			mysql_query("UPDATE datpeng SET statpeng='nonaktif' WHERE idpeng='$id'");
				header("Location: daftarpengguna.php");
			}

		} else {

			 mysql_query("UPDATE datpeng SET statpeng='aktif' WHERE idpeng='$id'");
				header("Location: daftarpengguna.php");
			}
		
	

?>
<!-- aksi untuk CRUD Dukuh -->
<?php
include ('../../koneksi.php');
//fungsi untuk input data dukuh
	if(isset($_POST["inputdukuh"])){
		$iddk = $_POST['iddk'];
		$namadk = $_POST['namadk'];
			
		$exec = mysql_query("INSERT INTO dukuh SET iddk = '$iddk', namadk = '$namadk'") or die(mysql_error());
		
		header('location:dukuh.php');

	}

//fungsi untuk mengedit data dukuh	
	if(isset($_POST["editdukuh"])){
		mysql_query("UPDATE dukuh SET 
                        iddk ='$_POST[iddk]',
                        namadk ='$_POST[namadk]'
						WHERE iddk = '$_POST[iddk]'")or die(mysql_error());
		header('location:daftardukuh.php');

	}

?>

<!-- aksi untuk CRUD rw -->
<?php
include ('../../koneksi.php');
//fungsi untuk input data rw
	if(isset($_POST["inputrw"])){
		$idrw = $_POST['idrw'];
		$namarw = $_POST['namarw'];
		$iddk = $_POST['iddk'];
			
		$exec = mysql_query("INSERT INTO datrw SET idrw = '$idrw', namarw = '$namarw', iddk = '$iddk'") or die(mysql_error());
		
		header('location:rw.php');

	}

//fungsi untuk mengedit data RW	
	if(isset($_POST["editrw"])){
		mysql_query("UPDATE datrw SET 
                        idrw ='$_POST[idrw]',
                        namarw ='$_POST[namarw]'
						WHERE idrw = '$_POST[idrw]'")or die(mysql_error());
		header('location:daftarrw.php');

	}

?>

<!-- aksi untuk CRUD rt -->
<?php
include ('../../koneksi.php');
//fungsi untuk input data rt
	if(isset($_POST["inputrt"])){
		$idrt = $_POST['idrt'];
		$namart = $_POST['namart'];
		$idrw = $_POST['idrw'];
			
		$exec = mysql_query("INSERT INTO datrt SET idrt = '$idrt', namart = '$namart', idrw = '$idrw'") or die(mysql_error());
		
		header('location:rt.php');

	}

//fungsi untuk mengedit data rt	
	if(isset($_POST["editrt"])){
		mysql_query("UPDATE datrt SET 
                        idrt ='$_POST[idrt]',
                        namart ='$_POST[namart]'
						WHERE idrt = '$_POST[idrt]'")or die(mysql_error());
		header('location:daftarrt.php');

	}

?>

<!-- aksi untuk CRUD Rancangan -->
<?php
include ('../../koneksi.php');
//fungsi untuk input data rancangan
	if(isset($_POST["inputrancangan"])){
		$id_rancangan = $_POST['id_rancangan'];
		$nmstyle = $_POST['nmstyle'];
		$quantity = $_POST['quantity'];
		$mainmaterial = $_POST['mainmaterial'];
		$machi = $_POST['machi'];
		$logo = $_POST['logo'];
		$jnselastic = $_POST['jnselastic'];
		$jnstb = $_POST['jnstb'];
		$herry = $_POST['herry'];
		$lycra = $_POST['lycra'];
		$label = $_POST['label'];
		$envelope = $_POST['envelope'];
		$innerbox = $_POST['innerbox'];
		$jnscarton = $_POST['jnscarton'];
		$patch = $_POST['patch'];
		$packing = $_POST['packing'];
		$jnsbenang = $_POST['jnsbenang'];
		$velcro = $_POST['velcro'];
		$id_pesan = $_POST['id_pesan'];
			
		$exec = mysql_query("INSERT INTO rancangan SET id_rancangan = '$id_rancangan', nmstyle = '$nmstyle', quantity = '$quantity', mainmaterial = '$mainmaterial', machi = '$machi', logo = '$logo', jnselastic = '$jnselastic', jnstb = '$jnstb', herry = '$herry', lycra = '$lycra', label = '$label', envelope = '$envelope', innerbox = '$innerbox', jnscarton = '$jnscarton', patch = '$patch', packing = '$packing', jnsbenang = '$jnsbenang', velcro = '$velcro', id_pesan = '$id_pesan'") or die(mysql_error());

		$exec = mysql_query("UPDATE pesan SET keterangan='Proses Rancangan Selesai' WHERE id_pesan='$_POST[id_pesan]'") or die (mysql_error());
		
		header('location:daftarrancangan.php');

	}

//fungsi untuk mengedit data rancangan	
	if(isset($_POST["editrancangan"])){
		mysql_query("UPDATE rancangan SET 
                        id_rancangan ='$_POST[id_rancangan]',
                        nmstyle ='$_POST[nmstyle]',
                        quantity ='$_POST[quantity]',
                        mainmaterial = '$_POST[mainmaterial]',
						machi = '$_POST[machi]',
						logo = '$_POST[logo]',
						jnselastic = '$_POST[jnselastic]',
						jnstb = '$_POST[jnstb]',
						herry = '$_POST[herry]',
						lycra = '$_POST[lycra]',
						label = '$_POST[label]',
						envelope = '$_POST[envelope]',
						innerbox = '$_POST[innerbox]',
						jnscarton = '$_POST[jnscarton]',
						patch = '$_POST[patch]',
						packing = '$_POST[packing]',
						jnsbenang = '$_POST[jnsbenang]',
						velcro = '$_POST[velcro]',
						id_pesan = '$_POST[id_pesan]'
						WHERE id_rancangan = '$_POST[id_rancangan]'")or die(mysql_error());
		header('location:daftarrancangan.php');

	}

?>