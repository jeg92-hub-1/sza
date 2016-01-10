<?php
	$erabiltzaileak=simplexml_load_file('../xml/erabiltzaileak.xml');
	if($erabiltzaileak){
		$eposta_nick=$_POST['nick'];
		$pasahitza=$_POST['pasahitza'];
		$aurkitua=false;
		$eposta="";
		foreach($erabiltzaileak->erabiltzailea as $erab){
			if( (($erab->eposta==$eposta_nick)|| ($erab['id']==$eposta_nick)) &&($erab->pasahitza==$pasahitza)){
				$aurkitua=true;
				$eposta=$erab->eposta;
			}
		}

		if($aurkitua){
			session_start();
			$_SESSION['login'] = $eposta;
			header('Location: ../erabiltzailea.html');
			exit();
		}else{
			header('Location: ../login.html');
		}
	}else{
		echo "Errore bat egonda XML kargatzerkoan";
		header('Location: ../login.html');
	}

?>