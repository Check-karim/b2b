<?php

session_start();
include('../DB/con.php');

$ok = true;
$messages = array();

$state = isset($_POST['state']) ? $_POST['state'] : '';
$orderId = isset($_POST['orderId']) ? $_POST['orderId'] : '';


if ( empty($state) || empty($orderId) )  {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} else {
    $query ="UPDATE Orders SET status='".$state."' WHERE rowid='".$orderId."' ";
    $sqlcreate_agent = $conn->query($query);

    if ($sqlcreate_agent) {
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