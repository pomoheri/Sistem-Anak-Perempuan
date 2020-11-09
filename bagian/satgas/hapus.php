<?php
include('../../koneksi.php');

//Hapus kasus
if(isset($_GET['hapuskasus'])){
		$id=$_GET['hapuskasus'];
		mysql_query("Delete FROM datkas WHERE idkasus='$id'");
		
	header("Location: daftarkasus.php");

}

//Hapus bahan baku keluar
if(isset($_GET['hapusbbkkeluar'])){
		$id=$_GET['hapusbbkkeluar'];
		mysql_query("Delete FROM det_bbk_keluar WHERE id_detbbkkeluar='$id'");
		
	header("Location: daftarbbkkeluar.php");

}