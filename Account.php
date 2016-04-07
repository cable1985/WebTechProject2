<!-- This page will be used in the future for when 
     you are logged in. It is where most of our site
     will take place. Wheres users notes are saved, created,
     and edited -->

<?php require 'connections.php'; ?>
<?php
session_start();
if(isset($_SESSION["UserID"])){
} else {
    header('Location: Login.php')
}
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>My Account</title>
        <link rel="stylesheet" type="text/css">
    </head>
    
    <body>
            
    
    </body>



</html>