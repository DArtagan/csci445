<html>
  <head>
    <title>Order Form</title>
    <?php require('reference.php'); ?>
  </head>
  <body>
    <h1>Willy's Pack &amp; Ship</h1>
    <div style="float: right">
      <?php require('sortedImages.php'); 
      sortedImages(3);?>
    </div>
    <div>
      <?php require('menu.php'); ?>
    </div>
    <div style="margin-left: 175px;">
      <h2>Order Form</h2>
      <form action="orderresults.php" method="post">
        <p>Customer Name: <input type="text" name="customerName" /></p>
        <br />
        <table>
          <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Size</th>
          </tr>
          <tr>
            <td>Boxes</td>
            <td><input type="text" name="boxqty" size="3" maxlength="3" /></td>
            <td><select name="boxsize"><option value="null">---</option><option value="small">Small</option><option value="medium">Medium</option><option value="large">Large</option></select></td>
          </tr>
          <tr>
            <td>Tape</td>
            <td><input type="text" name="tapeqty" size="3" maxlength="3" /></td>
          </tr>
          <tr>
            <td>Biodegradable Packing Peanuts</td>
            <td><input type="text" name="peanutqty" size="3" maxlength="3" /></td>
          </tr>
          <tr>
            <td colspan="3"><input type="submit" value="Submit Order" /></td>
          </tr>
        </table>
      </form>
    </div>
    <p><a href="orderlist.php">View a list of all orders.</a></p>
  </body>
</html>