<?php
    include('session.php');
    require('logoutbutton.php');
    include('config.php');
    
    
    if(isset($_POST['submit'])){
        $quan = $_POST['quantity'];
        $pid = $_POST['productid'];
            
        $update = "update inventory set instock = instock + ".$quan." where inventory.itemid = ".$pid."";
            
        $db->query($update);
    }
    
    $query = "select * from inventory, product where inventory.itemid = product.productid";
    $result = $db->query($query);
?>

<html>
    <head>
        <title>LBP Funko POP! Shop - Inventory</title>
    </head>
    <body>
        <h1>LBP Funko POP! Shop - Inventory</h1>
        
        <p>
            <a href="vieworders2.php">View Orders</a>
        </p>
        <p>
            <a href="newbook.php">Add Product</a>
        </p>
        
        <?php
            
            echo "<table border=\"1\">\n";
            echo "<tr><th bgcolor=\"#CCCCFF\">Product ID</th>
                  <th bgcolor=\"#CCCCFF\">Product Name</th>
                  <th bgcolor=\"#CCCCFF\">In Stock</th>
                  <th bgcolor=\"#CCCCFF\">Add Stock</th>
            <tr>";
            
            $count = $result->num_rows;
            for($i = 0; $i < $count; $i++){
                $row = $result->fetch_assoc();
                
                echo "<tr>
                    <td align=\"right\">".$row['itemid']."</td>
                    <td align=\"left\">".$row['productname']."</td>
                    <td>".$row['instock']."</td>
                    <form action=\"inventory.php\" method=\"post\">
                    <td><input type=\"text\" name=\"quantity\" value=\"0\" size=\"2\">
                        <input type=\"hidden\" name=\"productid\" value=\" {$row['itemid']}\">
                        <input type=\"submit\" name=\"submit\" value=\"Add\"></td>
                    </form>
                        </tr>";
            }
            
            
        ?>
        
        <?php
            $result->free();
            $result2->free();
            $db->close();
        ?>
    </body>
</html>