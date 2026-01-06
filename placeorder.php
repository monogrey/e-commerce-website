<?php
    include('session.php');
    include('config.php');
    require('header.php');
    
    // gets product id from placed order
    $pid = $_POST['prodid'];
    
    $item = "select * from shopping_cart where ".$pid." = shopping_cart.prodid";
    $result = $db->query($item);
    
    $row = $result->fetch_assoc();
    
    $date = date('Y-m-d');
    
    $order = "insert into cust_order (customerid, pid, total, orderdate)values ('{$_SESSION['login_user']}', ".$row['prodid'].", ".$row['totalprice'].", '$date')";
    $status = $db->query($order);
    
    $query = "select * from cust_order, product, shopping_cart where cust_order.pid = shopping_cart.prodid and cust_order.pid = product.productid";
    $result2 = $db->query($query);
    
    $row2 = $result2->fetch_assoc();
    
    $receipt = "insert into order_receipt values (".$row2['orderid'].", ".$row2['productid'].", ".$row2['unitprice'].", ".$row2['quantity'].")";
    $stat = $db->query($receipt);
?>

<html>
    <head>
        <title>Order Processed</title>
    </head>
    <body>
        <?php
            if($status){
                echo "Your order has been placed.";
                echo "<p><a href=\"orderhistory.php\">View Order History</a><p>";
                echo "<p><a href=\"shoppingcart.php\">Go back to cart</a></p>";
                echo "<p><a href=\"home.php\">Go back to home page</a></p>";
                
                $purchased = "delete from shopping_cart where ".$pid." = shopping_cart.prodid";
                $db->query($purchased);
            } else{
                echo "An error has occured. Your order has not been placed.";
            }
        ?>
    </body>
</html>