<?php
	$liburuak=simplexml_load_file('../xml/liburuak.xml');
	if($liburuak){
		$cb_liburuak="<option value='-'>- - Aukeratu liburu bat - -</option>";
		foreach($liburuak->liburua as $liburua){
			$isbn=$liburua['ISBN'];
			$hizkuntza=$liburua['hizkuntza'];
			$izenburua=$liburua->izenburua;
			$cb_liburuak = $cb_liburuak . "<option value='$isbn'>$izenburua ($hizkuntza)</option>";
		}
		echo $cb_liburuak;
	}else{
		echo "Errore bat egon da liburuak.xml fitxategia kargatzerakoan";
	}
	
?>