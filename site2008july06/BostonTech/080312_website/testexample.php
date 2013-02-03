<?php
include 'example.php';

$xml = new SimpleXMLElement($xmlstr);

echo $xml->movie[0]->plot; // "So this language. It's like..."
?> 
