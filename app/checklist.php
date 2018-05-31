<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    include('server.php');
    $query = "SELECT * FROM checklist WHERE uid='$uid'";
    $result = mysqli_query($db, $query);
    $resultcheck = mysqli_num_rows($result);
    if ($resultcheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['chk'] == 1){
        echo "<a href='chk.php?chk=$row[id]'><li><input class='checkbox' type='checkbox' checked/><del>" . $row['listitem'] . "</del></a><a href='deleteitem.php?del=$row[id]' class='remove'>x</a><hr></li>";
          }else{
            echo "<a href='chk.php?chk=$row[id]'><li><input class='checkbox' type='checkbox'/>" . $row['listitem'] . "</a><a href='deleteitem.php?del=$row[id]' class='remove'>x</a><hr></li>";
          }
      }
    }


?>