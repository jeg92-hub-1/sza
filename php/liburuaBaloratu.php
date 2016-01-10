<?php

	if(isset($_REQUEST['selectedLiburua'])){
		$isbn=$_POST['selectedLiburua'];
	}else{
		$isbn="";
	}
	
	if(isset($_REQUEST['balorazioa'])){
		$balorazioa=$_POST['balorazioa'];
	}else{
		$balorazioa="";
	}
	
	$liburuak=simplexml_load_file('../xml/liburuak.xml');
	
	if($liburuak){
		$aurkitu=false;
		foreach($liburuak->liburua as $lib){
			if($lib['ISBN']==$isbn){
				$aurkitu=true;
				if($lib->balorazioa['batazbestekoa'] != 0){
					$lib->balorazioa->addChild('puntuazioa',$balorazioa);
					$totala=0;
					$kont=0;
					foreach($lib->balorazioa->puntuazioa as $bal){
						$totala = $totala + $bal;
						$kont = $kont + 1;
					}
					$totala=$totala / $kont;
					$lib->balorazioa['batazbestekoa'] = $totala;
				}else{
					$lib->balorazioa['batazbestekoa'] = $balorazioa;
					$lib->balorazioa->puntuazioa = $balorazioa;
				}
				$gordeDa = $liburuak->asXML("../xml/liburuak.xml");
				if($gordeDa){
					echo "Balorazioa egina";
				}else{
					echo "Errore bat egon da balorazioa gordetzerakoan!";
				}
			}
		}
		
		if(!$aurkitu){
			echo "Sartutako isbn ez da existitzen";
		}
	}else{
		echo "XML kargatzerakoan errore bat egon da";
	}
?>
