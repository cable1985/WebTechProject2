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
              
                <h1 class="title">Register</h1>
                         
            <form action="" method="post" name="registerform" id="registerform">
                <div>
                    <input name="first_name" type="text" required="required"  id="first_name" placeholder="First Name">
                </div>
                <div>
                    <input name="last_name" type="text" required="required"  id="last_name" placeholder="Last Name">
                </div>
                <div>
                    <input name="email" type="email" required="required"  id="email" placeholder="Email">
                </div>
                <div>
                    <input name="password" type="password" required="required"  id="password" placeholder="Password">
                </div>
                <div>
                 <!--   <input name="password2" type="password" required="required"  id="password2" placeholder="Re-Enter Password"> -->
                </div>
            <div>
                    <input name="register" type="submit" class="button" id="register" value="Register">
                </div> 
            </form>
        
             <a class="link" href="Login.php">Login</a>	
                
          </div>
    </body>

</html>