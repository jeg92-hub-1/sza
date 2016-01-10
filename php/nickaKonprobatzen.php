<?php
	if(isset($_REQUEST['nick'])){
		$nick = $_POST['nick'];
	}else{
		$nick = "";
	}
	
	$erabiltzaileak=simplexml_load_file('../xml/erabiltzaileak.xml');
	
	if($erabiltzaileak){
		$aurkitua=false;
		foreach($erabiltzaileak->erabiltzailea as $erab){
			if($erab['id']==$nick){
				$aurkitua=true;
			}
		}
		
		if($aurkitua){
			echo "0";
		}else{
			echo "1";
		}
	}else{
		echo "Errorea XML irakurtzean";
	}
?>
