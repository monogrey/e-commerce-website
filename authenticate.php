<html>
    <head>
        <title>Login Status</title>
    </head>
    <body>
        
    <?php
    @ $db = new mysqli('localhost','deleong5_bookorama','bookorama123','deleong5_bookorama');
            
    if(mysqli_connect_errno()){
        echo "Error: Could not connect to database. Please try again later.";
    }
      
    $username = $_POST['username'];
    $userpass = $_POST['upassword'];
    
    $username = stripslashes($username);
    $userpass = stripslashes($userpass);
    $username = $db->real_escape_string($username);
    $userpass = $db->real_escape_string($userpass);
    
    $query = "select * from login where username = '".$username."' and upassword = '".md5($userpass)."'";
    
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    
    if($result->num_rows == 1){
        echo "Login successful";
    } else{
        echo "Login failed";
    }
            
    $result->free();
    $db->close();
    ?>
    </body>
</html>
