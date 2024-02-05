<?php
function show_stock($db){
    $getAgent = "SELECT  s.date as date, s.status as status, ";
    $getAgent .= " s.qty as qty, p.ref as prod_id";
    $getAgent .= " FROM Stock as s";
    $getAgent .= " LEFT JOIN Product as p ON p.rowid = s.prod_id";
    $getAgent .= " GROUP BY s.rowid desc";

    $run_getAgent = mysqli_query($db, $getAgent);

    $p = 1;
    while ($row_getAgent = mysqli_fetch_assoc($run_getAgent)) {
        # code...
        // $Id = $row_getAgent['rowid'];
        $date = $row_getAgent['date'];
        $prod_id = $row_getAgent['prod_id'];
        $status = $row_getAgent['status'];
        $qty = $row_getAgent['qty'];

        echo '
            <tr class="tbl_tr">

            <th scope="row">'.$p.'</th>
                                        
            <td>'.$date.'</td>
            <td>'.$prod_id.'</td>
            <td>'.$status.'</td>
            <td>'.$qty.'</td>';
          
        echo  '</tr>';   
        
        $p ++;
    }
}