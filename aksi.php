<?php
    include ('koneksi.php');              
    //fungsi untuk input data masyarakat
    if(isset($_POST["inputmasyarakat"])){
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

    header('location:bagian/depan/index.php');

  }
  
?> 