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
    <p>Order processed at <?php echo date("D F j, Y; g:i A"); ?>.</p>
    <p>You ordered <?php 
      /*$boxqty = $_POST['boxqty'];
      $tapeqty = $_POST['tapeqty'];
      $peanutqty = $_POST['peanutqty'];
	  
	  $ages = array("Peter"=>32, "Quagmire"=>30, "Joe"=>34); */
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
		echo '$' . number_format(($subtotal*(1+$tax)), 2);
	  ?></p>
  </body>
</html>