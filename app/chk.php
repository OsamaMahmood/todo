
   <?php
        error_reporting(0);
        ini_set('display_errors', 0);
        include('server.php');
         if(isset($_GET['chk']))
        {
            $id = $_GET['chk'];
            $see = $db->query("SELECT chk FROM checklist where id='$id'");
            $row = $see->fetch_assoc();
            if($row['chk'] == 0){
            	$sql = "update checklist set chk='1' where id='$id'";
            	$res = mysqli_query($db, $sql);
            	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
                } else{
                    $sql = "update checklist set chk='0' where id='$id'";
                    $res = mysqli_query($db, $sql);
                    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
                }
        }
?>