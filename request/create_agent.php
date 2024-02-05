<?php

session_start();
include('../DB/DB.php');

$ok = true;
$messages = array();

$email = isset($_POST['email']) ? $_POST['email'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$sql_e = "SELECT Id FROM Users WHERE username='$username'";
$res_u = mysqli_query($conn, $sql_e);

if (empty($password) || empty($username) || empty($email) || empty($phone) )  {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $ok = false;
    $messages[] = "Invalid email format";
} elseif (mysqli_num_rows($res_u) > 0) {
    $ok = false;
    $messages[] = "Username already exist";
}elseif (!is_numeric($phone)) {
    $ok = false;
    $messages[] = "Only numeric values are allowed for number";
} else {
    $query ="INSERT INTO `Users` ( `username`, `password`,`email`,`phone`, `accountType`) VALUES('" . $username . "','" . $password . "','" . $email . "','" . $phone . "', '0') ";
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