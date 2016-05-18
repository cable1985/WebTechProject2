<!-- connections.php connects to the database -->
<?php require 'connections.php'; ?>

<!-- check to make sure the user is logged in,
     if not then redirect them to login.php -->
<?php session_start();
if(isset($_SESSION["UserID"])){ 
} else {
    header('Location: Login.php');
}?>

<!-- when you click 'save' upload the new note 
     to the database and refresh the page -->
<?php  if(isset($_POST['save'])) {
       
        session_start();
        $note = $_POST['note'];
        $UserID = ($_SESSION["UserID"]);
        
        $sql = $con->query("INSERT INTO notes (UserID, note)Values('{$UserID}','{$note}')");
        
        header('Location: Account.php');
    }?>

<!-- $result is a query containing all the notes
     of the current user -->
<?php $UserID = $_SESSION["UserID"];
      $result = mysqli_query($con, "SELECT * FROM notes WHERE UserID = '$UserID'"); 
?>
    
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>My Account</title>
        <link rel="stylesheet" type="text/css">
    </head>
    
    <body>
         
        <h2>Welcome </h2>
        
        <form action="" method="post" name="notesubmit" id="notesubmit">
            
                <div>
                    <textarea name="note" cols="50" rows="4" form="notesubmit" id="note">New Note
                    </textarea>   
                </div>
                
                    <input name="save"  type="submit" class="button" id="save" value="Save">
            
        </form>
            <!-- Whenever a note is saved, print out the
                 note with timestamp followed by the edit
                 and delete buttons for each note -->
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <?php $note = $row['note'];?>
                <?php $date = $row['time'];?>

        <div><p class="note">Note: <?php echo $date; ?></br> <?php echo $note; ?></p></div>
                
                <input name="edit"  type="submit" class="button" id="edit" value="Edit">
                <input name="delete"  type="submit" class="button" id="delete" value="Delete">
        
            <?php endwhile; ?>
        
        
        <div>    
            <a href="Logout.php">Logout</a>
        </div>
        
    </body>
</html>