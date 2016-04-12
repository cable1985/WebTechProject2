<?php require 'connections.php'; ?>
<?php 
    session_start();
    unset($_SESSION["UserID"]);
    session_destroy(); 
?>
<?php 
   
    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $pw = $_POST['password'];

        $result = $con->query("select * from user where Email='$email' AND Password='$pw'");

        $row = $result->fetch_array(MYSQLI_BOTH);

        session_start();

        $_SESSION['UserID'] = $row['UserID'];

        //Where they are redirected after logging in
        header('Location: Account.php');

    }
   
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Login</title> 
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        
        
        <h1 class="title">Login</h1>
        
            <p class="outlink">Your have been logged out</p>
        
            <form action="" method="post" name="loginform" id="loginform">
                <div>
                    <input name="email" type="email" required="required" class="rInput" id="email" placeholder="Email">
                </div>
                <div>
                    <input name="password" type="password" required="required" class="rInput" id="password" placeholder="Password">
                </div>
                <div>
                    <input name="login" type="submit" id="login" class="button" value="Login">
                </div>
            </form>
        
        <a class="link" href="Register.php">Register</a>
       
    </body>
</html>