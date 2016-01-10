<?php
	session_start();
	if(session_destroy()){
		header("Location: ../index.html");
	}else{
		echo "Errore bat egonda logout egiterakoan";
	}
?>