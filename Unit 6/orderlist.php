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
      
      if( $order == "" ) {
        ?><p style="font-weight: bold;">No orders pending, try again some other time.</p><?php
      } else {
        echo $order . "<br />";
      }
      
      while(!feof($fp)) {
        $order = fgets($fp, 999);
        $grandtotal += (double) substr((strstr($order, '$')), 1);
        echo $order . "<br />";
      }
      echo '<p>The grand total of all orders: $' . $grandtotal . '</p>';
      fclose($fp);
      
      $row = 1;
      if (($fp = fopen("orders.txt", "r")) !== FALSE) {
        while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
            $num = count($orders);
            $row++;
        }
      }
      fclose($fp);
    ?>
  </body>
</html>
