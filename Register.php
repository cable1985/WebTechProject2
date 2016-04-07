<?php require 'connections.php'; ?>
<?php 
    
    if(isset($_POST['register'])) {
       
        session_start();
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $pw = $_POST['password'];
        
        $sql = $con->query("INSERT INTO user (Fname, Lname, Email, Password)Values('{$fname}', '{$lname}', '{$email}', '{$pw}')");
        
        header('Location: Login.php');
    }
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Notekeep</title>
    </head>
    
    <body>
        
            <ul class="cssmenu">
                <li><a href="#">Register</a></li>	
                <li><a href="Login.php">Login</a></li>	
            </ul>
                         
            <form action="" method="post" name="registerform" id="registerform">
                <div>
                    <input name="first_name" type="text" required="required" class="tfield" id="first_name" placeholder="First Name">
                </div>
                <div>
                    <input name="last_name" type="text" required="required" class="tfield" id="last_name" placeholder="Last Name">
                </div>
                <div>
                    <input name="email" type="email" required="required" class="tfield" id="email" placeholder="Email">
                </div>
                <div>
                    <input name="password" type="password" required="required" class="tfield" id="password" placeholder="Password">
                </div>
                <div>
                    <input name="register" type="submit" class="button" id="register" value="Register">
                </div>
            </form>
    </body>

</html>