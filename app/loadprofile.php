  <?php 
        error_reporting(0);
        ini_set('display_errors', 0);
        include('server.php');
       // $uid = $_SESSION['uid'];
       $user = $_SESSION['username'];
       $query = $db->query("SELECT * FROM users WHERE username='$user' OR email='$user'");
       $row = $query->fetch_assoc();
       $id = $row['id'];
        if(isset($_POST['update'])){
          $fname = mysqli_real_escape_string($db, $_POST['fname']);
          $lname = mysqli_real_escape_string($db, $_POST['lname']);
          $email = mysqli_real_escape_string($db, $_POST['email']);
          $password = mysqli_real_escape_string($db, $_POST['password']);
          $passowrd = md5($password);
          if (empty($password)){
          $result = $db->query("update users set fname='$fname', lname='$lname', email='$email', username='$user' where id='$id'");
        } else{
          $result = $db->query("update users set password='$passowrd' where id='$id'");
        }
        if($result){
          echo "<script>alert('Account Updated Successfully')</script>";
        } else{
          echo "<script>alert('Some Error Occured.')</script>";
        }

        }
     ?>