<?php
    include('session.php');
    require('header.php');
?>

<html>
    <head>
        <title>LBP Funko POP! Shop Products</title>
    </head>
    <body>
    <?php
    include("config.php");
    
    $query = "select * from product_category";
    $result = $db->query($query);
    
    $num_results = $result->num_rows;
    for($i = 0; $i < $num_results; $i++){
        $row = $result->fetch_assoc();
        ?>
        <div class="product-item">
                
                <div class="product-name">
                    <strong>Product Name: <br /></strong>
                        <a href="productpage.php?id=<?php echo $row['productid']; ?>">
                            <?php
                                echo $row['productname'];
                            ?>
                        </a>
                        
                    
                </div>
                <div class="product-price">
                    <strong>Price: <br /></strong>
                    <?php
                    echo "$".$row['unitprice'];
                    ?>
                </div>
                <div class="product-category">
                    <strong>Category: <br /></strong>
                    <?php
                        echo $row['categoryname'];
                    ?>
                </div>
                <div>
                    <p align="left">- - -</p>
                </div>
        
            
        </div>
        <?php
            }
        $result->free();
        $db->close();
        ?>
        
    </body>
    
</html>
