<?php
	$liburuak=simplexml_load_file('../xml/liburuak.xml');
	$erantzuna=1;
	if(isset($_REQUEST['ISBN'])){
		$isbn=$_GET['ISBN'];
	}else{
		$erantzuna=-1;
	}

	$aurkitua=false;
	if($erantzuna!=-1){
		foreach($liburuak->liburua as $lib){
			if($lib['ISBN']==$isbn){
				$aurkitua=true;
			}
		}
		if($aurkitua==true){
			$erantzuna=0;
		}else{
			$erantzuna=1;
		}
	}
	
	echo $erantzuna;
	
?>