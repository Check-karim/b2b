<?php

session_start();
include('../DB/con.php');

$ok = true;
$messages = array();

$qty = isset($_POST['qty']) ? $_POST['qty'] : '';
$label = isset($_POST['label']) ? $_POST['label'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$ref = isset($_POST['ref']) ? $_POST['ref'] : '';

$sql_e = "SELECT rowid FROM Product WHERE ref='$ref'";
$res_u = mysqli_query($conn, $sql_e);

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