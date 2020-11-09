 <?php 

include("../../koneksi.php");
                                                

$kategori = (isset($_POST['kat'])) ? $_POST['kat']:null;
$page = (isset($_GET['page'])) ? $_GET['page']:1;
$perpage =10;

//$query = mysql_query("SELECT konsumen.nm_kon, year(tgl_pesan) as th, COUNT(pesan.id_pesan) AS jum_pesan, SUM(rancangan.quantity) AS jum_pem FROM pesan LEFT JOIN rancangan ON pesan.id_pesan=rancangan.id_pesan JOIN konsumen ON pesan.id_kon=konsumen.id_kon group by th");
//$query = mysql_query("SELECT * from pesan");
$query = mysql_query("SELECT datkas.kategori, year(tglkas) as th, COUNT(datkas.idkasus) AS jum_kasus FROM datkas  group by datkas.kategori ");

if ($kategori != null) {
	$query = mysql_query("SELECT kategori, year(tglkas) as th, COUNT(datkas.idkasus) AS jum_kasus FROM datkas where kategori='$kategori' group by datkas.kategori ");
	# code...
}

$from_page = (($page-1)*$perpage);
//$with_limit = " order by konsumen.nm_kon asc limit $from_page,$perpage";
//$getQuery = mysql_query($query.$with_limit) or die(mysql_error());
$count = mysql_num_rows($query);
//$count1=$sql['jum_pem'];
$firstpage = 1;
$currentpage = intval($page);
$lastpage = ceil($count/$perpage);
$nextpage = ($currentpage == $lastpage) ? null : $currentpage+1;
$prevpage = ($currentpage == 1 ) ? null : $currentpage-1;

$data = [];
while ($row = (mysql_fetch_array($query))) {
	# code...
	$record = [
		'tahun' => $row['th'],
		'kategori' => $row['kategori'],
		'jum_kasus' => $row['jum_kasus']

	];
	array_push($data, $record);
}

$response = [
	'first_page' => $firstpage,
	'current_page' => $currentpage,
	'last_page' => $lastpage,
	'next_page' => $nextpage,
	'prev_page' => $prevpage,
	'per_page' => $perpage,
	'total' => $count,
//	'total_pesan' => $count1,

	'data' => $data
];

header('Content-Type: application/json');
echo json_encode($response);










       ?>