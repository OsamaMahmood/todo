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
<!DOCTYPE HTML>
<html>
<head>
<title>Check List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../css/checklist.css">
<!-- Custom Theme files -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/font-awesome.css" rel="stylesheet"> 
<script src="../js/jquery.min.js"> </script>
<script src="../js/bootstrap.min.js"> </script>
  
<!-- Mainly scripts -->
<script src="../js/jquery.metisMenu.js"></script>
<script src="../js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="../css/custom.css" rel="stylesheet">
<script src="../js/custom.js"></script>
<script src="../js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>



</head>
<body>
	<?php include('loadprofile.php'); ?>
<div id="wrapper">
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="index.php">To-Do List</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			<form class=" navbar-left-right">
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search...">
              <input type="submit" value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
           </div>
		    <div class="drop-men" >
		        <ul class=" nav_1">
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?php echo $row['fname']; ?><i class="caret"></i></span><img src="../images/pr.png"></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="profile.php"><i class="fa fa-user"></i>Edit Profile</a></li>
		                <li><a href="inbox.php"><i class="fa fa-envelope"></i>Inbox</a></li>
		                <li><a href="calendar.php"><i class="fa fa-calendar"></i>Calender</a></li>
		                <li><a href="index.php?logout='1'"><i class="fa fa-user"></i>Logout</a></li>
		              </ul>
		            </li>
		           
		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>
	  
		     <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul id="myUL">
                <ul class="nav" id="side-menu">
				
                    <li>
                        <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                    </li>
                   
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Notes</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="notes.php" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>All Notes</a></li>
                            
                            <li><a href="nnotes.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>New Note</a></li>
					   </ul>
                    </li>
					         
                    <li>
                        <a href="inbox.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Inbox</span> </a>
                    </li>


                    <li>
                        <a href="contact.php" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Contact</span> </a>
                    </li>
                     <li>
                        <a href="calendar.php" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Calendar</span></a>
                    </li>
                   
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="profile.php" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i>Profile Setting</a></li>
                        </ul>
                    </li>
                </ul>
                </ul>
            </div>
			</div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Check List</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--faq-->
 	<div class="blank">
	

			 <?php include('additem.php'); ?>

    <h1>Things I've Gotta Get Done</h1><br />
            <ul id="list-items">
            <!-- Here's where out todo list items will go! -->
              <?php include('checklist.php'); ?>
            </ul>
            <form method="POST" class="add-items">
                <input type="text" name="item" autocomplete="off" class="form-control" id="todo-list-item" placeholder="What do you need to do today?">
                <center><button class="add" name="additem" type="submit">Add to List</button></center>
            </form>

		</div>
	<!--//faq-->
		<!---->
<div class="copy">
            <p> &copy; 2018 To-do-List | Design by <a href="http://todolist.com/" target="_blank">To-do-List</a> </p>	    </div>
		</div>
		<div class="clearfix"> </div>
       </div>
     
<!---->
<!--scrolling js-->
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

