<?php include('functions.php'); 
  $complains = "SELECT * FROM complains";
  $allcomplains = mysqli_query($db, $complains);
  $totalcomplainslist = mysqli_num_rows($allcomplains);
  if ($totalcomplainslist > 0) {
      while ($row = mysqli_fetch_assoc($allcomplains)) {
        $uid = $row['uid'];
        $useremail = "SELECT * FROM users where id='$uid'";
        $email = mysqli_query($db, $useremail);
        $usermail = mysqli_fetch_assoc($email);
        echo "
        <tr class='table-row'>
                            <td class='table-img'>
                             $row[cid]
                            </td>
                            <td class='table-text'>
                              <h6>$usermail[email]</h6>
                              <hr>
                                <h5>$row[complain]</h5>
                            </td>
                            <td>
                              <span class='ur'>Urgent</span>
                            </td>
                            <td class='march'>
                                
                              </td>
                          
                             <td >
                               <i class='fa fa-star-half-o icon-state-warning'></i> 
                               <td> <button type='button' name='reply' id='reply' data-toggle='modal' data-target='#replyuser$row[cid]' class='btn btn-warning'>Reply</button></td>     
                            </td>
                        </tr>

                        <div id='replyuser$row[cid]' class='modal fade'>
                             <div class='modal-dialog'>
                              <div class='modal-content'>
                               <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title'>Reply to $usermail[email] </h4>
                               </div>
                               <div class='modal-body'>
                                <form method='post' id='replytouser'>
                                  <input type='hidden' value='$row[cid]' name='complainid'><br />
                                 <label>Body</label>
                                 <textarea name='replybody' rows='10' cols='10' id='replybody' class='form-control'></textarea>
                                 <br />
                                 <button class='button' name='rep' type='submit'>Send</button>

                                </form>
                               </div>
                               <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                               </div>
                              </div>
                             </div>
                        </div>
          "; 
      }
    }

    function test($db){
      if ($totalcomplainslist > 0) {
      while ($row = mysqli_fetch_assoc($allcomplains)) {
       echo "<input type='text' name='complainid' value='$row[id]'>";
      }
    }
    }
    /*
     if(isset($_GET['replyuser']))
        {
          $id = $_GET['replyuser'];
          $sql = "DELETE FROM users WHERE id='$id'";
          $res = mysqli_query($db, $sql);
          //echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        }
*/
?>