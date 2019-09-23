<?php

require __DIR__ . '/vendor/autoload.php';

$lookup = new \Nickcheek\USPSLookup\USPSLookup('XXXXXXXXX');
$find = $lookup->Verify('3005 W 12th','','Little Rock','AR','72204');


echo "<pre>";
var_dump($find);
echo "</pre>";


