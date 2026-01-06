<?php
    include('session.php');
    require('logoutbutton.php');
    include('config.php');
  
  if(isset($_POST['order-process'])){
      $pid = $_POST['productid'];
      $bought = $_POST['quantity'];
      
      $inv = "update inventory set instock = instock - ".$bought." where inventory.itemid = ".$pid."";
      $process = $db->query($inv);
      
      if($process){
              echo "<p>Order processed</p>";
              
              $processed = "delete from cust_order where cust_order.pid = ".$_POST['productid']."";
              $res = $db->query($processed);
              
          } else{
              echo "<p>Order has not been processed</p>";
          }
      
  }
  
  $query = "select * from cust_order, order_receipt, address where cust_order.orderid = order_receipt.orderid and cust_order.customerid = address.customerid";
  $result = $db->query($query);
  
?>
<html>
<head>
  <title>LBP Funko POP! Shop - Customer Orders</title>
</head>
<body>
<h1>LBP Funko POP! Shop</h1>
<h2>Customer Orders</h2>
<p><a href="inventory.php">Back to Inventory</a></p>
<?php
  // count the number of orders in the array
  $number_of_orders = $result->num_rows;

  if ($number_of_orders == 0) {
    echo "<p><strong>No orders pending.
          Please try again later.</strong></p>";
  }

  echo "<table border=\"1\">\n";
  echo "<tr><th bgcolor=\"#CCCCFF\">Order Date</th>
            <th bgcolor=\"#CCCCFF\">Order ID</th>
            <th bgcolor=\"#CCCCFF\">Customer ID</th>
            <th bgcolor=\"#CCCCFF\">Product ID</th>
            <th bgcolor=\"#CCCCFF\">Quantity</th>
            <th bgcolor=\"#CCCCFF\">Total</th>
            <th bgcolor=\"#CCCCFF\">Address</th>
            <th bgcolor=\"#CCCCFF\">Fulfill Order</th>
         <tr>";

  for ($i=0; $i<$number_of_orders; $i++) {
     $orders= $result->fetch_assoc();
    // output each order
    echo "<tr>
             <td>".$orders['orderdate']."</td>
             <td align=\"right\">".$orders['orderid']."</td>
             <td align=\"right\">".$orders['customerid']."</td>
             <td align=\"right\">".$orders['productid']."</td>
             <td align=\"right\">".$orders['quantity']."</td>
             <td>".$orders['total']."</td>
             <td align=\"right\">".$orders['street'].$orders['city'].$orders['state'].$orders['zipcode']."</td>
             <form action=\"vieworders2.php\" method=\"post\">
                <td>
                <input type=\"hidden\" name=\"productid\" value=\"{$orders['productid']}\">
                <input type=\"hidden\" name=\"quantity\" value=\"{$orders['quantity']}\">
                <input type=\"submit\" name=\"order-process\" value=\"Process Order\">
                </td>
             </form>

          </tr>";
          
          
  }

  echo "</table>";
?>
</body>
</html>
