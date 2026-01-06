<?php
    include('session.php');
    require('logoutbutton.php');
    @ $db = new mysqli('localhost', 'deleong5_bookorama', 'bookorama123', 'deleong5_bookorama');
    
    if(mysqli_connect_errno()){
        echo 'Error: could not connect to database. Please try again later.';
        exit;
    }
    
    $query = "select * from category";
    $result = $db->query($query);
?>

<html>
    <head>
        <title>LBP Funko POP! Shop - New Product Entry</title>
    </head>
    <body>
        <h1>LBP Funko POP! Shop - New Product Entry</h1>
        <p><a href="inventory.php">Back to Inventory</a></p>
        <form action="insert_book.php" method="post">
            <table border="0">
                <tr>
                    <td>Product ID</td>
                    <td> <input type="text" name="productid" maxlength="13" size="13"></td>
                </tr>
                <tr>
                    <td>Product Name</td>
                    <td> <input type="text" name="productname" maxlength="50" size="50"></td>
                </tr>
                <tr>
                    <td>Unit Price $</td>
                    <td><input type="text" name="unitprice" maxlength="7" size="7"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td> <input type="text" name="description" maxlength="80" size="80"></td>
                </tr>
                <tr>
                    Category: <br />
                    <select name="category">
                            <?php
                                while($category = $result->fetch_array(MYSQLI_ASSOC)):;
                            ?>
                            
                            <option value="<?php echo $category['categoryid']?>">
                                <?php echo $category['categoryname'];?>
                            </option>
                            <?php
                                endwhile;
                                ?>
                    </select>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Register"></td>
                </tr>
            </table>
            
        </form>
    </body>
</html>