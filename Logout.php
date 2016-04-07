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
        
        <p>You have been logged out</p>
        <a href="Login.php"><button>Login</button></a>
        <a href="Register.php"><button>Register</button></a>

    </body>
</html>