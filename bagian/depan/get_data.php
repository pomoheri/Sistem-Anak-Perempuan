 <?php 

include("../../koneksi.php");
                                                

$tahun = (isset($_POST['th'])) ? $_POST['th']:null;
$page = (isset($_GET['page'])) ? $_GET['page']:1;
$perpage =10;
$query = mysql_query("SELECT datkas.kategori, year(tglkas) as th, COUNT(datkas.idkasus) AS jum_kasus FROM datkas group by datkas.kategori ");

if ($tahun != null) {
	$query = mysql_query("SELECT datkas.kategori, year(tglkas) as th, COUNT(datkas.idkasus) AS jum_kasus FROM datkas where year(tglkas)='$tahun' group by datkas.kategori ");
	# code...
}

$from_page = (($page-1)*$perpage);
$count = mysql_num_rows($query);
$firstpage = 1;
$currentpage = intval($page);
$lastpage = ceil($count/$perpage);
$nextpage = ($currentpage == $lastpage) ? null : $currentpage+1;
$prevpage = ($currentpage == 1 ) ? null : $currentpage-1;

$data = [];
while ($row = (mysql_fetch_array($query))) {
	# code...
	$record = [
		'kategori' => $row['kategori'],
		'th' => $row['th'],
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