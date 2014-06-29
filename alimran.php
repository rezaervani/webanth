<?php

$host		 = "localhost";
$username	 = "rezaervani";
$password	= "3clipse_2014";
$database	= "jadwalkajian";

$koneksi = mysqli_connect($host,$username,$password,$database);

if (mysqli_connect_errno()) {
	echo "Koneksi Gagal" . mysqli_connect_error();
} else {



$hasil = mysqli_query($koneksi, "SELECT * FROM aliimran")or die(mysql_error());

$xml = new SimpleXMLElement('<alquran/>');

	while($baris = mysqli_fetch_assoc($hasil)) {
	$jadwalnya = $xml->addChild('ayatquran');
	$jadwalnya->addChild('Id', $baris['id']);
	$jadwalnya->addChild('urlgambar', $baris ['alamatgambar']);
	$jadwalnya->addChild('terjemah', $baris['terjemah']);	
	
}

	$fp = fopen("aliimran.xml","wb");

	fwrite($fp,$xml->asXML());

	fclose($fp);

}
?>
