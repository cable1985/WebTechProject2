<?php require 'connections.php'; ?>



<?php 
session_start();
unset($_SESSION["UserID"]);
session_destroy(); 
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Logout</title>
    </head>
    
    <body>
        
        <ul>

            <li><a href="#">Register</a></li>	

            <li><a href="Login.php">Login</a></li>	

        </ul>

    </body>
</html>