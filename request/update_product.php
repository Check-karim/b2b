<?php

session_start();
include('../DB/DB.php');

$ok = true;
$messages = array();

$ref = isset($_POST['ref']) ? $_POST['ref'] : '';
$label = isset($_POST['label']) ? $_POST['label'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';

if ( empty($ref) || empty($label) || empty($price) )  {
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} else {
    $query ="UPDATE Product SET label='".$label."', price='".$price."' WHERE ref='".$ref."' ";
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