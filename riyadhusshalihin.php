<?php

$host		 = "localhost";
$username	 = "rezaervani";
$password	= "3clipse_2014";
$database	= "jadwalkajian";

$koneksi = mysqli_connect($host,$username,$password,$database);

if (mysqli_connect_errno()) {
	echo "Koneksi Gagal" . mysqli_connect_error();
} else {



$hasil = mysqli_query($koneksi, "SELECT * FROM riyadhusshalihin")or die(mysql_error());

$xml = new SimpleXMLElement('<hadits/>');

	while($baris = mysqli_fetch_assoc($hasil)) {
	$hadits = $xml->addChild('riyadhusshalihin');
	$hadits->addChild('Id', $baris['id']);
	$hadits->addChild('urlgambar', $baris ['alamatgambar']);
	$hadits->addChild('terjemah', $baris['terjemah']);	
	$hadits->addChild('derajat',$baris['derajat']);
	$hadits->addChild('pengesahan',$baris['pengesahan']);
	$hadits->addChild('syarah',$baris['syarah']);
	
}

	$fp = fopen("riyadhusshalihin.xml","wb");

	fwrite($fp,$xml->asXML());

	fclose($fp);

}
?>
