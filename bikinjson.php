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
         $jadwalnya = array();
                     while($jadwal = mysqli_fetch_assoc($hasil)){
                             $jadwalnya[] = $jadwal;
                     }
header ('Content-Type: application/json;charset=utf-8');
echo json_encode(array('jadwal'=>$jadwalnya));                     



};

?>
