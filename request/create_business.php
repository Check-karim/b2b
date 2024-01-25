<?php

session_start();
include('../DB/DB.php');

$ok = true;
$messages = array();

$email = isset($_POST['email']) ? $_POST['email'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

$sql_e = "SELECT Id FROM Business WHERE username='$username'";
$res_u = mysqli_query($conn, $sql_e);

if ( empty($username) || empty($email) || empty($phone) )  {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} elseif (mysqli_num_rows($res_u) > 0) {
    $ok = false;
    $messages[] = "Business already exist";
} else {
    $query ="INSERT INTO `Business` ( `username`,`email`,`phone`) VALUES('" . $username . "','" . $email . "','" . $phone . "') ";
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