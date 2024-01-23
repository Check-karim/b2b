<?php

session_start();
include('../DB/con.php');

$ok = true;
$messages = array();

$qty = isset($_POST['qty']) ? $_POST['qty'] : '';
$prod_id = isset($_POST['prod_id']) ? $_POST['prod_id'] : '';
$business_id = isset($_POST['business_id']) ? $_POST['business_id'] : '';
$agent_id = isset($_POST['agent_id']) ? $_POST['agent_id'] : '';


$sql_e = "SELECT * FROM Product WHERE rowid='$prod_id'";
$res_u = mysqli_query($conn, $sql_e);
$row = mysqli_fetch_object($res_u);

if ( empty($qty) || empty($prod_id) || empty($business_id) || empty($agent_id) )  {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} elseif ($row->qty < $qty) {
    $ok = false;
    $messages[] = "Not Enough Qty in Stock";
} else {
    $query ="INSERT INTO `Orders` ( `businessId`,`productId`,`qty`,`agentId`) VALUES('" . $business_id . "','" . $prod_id . "','" . $qty . "','" . $agent_id . "') ";
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