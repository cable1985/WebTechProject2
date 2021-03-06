<!-- connections.php connects to the database -->
<?php require 'connections.php'; ?>

<!-- check to make sure the user is logged in,
     if not then redirect them to login.php -->
<?php session_start();
if(isset($_SESSION["UserID"])){ 
} else {
    header('Location: Login.php');
    die();
}?>

<!-- $result is a query containing all the notes
     of the current user -->
<?php $UserID = $_SESSION["UserID"];
      $result = mysqli_query($con, "SELECT * FROM notes WHERE UserID = '$UserID'");    
?>

<!-- when you click 'save' upload the new note 
     to the database and refresh the page.
     when you click 'delete' remote the note
     that goes with that button from the database -->
<?php  if(isset($_POST['save'])) {
       
        session_start();
        $note = $_POST['note'];
        $UserID = ($_SESSION["UserID"]);
        
        $sql = $con->query("INSERT INTO notes (UserID, note)Values('{$UserID}','{$note}')");
        
        header('Location: Account.php');
    
    }?> 
<?php if (isset($_POST['delete'])){

        $deleteID = $_POST['delete'];
    
        $sql = $con->query("DELETE FROM notes WHERE noteID = '$deleteID'");
        
        header('Location: Account.php');
    
    } else if (isset($_POST['edit'])){
    
}?>
    
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>My Account</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    
    <body>
         
        <h1 class="titleAct">Welcome</h1> 
        
        <form action="" method="post" name="notesubmit" id="notesubmit">
            
                <div>
                    <textarea name="note" cols="50" rows="4" form="notesubmit" id="noteinput">New Note
                    </textarea>   
                </div>
                
                    <input name="save"  type="submit" class="button" id="save" value="Save">  
    
            <!-- Whenever a note is saved, print out the
                 note with timestamp followed by the edit
                 and delete buttons for each note -->
    
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <?php $note = $row['note'];?>
                <?php $date = $row['time'];?>
                <?php $noteID = $row['noteID'];?>

        <div id="note">
            <p class="note"><?php echo date('F/j/Y  h:i A', strtotime($row['time']) ); ?></br> ---------------- </br><?php echo $note; ?> </p>
        </div>

    <!-- Edit Function
    <form method="get" action="AccountUpdate.php" id="notesubmit">
                <input name="edit"  type="hidden" class="button" value="<?php echo $note; ?>">
                <input type="submit">
    </form> -->

                <input name="delete"  type="submit" class="button" value="<?php echo $noteID; ?>">
        
            <?php endwhile; ?>
        </form>
        
        <div>
            <a class="link" href="Logout.php">Logout</a>
            <div>
            <a class="link" href="Deactivate.php">Deactivate My Account</a>
            </div>
        </div>
        
    </body>
</html>