<!-- connections.php connects to the database -->
<?php require 'connections.php'; ?>

<!-- check to make sure the user is logged in,
     if not then redirect them to login.php -->
<?php session_start();
if(isset($_SESSION["UserID"])){ 
} else {
    header('Location: Login.php');
}?>

<?php  if(isset($_POST['deactivate'])) {
       
        session_start();
        $UserID = ($_SESSION["UserID"]); 
        
        $sql = $con->query("DELETE FROM notes WHERE UserID = '$UserID'");
        $sql = $con->query("DELETE FROM user WHERE UserID = '$UserID'");                
    
        unset($_SESSION["UserID"]);
        session_destroy();
        
        header('Location:  index.html');  }
    
    else if ($_POST['back']) {
        
        header('Location: Account.php');
}?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Deactivate</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    
    <body>
    
        <h3 class="title">Deactivate your account?</h3>
        
    <form action="" method="post" name="deactivatesubmit" id="deactivatesubmit">
        <input name="deactivate"  type="submit" class="button" id="deactivate" value="Yes, remove my account forever"> 
        <input name="back"  type="submit" class="button" id="back" value="No! Take me back!"> 
    </form>
        
        <p class="link">This will remove your credintials and notes from the system</p>
           
        
    </body>


</html>