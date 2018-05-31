
   <?php
        error_reporting(0);
        ini_set('display_errors', 0);
        include('server.php');
        if(isset($_GET['del']))
        {
        	$id = $_GET['del'];
        	$sql = "DELETE FROM checklist WHERE id='$id'";
        	$res = mysqli_query($db, $sql);
        	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        }

         if(isset($_GET['deln']))
        {
        	$id = $_GET['deln'];
        	$sql = "DELETE FROM notes WHERE id='$id'";
        	$res = mysqli_query($db, $sql);
        	echo "<meta http-equiv='refresh' content='0;url=notes.php'>";
        }
?>