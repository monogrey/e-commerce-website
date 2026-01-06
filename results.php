<?php
    include('session.php');
    require('header.php');
?>

<html>
<head>
  <title>LBP Funko POP! Shop Search Results</title>
</head>
<body>
<?php
  // create short variable names
  $category=$_POST['category'];
  $searchterm=trim($_POST['searchterm']);

  if (!$category || !$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $category = addslashes($category);
    $searchterm = addslashes($searchterm);
  }

  @ $db = new mysqli('localhost', 'deleong5_bookorama', 'bookorama123', 'deleong5_bookorama');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  
  $query = "select * from product where product.catid = ".$category." and product.productname like '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;
  
  $query2 = "select category.categoryname from category where ".$category." = category.categoryid";
  $result2 = $db->query($query2);
  
  $row2 = $result2->fetch_assoc();

  echo "<p>Number of products found: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     ?>
     
     <div>
        <strong> <?php echo ($i+1)."."; ?> Product name: <br /></strong>
        <a href="productpage.php?id=<?php echo $row['productid']; ?>">
            <?php echo htmlspecialchars(stripslashes($row['productname'])); ?>
        </a>
        
     </div>
     <div>
        <strong>Price: </strong><br />
        <?php echo stripslashes($row['unitprice']); ?>
     </div>
     <div>
         <strong>Description: <br/></strong>
         <?php echo stripslashes($row['description']); ?>
     </div>
     <div>
         <strong>Category: <br/></strong>
         <?php echo stripslashes($row2['categoryname']); ?>
     </div>
     <div align="left">
         <p>- - -</p>
     </div>
     
<?php
  }

  $result->free();
  $db->close();

?>
</body>
</html>
