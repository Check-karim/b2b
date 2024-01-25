<?php

session_start();
include('../DB/DB.php');

$ok = true;
$messages = array();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

if ( empty($username) || empty($email) || empty($phone) )  {
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} else {
    $query ="UPDATE Business SET email='".$email."', phone='".$phone."' WHERE username='".$username."' ";
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