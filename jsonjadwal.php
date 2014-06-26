<?php

$host		 = "localhost";
$username	 = "rezaervani";
$password	= "3clipse_2014";
$database	= "jadwalkajian";

$koneksi = mysqli_connect($host,$username,$password,$database);

if (mysqli_connect_errno()) {
	echo "Koneksi Gagal" . mysqli_connect_error();
} else {



$hasil = mysqli_query($koneksi, "SELECT * FROM ayongajitiaphari")or die(mysql_error());

	//array untuk respon JSON
	$respon = array();


$respon["jadwalnya"] = array();

	while($baris = mysqli_fetch_array($hasil)) {
	$jadwalnya = array();
	$jadwalnya["id"] = $baris["id"];
	$jadwalnya["tanggal"] = $baris ["tanggal"];
	$jadwalnya["namamasjid"] = $baris["namamasjid"];	
	$jadwalnya["judulkajian"] = $baris["judulkajian"];
	$jadwalnya["pemateri"] = $baris["pemateri"];
	

	array_push($respon["jadwalnya"], $jadwalnya);
}

	echo json_encode($respon);


};

?>
