<?php
    include('session.php');
    include('config.php');
    
    $quan = $_POST['quantity'];
    $pid = $_POST['productid'];
    
    $query = "select * from product where ".$pid." = product.productid";
    $result = $db->query($query);
    
    $row = $result->fetch_assoc();
    
    $total = $row['unitprice'] * $quan;
    
    $intoCart = "insert into shopping_cart values 
                 ('".$pid."', '".$quan."', '".$total."')";
    $result2 = $db->query($intoCart);
?>

<html>
    <p>
        <?php
            if($result2){
                echo "Item(s) successfully added to cart.";
            } else{
                echo "An error has occured. Your item(s) has not been added.";
            }
            
        $db->close();
        ?>
        <p>
            <a href="shoppingcart.php">View Cart</a>
        </p>
        <p>
            <a href="products.php">Return to Products</a>
        </p>
        
    </p>
</html>