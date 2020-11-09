<?php
include('../../koneksi.php');

//Hapus rw
if(isset($_GET['hapusrw'])){
		$id=$_GET['hapusrw'];
		mysql_query("Delete FROM datrw WHERE idrw='$id'");
		
	header("Location: daftarrw.php");
}

//Hapus rt
if(isset($_GET['hapusrt'])){
		$id=$_GET['hapusrt'];
		mysql_query("Delete FROM datrt WHERE idrt='$id'");
		
	header("Location: daftarrt.php");
}

//Hapus rancangan
if(isset($_GET['hapusrancangan'])){
		$id=$_GET['hapusrancangan'];
		mysql_query("Delete FROM rancangan WHERE id_rancangan='$id'");
		
	header("Location: daftarrancangan.php");
}