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
      
      $order = fgets($fp, 999);
      if( $order == "" ) {
        ?><p style="font-weight: bold;">No orders pending, try again some other time.</p><?php
      } else {
        echo $order . "<br />";
      }
      
      while(!feof($fp)) {
        $order = fgets($fp, 999);
        echo $order . "<br />";
      }
    ?>
  </body>
</html>
      $grandtotal = 0;
 $grandtotal += $item['qty'] * $item['price'];
       echo "<p>Grand Total: $" . $grandtotal . "</p>;