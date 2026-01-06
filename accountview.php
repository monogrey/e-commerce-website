<?php
    include('session.php');
    include('config.php');
    require('header.php');
    
    $user = $_SESSION['login_user'];
    
    $query = "select * from customer_info where customer_info.userid = '{$_SESSION['login_user']}'";
    $result = $db->query($query);
    
    $row = $result->fetch_assoc();
?>

<html>
    <head>
        <title>Account Details</title>
    </head>
    <body>
        <h1>User Account Details</h1>
        <p>
            <strong>First Name:<br /></strong>
            <?php
                echo "<p>".$row['fname']."</p>";
            ?>
        </p>
        <p>- - -</p>
        <p>
            <strong>Last Name:<br /></strong>
            <?php
                echo "<p>".$row['lname']."</p>";
            ?>
        </p>
        <p>- - -</p>
        <p>
            <strong>Email:<br /></strong>
            <?php
                echo "<p>".$row['email']."</p>";
            ?>
        </p>
        <p>- - -</p>
        <p>
            <strong>Phone Number:<br /></strong>
            <?php
                echo "<p>".$row['phonenumber']."</p>";
            ?>
        </p>
        <p>
            <strong>Address:<br /></strong>
            <?php
                echo "<p>".$row['street']."</p>";
                echo "<p>".$row['city']."</p>";
                echo "<p>".$row['state']."</p>";
                echo "<p>".$row['zipcode']."</p>";
            ?>
        </p>
        <p>
            <a href="orderhistory.php">View Order History</a>
        </p>
    </body>
</html>