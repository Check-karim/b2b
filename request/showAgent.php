<?php

function getAgent($db){
    $getAgent = "select * from  Users where accountType='0' ";

    $run_getAgent = mysqli_query($db, $getAgent);

    $p = 1;
    while ($row_getAgent = mysqli_fetch_assoc($run_getAgent)) {
        # code...
        $Id = $row_getAgent['id'];
        $email = $row_getAgent['email'];
        $username = $row_getAgent['username'];
        $password = $row_getAgent['password'];
        $phone = $row_getAgent['phone'];
        $accountType = $row_getAgent['accountType'];

     

        echo '
            <tr class="tbl_tr">

            <th scope="row">'.$p.'</th>
                                        
            <td>'.$email.'</td>
            <td>'.$username.'</td>

            <td>'.$phone.'</td>
            <td>
             <a href="../routes/edit_user.php?delAgent='.$username.'&delAgent_ID='.$Id.'" class="btn btn-success">
             <img id="" value="" class="side_logo" src="./public/icon/icons8-edit-50.png" alt="">
             </a>

             <a href="../routes/edit_user.php?delAgent_ID='.$Id.'" class="btn btn-danger">
             <img id="" value="" class="side_logo" src="./public/icon/icons8-delete-bin-64.png" alt="">
             </a>
             </td>
          </tr>   

    ';
        $p ++;
    }
}