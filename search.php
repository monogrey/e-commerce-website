<?php
    include('session.php');
    require('header.php');
    
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
        <title>LBP Funko POP! Shop Catalog Search</title>
    </head>
    
    <body>
        <form action="results.php" method="post">
            Choose search type:<br />
            <select name="category">
                <?php
                    while($category = $result->fetch_array(MYSQLI_ASSOC)):;
                ?>
                
                <option value="<?php echo $category['categoryid']?>">
                    <?php echo $category['categoryname'];
                    ?>
                </option>
                <?php
                    endwhile;
                    
                ?>
            </select>
            <br />
            Enter search term:<br />
            <input name="searchterm" type="text" size="40">
            <br />
            <input type="submit" value="Submit" name="submit">
        </form>
        <br>
    </body>
</html>