<?php

function getProduct($db){
    $getAgent = "select * from  Product ";

    $run_getAgent = mysqli_query($db, $getAgent);

    $p = 1;
    while ($row_getAgent = mysqli_fetch_assoc($run_getAgent)) {
        # code...
        $Id = $row_getAgent['rowid'];
        $ref = $row_getAgent['ref'];
        $label = $row_getAgent['label'];
        $qty = $row_getAgent['qty'];
        $Price = $row_getAgent['price'];

     

        echo '
            <tr class="tbl_tr">

            <th scope="row">'.$p.'</th>
                                        
            <td>'.$ref.'</td>
            <td>'.$label.'</td>
            <td>'.$Price.' RWF</td>
            <td>'.$qty.'</td>
            <td>'.$Price * $qty.'</td>
            <td>
             <a href="./products.php?action=edit-product&page=Products&id='.$Id.'" class="btn btn-success">
             <img id="" value="" class="side_logo" src="./public/icon/icons8-edit-50.png" alt="">
             </a>

             <a href="./products.php?action=delete-product&page=Products&id='.$Id.'" class="btn btn-danger">
             <img id="" value="" class="side_logo" src="./public/icon/icons8-delete-bin-64.png" alt="">
             </a>
             </td>
          </tr>   

    ';
        $p ++;
    }
}