<?php
$xml = new DOMDocument;
$xml->load('../xml/liburuak.xml');

// Load XSL file
$xsl = new DOMDocument;
$xsl->load('../xml/liburuak.xsl');

// Configure the transformer
$proc = new XSLTProcessor;

// Attach the xsl rules
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);

?>