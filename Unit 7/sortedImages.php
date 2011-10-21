<?php
  function sortedImages($number_images) {
    $directory = 'images/random/';

    $files = array();
    $i = 0;
    $handle = opendir($directory);
    while ($file = readdir($handle)) {
      if ($file != '.' && $file != '..') {
        $files[$i] = $file;
        $i++;        
      }   
    }
    closedir($handle); // We're not using it anymore
    
    shuffle($files);
    
    for( $j=0; $j<$number_images; $j++) {
      $outputString .= '<img src="images/random/' . $files[$j] . '" height="100px" />';
    }
    
    echo $outputString;
  }
?>