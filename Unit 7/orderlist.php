<html>
  <head>
    <title>Order List</title>
    <?php require('reference.php'); ?>
  </head>
  <body>
    <h1>Order List</h1>
    <?php
      @ $fp = fopen("orders.txt", 'rb');
      if(!$fp) {
        ?><p style="font-weight: bold;">No orders pending, try again some other time.</p><?php 
        exit;
      }
      
      $orders = array();
      
      for($i = 0; $input = fgetcsv($fp, 999, "\t"); $i++) {
        $orders[$i]['meta']['date'] = $input[0];
        $orders[$i]['meta']['name'] = $input[1];
        for($j = 2; $input[$j] != ""; $j++) {
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
      
      $grandtotal = 0;
      echo '<ol>';
      for($i = 0; $i < count($orders); $i++) {
        $total = 0;
        $outputString = $orders[$i]['meta']['date'] . '; ';
        foreach($orders[$i] as $item => $row) {
          if($item != 'meta') {
            $outputString .= $orders[$i][$item]['qty'] . ' ';
            if($orders[$i][$item]['size'] != NULL) $outputString .= $orders[$i][$item]['size'] . ' ';
            if($orders[$i][$item]['qty'] == 1) {
              $outputString .= $item . ', ';
            } else {
              $outputString .= $products[$item]['plural'] . ', ';
            }
            $total += ($products[$item]['price'] * $orders[$i][$item]['qty']);
          }
        }
        $outputString = substr($outputString,0,-2) . '; ' . '$' . number_format($total, 2);
        $orders[$i]['meta']['total'] = $total;
        $grandtotal += $total;
        echo '<li>' . $outputString . '</li>';
      }
      echo '</ol>';
      echo '<p>Grandtotal: $' . number_format($grandtotal, 2) . '</p>';

      
      fclose($fp);
    ?>
  </body>
</html>