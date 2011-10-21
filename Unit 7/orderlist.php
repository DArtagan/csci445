<html>
  <head>
    <title>Order List</title>
  </head>
  <body>
    <?php
      @ $fp = fopen("orders.txt", 'rb');
      if(!$fp) {
        ?><p style="font-weight: bold;">No orders pending, try again some other time.</p><?php 
        exit;
      }
      
      $orders = array();
      
      for($i = 0; $input = fgetcsv($fp, 999, "\t"); $i++) {
        var_dump($input);
        $orders[$i]['date'] = $input[0];
        for($j = 1; $input[$j] != ""; $j++) {
          $itemName = $input[$j];
          $j++;
          $orders[$i]["$itemName"]['qty'] = $input[$j];
          $j++;
          if($input[$j] == "none") {
            $orders[$i]["$itemName"]['size'] = NULL;
          } else {
            $orders[$i]["$itemName"]['size'] = $input[$j];
          }
        }
      }
      
      echo '<ol>';
      for($i = 0; $i < count($orders); $i++) {
        foreach($orders[$i] as $item => $row) {
          ?><li><?var_dump($item);?></li><?
          ?><li><?var_dump($row);?></li><?
          if($item != 'date') {
            $outputString .= $orders[$i][$item]['qty'] . ' ';
            if($orders[$i][$item]['size'] != NULL) $outputString .= $orders[$i][$item]['size'] . ' ';
            $outputString .= $item . ', ';
          }
        }
        echo '<li>' . $outputString . '</li>';
      }
      echo '</0l>';
      
      $i = 0;
      foreach($orders as $order) {
        echo $i++;
        $j = 55;
        foreach($order as $item) {
          echo $j++;
        }
      }
    
      var_dump($orders);
    
      /*$order = fgets($fp, 999);
      if( $order == "" ) {
        ?><p style="font-weight: bold;">No orders pending, try again some other time.</p><?php
      } else {
        echo $order . "<br />";
      }
      
      while(!feof($fp)) {
        $order = fgets($fp, 999);
        echo $order . "<br />";
      }*/
      
      fclose($fp);
    ?>
  </body>
</html>