<?php

session_start();
include('../DB/DB.php');

$ok = true;
$messages = array();

$qty = isset($_POST['qty']) ? $_POST['qty'] : '';
$label = isset($_POST['label']) ? $_POST['label'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$ref = isset($_POST['ref']) ? $_POST['ref'] : '';

$sql_e = "SELECT * FROM Product WHERE ref='$ref'";
$res_u = mysqli_query($conn, $sql_e);
$row = mysqli_fetch_object($res_u);

if ( empty($qty) || empty($label) || empty($price) || empty($ref) )  {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} elseif (mysqli_num_rows($res_u) > 0) {
    $ok = false;
    $messages[] = "Product already exist";
} else {
    $query ="INSERT INTO `Product` ( `ref`,`label`,`qty`,`price`) VALUES('" . $ref . "','" . $label . "','" . $qty . "','" . $price . "') ";
    $sqlcreate_agent = $conn->query($query);

    $sql_e_1 = "SELECT * FROM Product WHERE ref='$ref'";
    $res_u_1 = mysqli_query($conn, $sql_e_1);
    $row_1 = mysqli_fetch_object($res_u_1);

    if ($sqlcreate_agent) {
        $query ="INSERT INTO `Stock` ( `prod_id`,`status`, `qty`, `date`) VALUES('" . $row_1->rowid . "','IN','" . $qty . "', NOW()) ";
        $sqlcreate_agent = $conn->query($query);
        
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