<?php
require 'config.php';
$dblink = new mysqli(HOST, USER, PASSWORD, DATABASE);
	if(!mysqli_connect_errno()) {
		//echo 'Konektatut da';
	}else{
		die("MySQL konexioan errorea: ". mysqli_connect_error());
		include 'deskonexioa.php';
	}
?>