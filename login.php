<?php
    @ $db = new mysqli('localhost','deleong5_bookorama','bookorama123','deleong5_bookorama');
            
        if(mysqli_connect_errno()){
            echo "Error: Could not connect to database. Please try again later.";
        }
    
    session_start();
    
    $error = '';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // username and password sent from form
        $username = $db->real_escape_string($_POST['username']);
        $password = $db->real_escape_string($_POST['password']);
        
        $query = "select * from login where username = '".$username."' and upassword = '".md5($password)."'";
        
        $result = $db->query($query);
        $row = $result->num_rows;
        $count = $result->num_rows;
        
        if($count == 1){
            $_SESSION['login_user'] = $username;
            if($username == "webadmin"){
                header("location: inventory.php");
            } else{
                header("location: home.php");
            }
            
        } else{
            $error = "Your Login Name or Password is Invalid";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <?php if(isset($error)): ?>
            <div><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form action="" method="post">
            <div>
                <label>Username:</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </body>
</html>