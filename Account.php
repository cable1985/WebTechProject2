
<?php require 'connections.php'; ?>
<?php
session_start();
if(isset($_SESSION["UserID"])){ 
}

else {
    header('Location: Login.php');
}?>
<?php 
    
    if(isset($_POST['save'])) {
       
        session_start();
        $note = $_POST['note'];
        $UserID = ($_SESSION["UserID"]);
        
        $sql = $con->query("INSERT INTO notes (UserID, note)Values('{$UserID}','{$note}')");
        
        header('Location: Account.php');
    }
?>
<?php 
    $result = mysqli_query($con, "SELECT * FROM notes WHERE UserID = '5'");
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>My Account</title>
        <link rel="stylesheet" type="text/css">
    </head>
    
    <body>
         
        <h2>Welcome</h2>
        
        <form action="" method="post" name="notesubmit" id="notesubmit">
                <div>
                    <input name="note" class="note" type="text" required="required"  id="note" placeholder="Type A New Note">
                </div>
                <div>
                    <input name="save"  type="submit" class="button" id="save" value="Save">
                </div>
        </form>
        
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <?php $note = $row['note']; ?>

        <div><p class="note"><?php echo $note; ?></p></div>
        
            <?php endwhile; ?>
        
        
        <div>    
            <a href="Logout.php">Logout</a>
        </div>
        
    </body>
</html>