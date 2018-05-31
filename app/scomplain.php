<?php
		error_reporting(0);
        ini_set('display_errors', 0);
        include('server.php');
        $user = $_SESSION['username'];
        $query = $db->query("SELECT id FROM users WHERE username='$user' or email='$user'");
        $row = $query->fetch_assoc();
        $uid = $row['id'];
        if(isset($_POST['scomplain'])){
          $complain = mysqli_real_escape_string($db, $_POST['problem']);
          if(empty($complain)){

          }else {
          $query = "INSERT INTO complains (uid, complain) VALUES('$uid', '$complain')";
          $result =   mysqli_query($db, $query);
          if($result){
          echo "<script>";
          echo "alert('Complain sent Successfully')";
          echo "</script>";
           } else{
          echo "<script>";
          echo "alert('Some Error Occured.')";
          echo "</script>";
        }
            }
        }


        $complains = "SELECT * FROM complains WHERE uid='$uid'";
        $allcomplains = mysqli_query($db, $complains);
        $totalcomplainslist = mysqli_num_rows($allcomplains);

?>