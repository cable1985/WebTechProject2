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
        
        <p>You have logged out</p>

    </body>
</html>