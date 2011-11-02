<?php
  echo '<h2>Menu</h2>';
  echo '<ul style="float: left; margin: 10px; width: 150px;">';
  foreach($products as $product) {
    echo '<li>' . $product['name'] . " -- " . $product['price'] . '</li>';
  }
  echo '</ul>';
?>