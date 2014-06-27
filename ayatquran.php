<?php

$host		 = "localhost";
$username	 = "rezaervani";
$password	= "3clipse_2014";
$database	= "jadwalkajian";

$koneksi = mysqli_connect($host,$username,$password,$database);

if (mysqli_connect_errno()) {
	echo "Koneksi Gagal" . mysqli_connect_error();
} else {



$hasil = mysqli_query($koneksi, "SELECT * FROM daftarsurah")or die(mysql_error());

	//array untuk respon JSON
	$respon = array();


$respon["surahquran"] = array();

	while($baris = mysqli_fetch_array($hasil)) {
	$surahquran = array();
	$surahquran["id"] = $baris["id"];
	$surahquran["namasurah"] = $baris ["namasurah"];
	$surahquran["keterangan"] = $baris["keterangan"];	
	

	array_push($respon["surahquran"], $surahquran);
}

	echo json_encode($respon);


};

?>
