<?php

require __DIR__ . '/vendor/autoload.php';

$lookup = new \Nickcheek\USPSLookup\USPSLookup();
$find = $lookup->Verify('3017 Province','','Benton','AR','72019');
	    
echo "<pre>";
var_dump($find); 
echo "</pre>";
