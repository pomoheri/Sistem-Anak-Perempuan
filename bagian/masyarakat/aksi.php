<?php
include ('../../koneksi.php');
//fungsi untuk input kassus
	if(isset($_POST["inputkas"])){

		$tempdir = "../images/"; 
        if (!file_exists($tempdir))
        mkdir($tempdir,0755); 
        //gambar akan di simpan di folder gambar
        $target_path = $tempdir . basename($_FILES['lambuk']['name']);

        //nama gambar
        $nama_gambar=$_FILES['lambuk']['name'];
        //ukuran gambar
        $ukuran_gambar = $_FILES['lambuk']['size']; 

        $fileinfo = @getimagesize($_FILES["lambuk"]["tmp_name"]);
        //lebar gambar
        $width = $fileinfo[0];
        //tinggi gambar
        $height = $fileinfo[1]; 
        if($ukuran_gambar > 81920){ 
            echo 'Ukuran gambar melebihi 80kb';
        }else if ($width > "480" || $height > "640") {
             echo 'Ukuran gambar harus 480x640';
        }else{
            if (move_uploaded_file($_FILES['lambuk']['tmp_name'], $target_path)) {
		/*$file=$_FILES['lambuk']['tmp_name'];

		if (!isset($file)) {
		echo "Maaf ini bukan file gambar!";
		}else{
			$image= addslashes(file_get_contents($_FILES['lambuk']['tmp_name']));
			$image_name= 'HOTEL-'.time().$_FILES['lambuk']['name'];
			$image_size= getimagesize($_FILES['lambuk']['tmp_name']);
			
			move_uploaded_file($_FILES["lambuk"]["tmp_name"],"../images/" .$image_name);*/

		$idkasus = $_POST['idkasus'];
		$kategori = $_POST['kategori'];
		$nik = $_POST['nik'];
		$tglkas = $_POST['tglkas'];
		$kejadian = $_POST['kejadian'];
		$idpeng = $_POST['idpeng'];
		$jenkas = $_POST['jenkas'];
		$statkas = $_POST['statkas'];
		/*$lambuk = $_POST['lambuk'];*/
		/*$lambuk = $_FILES['lambuk']['name'];
		$tmp = $_FILES['lambuk']['tmp_name'];
		// Rename nama fotonya dengan menambahkan tanggal dan jam upload
		$fotobaru = date('dmYHis').$lambuk;
		// Set path folder tempat menyimpan fotonya
		$path = "../images/".$fotobaru;
		// Proses upload
		if(move_uploaded_file($tmp, $path))*/
		
			
		$exec = mysql_query("INSERT INTO datkas SET idkasus = '$idkasus', kategori = '$kategori', lambuk = '$lambuk', nik = '$nik',tglkas = '$tglkas',kejadian = '$kejadian',idpeng = '$idpeng',jenkas = '$jenkas',statkas = '$statkas'")
		 or die(mysql_error());

		header('Location:aduan.php');

	}
}
}