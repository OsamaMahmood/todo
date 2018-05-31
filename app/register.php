<?php include('server.php') ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/font-awesome.css" rel="stylesheet"> 
<script src="../js/jquery.min.js"> </script>
<script src="../js/bootstrap.min.js"> </script>
</head>
<body>
	<div class="login">
		<h1><a href="../index.html">To-do List </a></h1>
		<div class="login-bottom">
			<h2>Register</h2>
			<form method="post">
  			<?php include('errors.php'); ?>
			<div class="col-md-6">
				<div class="login-mail">
      				<input type="text" name="fname" placeholder="First Name" autocomplete="off" value="<?php echo $fname; ?>">
					<i class="fa fa-user"></i>
				</div>

				<div class="login-mail">
					<input type="text" name="lname" placeholder="Last Name" autocomplete="off" value="<?php echo $lname; ?>">
					<i class="fa fa-user"></i>
				</div>

				<div class="login-mail">
					<input type="text" name="username" placeholder="username" autocomplete="off" value="<?php echo $username; ?>">
					<i class="fa fa-envelope"></i>
				</div>

				<div class="login-mail">
					<input type="email" name="email" placeholder="Email" autocomplete="off" value="<?php echo $email; ?>">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" autocomplete="off" name="password_1">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Confirm Password" autocomplete="off" name="password_2">
					<i class="fa fa-lock"></i>
				</div>
				  <a class="news-letter" href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>I agree with the terms</label>
					   </a>
	
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="reg_user" value="Submit">
					</label>

			</form>
					<p>Already register</p>
				<a href="login.php" class="hvr-shutter-in-horizontal">Login</a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
		<!---->
<div class="copy-right">
            <p> &copy; 2018 To-do-List | Design by <a href="http://todolist.com/" target="_blank">To-do-List</a> </p>	 	    </div>
	  
<!---->
<!--scrolling js-->
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

