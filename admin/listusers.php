<?php include('functions.php'); 
  $listusers = "SELECT * FROM users";
  $allusers = mysqli_query($db, $users);
  $totaluserslist = mysqli_num_rows($tusers);
  if ($totaluserslist > 0) {
      while ($row = mysqli_fetch_assoc($allusers)) {
        echo "<tr>
            <td>$row[id]</td>
            <td>$row[fname]</td>
            <td>$row[lname]</td>
            <td>$row[username]</td>
            <td>$row[email]</td>
            <td><a href='listusers.php?deluser=$row[id]'>Delete</a></td>
          </tr>"; 
      }
    }
     if(isset($_GET['deluser']))
        {
          $id = $_GET['deluser'];
          $sql = "DELETE FROM users WHERE id='$id'";
          $res = mysqli_query($db, $sql);
          echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        }

?>