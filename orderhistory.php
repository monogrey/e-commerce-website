<?php
    include('session.php');
    include('config.php');
    require('header.php');
    
    $order = "select * from order_receipt, product where order_receipt.productid = product.productid";
    $result = $db->query($order);
?>

<html>
    <head>
        <title>Order History</title>
    </head>
    <body>
        <?php
            $count = $result->num_rows;
            for($i = 0; $i < $count; $i++){
                $row = $result->fetch_assoc();
                $total = $row['quantity'] * $row['unitprice'];
                echo"
                    <h1>Order History</h1>
                    <strong>Order Number: </strong>{$row['orderid']} <br />
                    <strong>Product: </strong>{$row['productname']} <br />
                    <strong>Unit Price: $</strong>{$row['unitprice']} <br />
                    <strong>Quantity: </strong>{$row['quantity']} <br />
                    <strong>Total Price: $</strong>{$total} <br />
                    <p>- - -</p>
                ";
            }
        ?>
    </body>
</html>