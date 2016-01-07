<?php
	$erabiltzaileak=simplexml_load_file('../xml/erabiltzaileak.xml');
	if(isset($_REQUEST['nick'])){	
		$eposta_nick=$_POST['nick'];
	}else{
		$eposta_nick="";
	}
	
	if(isset($_REQUEST['pasahitza'])){	
		$pasahitza=$_POST['pasahitza'];
	}else{
		$pasahitza="";
	}
	
	
	
	$aurkitua=false;
	foreach($erabiltzaileak->erabiltzailea as $erab){
		if( (($erab->eposta==$eposta_nick)|| ($erab['id']==$eposta_nick)) &&($erab->pasahitza==$pasahitza)){
			$aurkitua=true;
			$eposta=$erab->eposta;
		}
	}
	
	$mezua="";

	if($aurkitua){
		$mezua="<p style='color:green'> Datu egokiak</p>";
	}else{
		$mezua="<p style='color:red'> Datu okerrak!</p>";
	}
	
	echo $mezua;
?>