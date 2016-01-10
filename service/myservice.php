<?php
//call library 
require_once ('lib/nusoap.php');
require_once('lib/class.wsdlcache.php'); 

$ns="http://localhost/sza/service/myservice.php?wsdl";
$server = new soap_server; 
$server->configureWSDL('konprobatu',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('pasahitzaErrexegia',array('pasahitza'=>'xsd:string'),array('erantzuna'=>'xsd:string'),$ns); 

function pasahitzaErrexegia($pasahitza){
	$irten=FALSE;
	$file = fopen("toppasswords.txt","r");
	while(!feof($file) && $irten==FALSE){
		$lerroa=trim(fgets($file));
		if(strcmp($lerroa,$pasahitza)==0){
			$irten=TRUE;		
		}
	}
	fclose($file);
	if($irten==TRUE){
		return "ERREXEGIA";
	}else{
		return "ONDO";
	}
}

// create HTTP listener 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA); 
exit();
?>  
