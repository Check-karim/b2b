<?php

session_start();
include('../DB/con.php');

$ok = true;
$messages = array();

$state = isset($_POST['state']) ? $_POST['state'] : '';
$orderId = isset($_POST['orderId']) ? $_POST['orderId'] : '';
$prod_id = isset($_POST['prod_id']) ? $_POST['prod_id'] : '';
$qty = isset($_POST['qty']) ? $_POST['qty'] : '';

$sql_e = "SELECT * FROM Product WHERE rowid='$prod_id'";
$res_u = mysqli_query($conn, $sql_e);
$row = mysqli_fetch_object($res_u);

$sql_e_1 = "SELECT * FROM Orders WHERE rowid='$orderId'";
$res_u_1 = mysqli_query($conn, $sql_e_1);
$row_1 = mysqli_fetch_object($res_u_1);

if ( empty($state) || empty($orderId) )  {
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
}elseif($row_1->status == 'RETURNED'){
    $ok = false;
    $messages[] = "Order already returned please ask the agent to recreate the order";
} else {
    $query ="UPDATE Orders SET status='".$state."' WHERE rowid='".$orderId."' ";
    $sqlcreate_agent = $conn->query($query);

    if ($sqlcreate_agent) {
        if($state == 'RETURNED'){
            $query_update ="UPDATE Product SET qty='".((int) $row->qty + (int) $qty)."' WHERE rowid='".$prod_id."' ";
            $sqlUpdateProd = $conn->query($query_update);
        }
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