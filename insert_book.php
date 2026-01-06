<html>
<head>
  <title>LBP Funko POP! Shop Product Entry Results</title>
</head>
<body>
<h1>LBP Funko POP! Shop Product Entry Results</h1>
<p><a href="newbook.php">Back to Add Product</a></p>
<?php
  // create short variable names
  $productid=$_POST['productid'];
  $productname=$_POST['productname'];
  $unitprice=$_POST['unitprice'];
  $description=$_POST['description'];
  $category=$_POST['category'];

  if (!$productid || !$productname || !$unitprice || !$description || !$category) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
    $productid = addslashes($productid);
    $productname = addslashes($productname);
    $unitprice = doubleval($unitprice);
    $description = addslashes($description);
    $category=addslashes($category);
  }

  @ $db = new mysqli('localhost', 'deleong5_bookorama', 'bookorama123', 'deleong5_bookorama');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
  
  $query = "insert into product values
            ('".$productid."', '".$productname."', '".$unitprice."', '".$description."', '".$category."')";
  $result = $db->query($query);
  
  $inv = "insert into inventory (itemid) values ('".$productid."')";
  $db->query($inv);

  if ($result) {
      echo  $db->affected_rows." product inserted into database.";
  } else {
  	  echo "An error has occurred.  The item was not added.";
  }

  $db->close();
?>
</body>
</html>
