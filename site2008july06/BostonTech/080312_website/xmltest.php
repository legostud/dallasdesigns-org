<?php
// The file test.xml contains an XML document with a root element
// and at least an element /[root]/title.

if (file_exists('Menu2.xml')) {
    $xml = simplexml_load_file('Menu2.xml');
 
    print_r($xml);
} else {
    exit('Failed to open Menu2.xml.');
}

echo "<br /><br />";
echo $xml->menu[0]->options->option[1]->text; // "So this language. It's like..."

?>