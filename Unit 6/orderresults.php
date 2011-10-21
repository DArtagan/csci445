<html>
<head>
<title>Order Results</title>
</head>
<style type="text/css">
ul {
list-style-type: none;
}
</style>
<body>
<h1>Willy's Pack &amp; Ship</h1>
<h2>Order Results</h2>
<p>Order processed at <?php $date = date("D F j, Y; g:i A"); echo $date; ?>.</p>
<p>You ordered
<?php
$items = array(
"box" => array(
"name" => "box",
"plural" => "boxes",
"price" => 5.00,
"qty" => $_POST['boxqty'],
"size" => $_POST['boxsize'],
),
"tape" => array(
"name" => "tape",
"plural" => "rolls of tape",
"price" => 7.00,
"qty" => $_POST['tapeqty'],
),
"peanuts" => array(
"name" => "biodegradable packing peanut",
"plural" => "biodegradable packing peanuts",
"price" => 3.00,
"qty" => $_POST['peanutqty'],
)
);

$totalqty = 0;
foreach($items as $item) {
$totalqty += (int) $item['qty'];
}
echo $totalqty;
    ?> items:</p>
<ul>
<?php
foreach($items as $item) {
?><li><?php
if( $item['qty'] > 0) {
echo $item['qty'] . ' ';
if($item['size'] != NULL) echo $item['size'] . ' ';
if($item['qty'] == 1) {
echo $item['name'];
} else {
echo $item['plural'];
}
}
?></li><?php
}
        ?>
</ul>
<p>Subtotal: <?php
foreach($items as $item) {
$subtotal += $item['price'] * $item['qty'];
}
echo '$' . number_format($subtotal, 2);
?></p>
<p>Grand Total (including tax): <?php
$tax = .08;
    $grandtotal = $subtotal*(1+$tax);
echo '$' . number_format($grandtotal, 2);
?></p>
<?php
      $outputstring = $date . "\t";
      
      $test = FALSE;
      foreach($items as $item) {
        if($item['qty'] != 0 && $item['qty'] != NULL) $test = TRUE;
        if( $item['qty'] > 0) {
          $outputstring .= $item['qty'] . " " . $item['name'];
          if($item['size'] != NULL) $outputstring .= " (" . $item['size'] . ")";
          $outputstring .= ",\t";
        }
      }
      $outputstring = substr($outputstring,0,-2);
      $outputstring .= ': $' . $grandtotal;
      $outputstring .= "\n";
        
      if($test == TRUE){
        @ $fp = fopen('orders.txt', 'ab');
        flock($fp, LOCK_EX);
        if(!$fp) {
          ?><p style="font-weight: bold;">Your order could not be processed, please try again later.</p><?php
          exit;
        }
        
        fwrite($fp, $outputstring, strlen($outputstring));
        flock($fp, LOCK_UN);
        fclose($fp);
      }
      
      echo "<p>Your order has been recorded.</p>";
    ?>
<p><a href="orderlist.php">View a list of all orders.</a><br /><a href="orderform.html">Order Again</a></p>
</body>
</html>