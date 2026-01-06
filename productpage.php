<?php
    include('session.php');
    include("config.php");
    
    $prodid = $_GET['id'];
    
    $query = "select * from product where ".$prodid." = product.productid";
    $result = $db->query($query);
    
    $query2 = "select * from inventory where ".$prodid." = inventory.itemid";
    $result2 = $db->query($query2);
    
    $row = $result->fetch_assoc();
    $row2 = $result2->fetch_assoc();
?>

<html>
    <head>
        <title>Product Page</title>
    </head>
    
    <body>
        <h1>Product page</h1>
            <div class="product-name">
                <?php
                    echo "<p>".$row['productname']."</p>";
                    ?>
            </div>
            <div class="product-price">
                <?php
                    echo "<p>$".$row['unitprice']."</p>";
                    ?>
            </div>
            <div class="product-desc">
                <?php
                    echo "<p>".$row['description']."</p>";
                ?>
            </div>
            
            <div class="cart-action">
                <form action="add.php" method="post">
                    <input type="text" name="quantity" value="1" min="1" max="<?=$row2['instock']; ?>" size="2">
                    <input type="hidden" name="productid" value="<?=$row['productid']; ?>">
                    <input type="submit" value="Add to Cart" class="btnAddAction" >
                </form>

                </div>
        
    </body>
</html>