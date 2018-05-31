<?php
    error_reporting(0);
    ini_set('display_errors', 0);
	include('../app/server.php');

	// Number Of Users
	$users = "SELECT * FROM users";
	$tusers = mysqli_query($db, $users);
	$totalusers = mysqli_num_rows($tusers);

	// Number of CheckList
	$checklist = "SELECT * FROM checklist";
	$tchecklist = mysqli_query($db, $checklist);
	$totalchecklist = mysqli_num_rows($tchecklist);

	// Number of Notes
	$notes = "SELECT * FROM notes";
	$tnotes = mysqli_query($db, $notes);
	$totalnotes = mysqli_num_rows($tnotes);

	//Number of Complains

	$complains = "SELECT * FROM complains";
 	$allcomplains = mysqli_query($db, $complains);
  	$totalcomplainslist = mysqli_num_rows($allcomplains);

	// Admin Details
	$admin = "SELECT * FROM admin";
	$admindetails = mysqli_query($db, $admin);
	$admininfo = mysqli_fetch_assoc($admindetails);

	// Update Admin Password
	if(isset($_POST['updatepass'])){
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $apassword = md5($password);
    $passupdate = "update admin set password='$apassword' where aid=1";
    if (empty($apassword)) {
    	
    }
    else{
    if ($db->query($passupdate) === TRUE) {
    	  echo "<center>";
          echo "Account Updated Successfully";
          echo "</center>";
	} else {
          echo "<center>";
          echo "Some Error Occured." . $db->error;
          echo "</center>";
	}
         }
       
    }
?>