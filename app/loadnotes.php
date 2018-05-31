<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    include('server.php');
    $user = $_SESSION['username'];
    $query = $db->query("SELECT id FROM users WHERE username='$user' or email='$user'");
    $row = $query->fetch_assoc();
    $uid = $row['id'];
     // load Notes

    $query = "SELECT * FROM notes WHERE uid='$uid'";
    $result = mysqli_query($db, $query);
    $resultcheck = mysqli_num_rows($result);
    if ($resultcheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {

        function word_teaser($string, $count){
            $original_string = $string;
              $words = explode(' ', $original_string);
             
              if (count($words) > $count){
               $words = array_slice($words, 0, $count);
               $string = implode(' ', $words);
              }
             
              return $string;
            }
            $desc = word_teaser($row['ndesc'], 15);

        echo "<tr class='table-row'>
                            <td class='table-img'>
                            </td>
                            <td class='table-text'>
                              <h6>$row[nheading]</h6><br />
                                <h5>$desc  Read More...</h5><hr>
                            </td>
                            <td>
                               <td> <button type='button' name='reply' id='reply' data-toggle='modal' data-target='#note$row[id]' class='btn btn-warning'>View</button>
                               <button type='button' class='btn btn-danger'><a id='del' href='deleteitem.php?del=$row[id]'>Delete</a></button>
                               </td>     
                            </td>
                        </tr>

                        <div id='note$row[id]' class='modal fade'>
                             <div class='modal-dialog'>
                              <div class='modal-content'>
                               <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title'>Note : $row[nheading]</h4>
                               </div>
                               <div class='modal-body'>
                                <form>
                                 <p>$row[ndesc]</p>
                                 <br />

                                </form>
                               </div>
                               <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                               </div>
                              </div>
                             </div>
                        </div>";
          
      }
    }

