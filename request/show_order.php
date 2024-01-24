<?php
function show_order($db, $aId = ''){
    $getAgent = "SELECT ";
    $getAgent .= " o.rowid as rowid , b.username as businessId , u.username as agentId, ";
    $getAgent .= " p.ref as productId , o.qty, o.status, o.date as date ";
    $getAgent .= " FROM Orders as o";
    $getAgent .= " LEFT JOIN Business as b ON o.businessId = b.id ";
    $getAgent .= " LEFT JOIN Product as p ON o.productId = p.rowid ";
    $getAgent .= " LEFT JOIN Users as u ON o.agentId = u.id ";
    if(!empty($aId)){
        $getAgent .= " WHERE o.agentId = ".$aId ;
    }
    $getAgent .= " GROUP by rowid DESC";

    $run_getAgent = mysqli_query($db, $getAgent);

    var_dump(empty($aid));
    $p = 1;
    while ($row_getAgent = mysqli_fetch_assoc($run_getAgent)) {
        # code...
        $Id = $row_getAgent['rowid'];
        $businessId = $row_getAgent['businessId'];
        $productId = $row_getAgent['productId'];
        $agentId = $row_getAgent['agentId'];
        $qty = $row_getAgent['qty'];
        $status = $row_getAgent['status'];
        $date = $row_getAgent['date'];

        $class = '';
        if($status == 'PENDING'){
            $class = 'secondary';
        }
        if($status == 'SENT'){
            $class = 'info';
        }
        if($status == 'RECEIVED'){
            $class = 'warning';
        }
        if($status == 'RETURNED'){
            $class = 'danger';
        }

        echo '
            <tr class="tbl_tr">

            <th scope="row">'.$p.'</th>
                                        
            <td>'.$date.'</td>
            <td>'.$businessId.'</td>
            <td>'.$productId.'</td>
            <td>'.$qty.'</td>
            <td>'.$agentId.'</td>
            <td> <button type="button" class="btn btn-'.$class.'" disabled>'.$status.'</button></td> ';

        if(empty($aId)){
            echo '
                <td><a class="btn btn-success" href="./index.php?action=edit-order&id='.$Id.'">
                UPDATE
                </a></td> ';
        }
          
        echo  '</tr>';   
        
        $p ++;
    }
}