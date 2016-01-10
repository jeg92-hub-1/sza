<?php
	if(isset($_REQUEST['nick'])){
		$nick = $_POST['nick'];
	}else{
		$nick = "";
	}
	
	if(isset($_REQUEST['izena'])){
		$izena = $_POST['izena'];
	}else{
		$izena = "";
	}
	
	if(isset($_REQUEST['abizenak'])){
		$abizenak = $_POST['abizenak'];
	}else{
		$abizenak = "";
	}
	
	if(isset($_REQUEST['pasahitza'])){
		$pasahitza = $_POST['pasahitza'];
	}else{
		$pasahitza = "";
	}
	
	if(isset($_REQUEST['eposta'])){
		$eposta = $_POST['eposta'];
	}else{
		$eposta = "";
	}
	
	$erabiltzaileak=simplexml_load_file('../xml/erabiltzaileak.xml');
	
	if(!$erabiltzaileak){
		echo "XML fitxategia kargatzerakoan errorea egon da.";
	}else{
		$erabiltzailea=$erabiltzaileak->addchild('erabiltzailea');
		$erabiltzailea->addAttribute('id', $nick);
		$erabiltzailea->addchild('izena',$izena);
		$erabiltzailea->addchild('abizenak',$abizenak);
		$erabiltzailea->addchild('pasahitza',$pasahitza);
		$erabiltzailea->addchild('eposta',$eposta);
		
		$gordeDA = $erabiltzaileak->asXML('../xml/erabiltzaileak.xml');
		if($gordeDA){
			echo "sartutako erabiltzailea ondo gorde da!";
		}else{
			echo "errorea gordetzerakoan, saiatu berriro";
		}
	}
	
?>