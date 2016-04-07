<?php require 'connections.php'; ?>
<?php 
   
    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $pw = $_POST['password'];

        $result = $con->query("select * from user where Email='$email' AND Password='$pw'");

        $row = $result->fetch_array(MYSQLI_BOTH);

        session_start();

        $_SESSION['UserID'] = $row['UserID'];

        //Where they are redirected after logging in
        header('Location: index.html');

    }
   
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Login</title>   
    </head>
    <body>
    
        <ul>
            <li><a href="Register.php">Register</a></li>	
        </ul>
        
            <form action="" method="post" name="form1" id="form1">
                <div>
                    <input name="email" type="email" required="required" id="email" placeholder="Email">
                </div>
                <div>
                    <input name="password" type="password" required="required" id="password" placeholder="Password">
                </div>
                <div>
                    <input name="login" type="submit" id="login" value="Login">
                </div>
            </form>
       
    </body>
</html>