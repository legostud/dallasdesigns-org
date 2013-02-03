<?php 

$myFile = "Staples.html";
$fh = fopen($myFile, 'r');
$theData = fread($fh, filesize($myFile));
fclose($fh);
//echo $theData;

$search = '/(<div class="c01">\s+<div class="b001">\s+<div class="n01">[\s\S]+?<\/div>\s+<\/div>\s+<\/div>)[\s\S]+?(<div class="c01">\s+<div class="b001">\s+<div class="n01">[\s\S]+?<\/div>\s+<\/div>\s+<\/div>)[\s\S]+?(<div class="c01">\s+<div class="b001">\s+<div class="n01">[\s\S]+?<\/div>\s+<\/div>\s+<\/div>)/';
$replace = '$3$2$1';

echo preg_replace ($search,$replace,$theData);

?>