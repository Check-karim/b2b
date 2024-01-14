<?php

function getBussiness($db){
    $getBusiness = "select * from  Business ";

    $run_getBusiness = mysqli_query($db, $getBusiness);

    $p = 1;
    while ($row_getBusiness = mysqli_fetch_assoc($run_getBusiness)) {
        # code...
        $Id = $row_getBusiness['id'];
        $email = $row_getBusiness['email'];
        $username = $row_getBusiness['username'];
        $phone = $row_getBusiness['phone'];

     

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