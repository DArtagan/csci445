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
    mt_srand((double)microtime()*1000000); // seed for PHP < 4.2
    
    $rand_array = array();
    $outputString = "";
    $i--;
    for( $j=0; $j<$number_images;  ) {
      $rand = mt_rand(0, $i); // $i was incremented as we went along
      if( !(in_array($rand,$rand_array))) {
        $outputString .= '<img src="images/random/' . $files[$rand] . '" height="100px" />';
        $rand_array[$j] = $rand;
        $j++;
      }
    }
    
    echo $outputString;
  }
?>