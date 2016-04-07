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

<!------------------------------------------------------------------>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Notekeep</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    
    <body>
        
            <div class="container">
              
                <p class="link">Register</p>
                         
            <form action="" method="post" name="registerform" id="registerform">
                <div>
                    <input name="first_name" class="link" type="text" required="required" class="tfield" id="first_name" placeholder="First Name">
                </div>
                <div>
                    <input name="last_name" class="link" type="text" required="required" class="tfield" id="last_name" placeholder="Last Name">
                </div>
                <div>
                    <input name="email" class="link" type="email" required="required" class="tfield" id="email" placeholder="Email">
                </div>
                <div>
                    <input name="password" class="link" type="password" required="required" class="tfield" id="password" placeholder="Password">
                </div>
                <div>
                    <input name="register" class="link" type="submit" class="button" id="register" value="Register">
                </div>
            </form>
        
             <a class="link" href="Login.php">Login</a>	
                
          </div>
    </body>

</html>