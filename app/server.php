<?php
session_start();

// initializing variables
$fname = "";
$lname = "";
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'todo');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) { array_push($errors, "First Name is required"); }
  if (empty($lname)) { array_push($errors, "Last Name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (fname, lname, username, email, password) 
  			  VALUES('$fname', '$lname', '$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

//Log User Login Details.
function userlog(){

    $protocol = $_SERVER['SERVER_PROTOCOL'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $port = $_SERVER['REMOTE_PORT'];
        date_default_timezone_set("ASIA/Karachi");
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $url = $_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'];  
    $ref = $_SERVER['HTTP_REFERER'];
    $date=date ("D dS M, Y h:i:s A");
    $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

      function getBrowser()
      {
          $u_agent = $_SERVER['HTTP_USER_AGENT'];
          $bname = 'Unknown';
          $platform = 'Unknown';
          $version= "";

          //First get the platform?
          if (preg_match('/linux/i', $u_agent)) {
              $platform = 'linux';
          }
          elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
              $platform = 'mac';
          }
          elseif (preg_match('/windows|win32/i', $u_agent)) {
              $platform = 'windows';
          }
         
          // Next get the name of the useragent yes seperately and for good reason
          if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
          {
              $bname = 'Internet Explorer';
              $ub = "MSIE";
          }
          elseif(preg_match('/Firefox/i',$u_agent))
          {
              $bname = 'Mozilla Firefox';
              $ub = "Firefox";
          }
          elseif(preg_match('/Chrome/i',$u_agent))
          {
              $bname = 'Google Chrome';
              $ub = "Chrome";
          }
          elseif(preg_match('/Safari/i',$u_agent))
          {
              $bname = 'Apple Safari';
              $ub = "Safari";
          }
          elseif(preg_match('/Opera/i',$u_agent))
          {
              $bname = 'Opera';
              $ub = "Opera";
          }
          elseif(preg_match('/Netscape/i',$u_agent))
          {
              $bname = 'Netscape';
              $ub = "Netscape";
          }
         
          // finally get the correct version number
          $known = array('Version', $ub, 'other');
          $pattern = '#(?<browser>' . join('|', $known) .
          ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
          if (!preg_match_all($pattern, $u_agent, $matches)) {
              // we have no matching number just continue
          }
         
          // see how many we have
          $i = count($matches['browser']);
          if ($i != 1) {
              //we will have two since we are not using 'other' argument yet
              //see if version is before or after the name
              if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                  $version= $matches['version'][0];
              }
              else {
                  $version= $matches['version'][1];
              }
          }
          else {
              $version= $matches['version'][0];
          }
         
          // check if we have a number
          if ($version==null || $version=="") {$version="?";}
         
          return array(
              'userAgent' => $u_agent,
              'name'      => $bname,
              'version'   => $version,
              'platform'  => $platform,
              'pattern'    => $pattern
          );
      }
      // now try it
$ua=getBrowser();
$yourbrowser= "Browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'];

$query = "INSERT INTO logs (uid, ip, url, protocol, browser, logdate) 
          VALUES('$uid', '$ip', '$url', '$protocol', '$yourbrowser', '$date')";
      mysqli_query($db, $query);
}



// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' OR email='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }

}

//Admin Login

if (isset($_POST['login_admin'])) {
  $admin = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($admin)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM admin WHERE email='$admin' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['admin'] = $admin;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }

}

?>