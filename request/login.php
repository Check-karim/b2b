<?php

session_start();
include('../DB/con.php');

$ok = true;
$messages = array();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';



if (empty($password) || empty($username)) {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} else {
    $sqlLogin = $conn->query("SELECT ID FROM Users WHERE password='$password' AND username='$username'");

    if ($sqlLogin->num_rows > 0) {
        $ok = true;
        $messages[] = "SUCCESS";
        setcookie("user", $username, time() + 30 * 24 * 60 * 60, "/");
        $_SESSION['user'] = $username;
    } else {
        $ok = false;
        $messages[] = "WRONG PASSWORD OR USERNAME";
    }
}



echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages,
    )
);