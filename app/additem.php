 <?php

 //Add Checklist items

        error_reporting(0);
        ini_set('display_errors', 0);
        include('server.php');
        $user = $_SESSION['username'];
        $query = $db->query("SELECT id FROM users WHERE username='$user' or email='$user'");
        $row = $query->fetch_assoc();
        $uid = $row['id'];
        if(isset($_POST['additem'])){
          $item = mysqli_real_escape_string($db, $_POST['item']);
          if(empty($item)){

          }else {
          $query = "INSERT INTO checklist (uid, listitem) 
          VALUES('$uid', '$item')";
          mysqli_query($db, $query);
            }
          }

// Add Notes

          if(isset($_POST['nnote'])){
          $nheading = mysqli_real_escape_string($db, $_POST['nheading']);
          $ndesc = mysqli_real_escape_string($db, $_POST['ndesc']);
          if (empty($nheading)) { array_push($errors, "Note heading is required"); }
          if (empty($nheading)) { array_push($errors, "Note description is required"); }
          $query = "INSERT INTO notes (uid, nheading, ndesc) 
          VALUES('$uid', '$nheading', '$ndesc')";
          $result = mysqli_query($db, $query);
          if($result){
          echo "<center>";
          echo "Note Added Successfully";
          echo "</center>";
           } else{
          echo "<center>";
          echo "Some Error Occured.";
          echo "</center>";
        }

            }

    ?>