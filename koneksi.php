<?php
$server ="localhost";
$user ="root";
$passwd ="";
$db ="satgas";
$koneksi=mysql_connect($server, $user, $passwd)
or die ("Gagal konek ke server MySQL".mysql_error());
$bukandb=mysql_select_db($db)
or die ("Gagal membuka database $db".mysql_error());
?>
