<?php
	if(isset($_REQUEST['isbn'])){
		$isbn=$_POST['isbn'];
	}else{
		$isbn="";
	}
	
	if(isset($_REQUEST['hizkuntza'])){
		$hizkuntza=$_POST['hizkuntza'];
	}else{
		$hizkuntza="";
	}

	if(isset($_REQUEST['izenburua'])){
		$izenburua=$_POST['izenburua'];
	}else{
		$izenburua="";
	}
	if(isset($_REQUEST['egilea'])){
		$egilea=$_POST['egilea'];
	}else{
		$egilea="";
	}

	if(isset($_REQUEST['portada'])){
		$portada=$_POST['portada'];
	}else{
		$portada="";
	}
		
	if(isset($_REQUEST['argitaletxea'])){
		$argitaletxea=$_POST['argitaletxea'];
	}else{
		$argitaletxea="";
	}
	if(isset($_REQUEST['urtea'])){
		$urtea=$_POST['urtea'];
	}else{
		$urtea="";
	}
	
	if(isset($_REQUEST['gaia'])){
		$gaia=$_POST['gaia'];
	}else{
		$gaia="";
	}
	
	
	if(isset($_REQUEST['sinopsia'])){
		$sinopsia=$_POST['sinopsia'];
	}else{
		$sinopsia="";
	}
	
	$liburuak=simplexml_load_file('../xml/liburuak.xml');
	if(!$liburuak){
		echo "XML fitxategia kargatzerakoan errorea egon da.";
	}else{
		$liburua=$liburuak->addchild('liburua');
		$liburua->addAttribute('ISBN', $isbn);
		$liburua->addAttribute('hizkuntza',$hizkuntza);
		$liburua->addchild('izenburua',$izenburua);
		$liburua->addchild('egilea',$egilea);
		$liburua->addchild('portada',$portada);
		$liburua->addchild('argitaletxea',$argitaletxea);
		$liburua->addchild('urtea',$urtea);
		$liburua->addchild('gaia',$gaia);
		$liburua->addchild('sinopsia',$sinopsia);
		$liburua->addchild('balorazioa');
		$liburua->balorazioa->addAttribute('batazbestekoa',0);
		$liburua->balorazioa->addchild('puntuazioa',0);
		
		
		$gordeDA = $liburuak->asXML('../xml/liburuak.xml');
		
		if($gordeDA){
			echo "sartutako liburua ondo gorde da!";
		}else{
			echo "errorea gordetzerakoan, saiatu berriro";
		}
		
	}

?>