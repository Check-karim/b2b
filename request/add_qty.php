<?php

session_start();
include('../DB/DB.php');

$ok = true;
$messages = array();

$id = isset($_POST['id']) ? $_POST['id'] : '';
$qty = isset($_POST['qty']) ? $_POST['qty'] : '';

$sql_e = "SELECT * FROM Product WHERE rowid='$id'";
$res_u = mysqli_query($conn, $sql_e);
$row = mysqli_fetch_object($res_u);

if ( empty($id) )  {
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} elseif($qty <= 0){
    $ok = false;
    $messages[] = "Qty has to be higher than 0";
} else {
    $query ="UPDATE Product SET qty='".((int) $row->qty + (int) $qty)."' WHERE rowid='".$id."' ";
    $sqlcreate_agent = $conn->query($query);

    if ($sqlcreate_agent) {
        $query_update_1 ="INSERT INTO `Stock` ( `prod_id`,`status`, `qty`, `date`) VALUES('" . $id . "','IN','" . $qty . "', NOW()) ";
        $sqlUpdateProd_1 = $conn->query($query_update_1);

        $ok = true;
        $messages[] = "SUCCESS";
    } else {
        $ok = false;
        $messages[] = "DB ERROR";
    }
}



echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages,
    )
);