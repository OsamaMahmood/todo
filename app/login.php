<?php include('../app/server.php'); ?>
<?php 
	error_reporting(0);
    ini_set('display_errors', 0);
  	session_start(); 
  	if (isset($_SESSION['username'])) {
  		header('location: index.php');
  	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sign In</title>
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
		<h1><a href="#">User Panel</a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
			<form method="post" action="login.php">
				<?php include('../app/errors.php'); ?>
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" placeholder="Email" name="username" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" name="password" required="">
					<i class="fa fa-lock"></i>
				</div>
				   <a class="news-letter " href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Forget Password</label>
					   </a>

			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="login_user" value="login">
					</label>
			</div>
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->
<div class="copy-right">
            <p> &copy; 2018 To-do-List | Design by <a href="http://todolist.com/" target="_blank">To-do-List</a> </p>	    </div>  
<!---->
<!--scrolling js-->
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

