<?php
    @ $db = new mysqli('localhost','deleong5_bookorama','bookorama123','deleong5_bookorama');
    
    if(mysqli_connect_errno()){
        echo "Error: could not connect to database. Please try again later.";
    }
?>