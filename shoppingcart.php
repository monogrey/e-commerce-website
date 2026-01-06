<?php
    include('session.php');
    include('config.php');
    require('header.php');
    
    //removes item from shopping cart
    if(isset($_POST['remove'])){
        $item = $_POST['productid'];
        
        $revitem = "delete from shopping_cart where shopping_cart.prodid = ".$item."";
        
        $db->query($revitem);
    }
    
    if(isset($_POST['place-order'])){
        if(empty($_POST['place-order'])){
            echo "<p>There is nothing in your cart. Add items in your cart to place an order.</p>";
        }
        
    }
    
    $query = "select * from shopping_cart, product where shopping_cart.prodid = product.productid";
    $result = $db->query($query);
    
?>

<html>
    <head>
        <title>LBP Funko POP! Shop - Shopping Cart</title>
    </head>
    <body>
        <div id="shopping-cart">
            <table border="1">
                
                <tr>
                        <th>Product ID</th><th>Product Name</th><th>Quantity</th><th>Total</th>
                    </tr>
                    
            <?php 
                $count = $result->num_rows;
                if($count == 0){
                    echo "<p>Your shopping cart is empty</p>";
                }
                
                for($i = 0; $i < $count; $i++){
                    $row = $result->fetch_assoc();
            ?>
                    <tr>
                        <td align="right">
                            <?php echo $row['prodid']; ?>
                        </td>
                        <td align="left">
                            <?php echo $row['productname']; ?>
                        </td>
                        <td align="center">
                            <?php echo $row['quantity']; ?>
                        </td>
                        <td>
                           <?php echo $row['totalprice']; ?> 
                        </td>
                        <td>
                            <form action="shoppingcart.php" method="post">
                                <input type="hidden" name="productid" value="<?= $row['prodid']; ?>">
                                <input type="submit" name="remove" value="Remove">
                            </form>
                        </td>
                        <td>
                            <form action="placeorder.php" method="post">
                            <input type="hidden" name="prodid" value="<?=$row['prodid']; ?>">
                            <input type="submit" name="place-order" value="Place Order">
                            </form>
                        </td>
                    </tr>
                </table>        
            
            <?php  
                }
                
                $result->free();
                $db->close();
            ?>
            
        </div>
    </body>
</html>