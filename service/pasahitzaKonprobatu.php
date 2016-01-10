<?php
require ('lib/nusoap.php');
require_once('lib/class.wsdlcache.php'); 

$pass = $_GET['PASAHITZA'];

//Web zerbitzariaren URL-a
$wsdl = "http://localhost:8080/sza/service/myservice.php";
//Erabiltzaile objektua sortzen
$client = new nusoap_client($wsdl, false);

//Errorern bat egon den
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<h2>Eraikitzerakoan arazoren bat egon da.</h2>' . $err;
}
 
$erantzuna = "";
$result1 = $client->call('pasahitzaErrexegia', array('pasashitza'=>$pass));

if(strcmp($result1,"ERREXEGIA")==0){
	$erantzuna = "<p style='color:red'>Pasahitz errexegia</p>&&&g";
}else{
	$erantzuna = "<p style='color:green'>Pasahitz egokia</p>&&&o";
}
//&&&o = pasahitz egokia eta &&&g = pasahitz errexegia
echo $erantzuna;
?>
