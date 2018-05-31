<?php 
	include('functions.php');
	if(isset($_POST['rep']))
	{
 		$cid = mysqli_real_escape_string($db, $_POST["complainid"]);  
  	 	$reply = mysqli_real_escape_string($db, $_POST["replybody"]);  
  	 	$query = "INSERT INTO replies(cid, reply) VALUES('$cid', '$reply')";
		$result = mysqli_query($db, $query);
		if($result){
			echo "<script>alert('Reply Sent!')</script>";
		}
 }
?>