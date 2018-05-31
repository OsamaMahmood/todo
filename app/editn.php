<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Notes</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/profile.css">
    </head>
    <body>
      <div class="topnav" id="myTopnav">
         <a href="/todo" class="active">Home</a>
         <a href="index.php">Checklist</a>
         <a href="notes.php">Notes</a>
         <a href="nnotes.php">New Note</a>
         <a href="index.php?logout='1'" style="float:right">Logout</a> 
         <a href="profile.php" style="float:right">Profile</a>
      </div>

        <div class="container">

    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
      <?php 
        error_reporting(0);
        ini_set('display_errors', 0);
        include('server.php');
        $user = $_SESSION['username'];
        if(isset($_GET['editn']))
        {
          $nid = $_GET['editn'];
          $query = $db->query("SELECT * FROM notes WHERE id='$nid'");
          $row = $query->fetch_assoc();

        }
        if(isset($_POST['nupdate'])){
          $nheading = mysqli_real_escape_string($db, $_POST['nheading']);
          $ndesc = mysqli_real_escape_string($db, $_POST['ndesc']);
          $result = $db->query("update notes set nheading='$nheading', ndesc='$ndesc' where id='$nid'");
        if($result){
          echo "<center>";
          echo "Note Updated Successfully";
          echo "<meta http-equiv='refresh' content='2;url=notes.php'>";
          echo "</center>";
        } else{
          echo "<center>";
          echo "Some Error Occured.";
          echo "</center>";
        }

        }

       ?>
            <center>
              <h1>Create Note</h1>
              <form method="POST" class="fields">
                <?php include('errors.php'); ?>
              <div>
                Note Heading:<br> <input type="text" autocomplete="off" name="nheading" value="<?php echo $row['nheading']; ?>"><br><br>
                Discription: <br><textarea rows="15" cols="50" name="ndesc" ><?php echo $row['ndesc']; ?></textarea><br><br>
                <button class="button" name="nupdate" type="submit">Update</button>
              </div>
            </form>
          </center>
        </div>
    </body>
</html>
      