<html>
<body>
<?php

echo "<H1>Photos from Jessie Mueller's trip to Ireland</H1>\n";
echo "<p>August 2004</p>\n";


$max_col=5;
$max_pic=27;
$data=array();

if ( isset($_REQUEST['update']) ) {
  echo "Updating captions\n";
  $fp = fopen("captions.txt", "w");
  fwrite( $fp, "<?php\n\n");
  fwrite( $fp, "\$data=");
  fwrite( $fp, var_export($_REQUEST,true) );
  fwrite( $fp, ";\n\n?>");
  fclose($fp);
  $_REQUEST['captions']=1;
}
if ( array_key_exists('captions', $_REQUEST) ) {
  echo "<form method='POST' name='form' action='index.php?update'>\n";
}

if ( file_exists("captions.txt") ) {
  include( "captions.txt"); // overwrites $data
}

foreach(glob("index*.jpg") as $filename ) {
  $pics[]=preg_replace( "/index(.*)\.jpg/","$1",$filename);
}
#echo "<pre>";
#print_r($pics);
#echo "</pre>";
#exit;


echo "<table border=1>\n";
for ( $cnt = 0, $col = 1 ; $cnt < sizeof($pics) ; $cnt++, $col++ ) {
  if ( $col == 1 ) { echo "<tr>\n" ; }
  $pic = $pics[$cnt];
  if ( array_key_exists('captions', $_REQUEST) == FALSE  && 
       array_key_exists( "$pic", $data ) &&
       array_key_exists( 'del', $data[$pic] ) ) {
    $col --;
    continue ; 
  }  
  
  if ( array_key_exists($pic, $data) ) {
    $caption = $data[$pic]['cap'];
  } else {
    $caption = $pics[$cnt];
  }
  echo "<td align='center' width='20%'>\n";
  echo "  <a href='$pic.html' target='big'>\n";
  echo "    <img src='index$pic.jpg'></a>\n";
  if ( array_key_exists('captions', $_REQUEST) ) {
    if ( array_key_exists( 'del', $data[$pic] ) ) {
      $del_val = 'checked';
    } else { 
      $del_val = '';
    } 
    echo "  <textarea rows='2' name='{$pic}[cap]' cols='20'>\n";
    echo "$caption\n";
    echo "  </textarea>\n";
    echo "  <br><input type='checkbox' value='del' $del_val name='{$pic}[del]'> Delete\n";
  } else {
    echo "<p>$caption</p>\n";
  }
  if ( $col == $max_col ) {
    if ( array_key_exists('captions', $_REQUEST) ) {
      echo "<td><input type='submit' value='Update Captions'></td>\n";
    }
    echo "</tr><tr>\n";
    $col = 0;
  }
  //create the .html file for the full size image
  $fp=fopen("$pic.html",'w') ;
  fwrite( $fp, "<html>\n" ) ;
  fwrite( $fp, "<a href='index.php'>Index</a>\n") ;
  if ( $cnt == 0 ) {
    $txt=sprintf("<a href='%s.html'>Previous</a>\n",$pics[sizeof($pics)-1]);
  } else {
    $txt=sprintf("<a href='%s.html'>Previous</a>\n",$pics[$cnt-1]);
  }
  fwrite( $fp, $txt);
  if ( $cnt == sizeof($pics)-1 ) {
    $txt=sprintf("<a href='%s.html'>Next</a>\n",$pics[0]);
  } else {
    $txt=sprintf("<a href='%s.html'>Next</a>\n",$pics[$cnt+1]);
  }
  fwrite( $fp, $txt);
  fwrite( $fp, sprintf("<h3>%s</h3>\n", $caption));
  fwrite( $fp, sprintf("<img src=%03d.jpg>\n", $pics[$cnt]));
  fwrite( $fp, "</html>\n");
  fclose( $fp );
}
if ( array_key_exists('captions', $_REQUEST) ) {
  echo "<td><input type='submit' value='Update Captions'></td>\n";
}
echo "</tr>\n";
echo "</table>\n";

if ( array_key_exists('captions', $_REQUEST) ) {
  echo "<p><input type='submit' value='Update Captions'></p>\n";
  echo "</form>\n";
}

echo "<hr>\n";
echo "All images copyright Jessie Mueller\n";
?>
</body>
</html>
