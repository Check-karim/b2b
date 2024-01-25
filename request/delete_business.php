<?php

session_start();
include('../DB/DB.php');

$ok = true;
$messages = array();

$id = isset($_POST['id']) ? $_POST['id'] : '';

$sql_e = "SELECT * FROM Orders WHERE businessID='$id'";
$res_u = mysqli_query($conn, $sql_e);

if ( empty($id) )  {
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
}elseif (mysqli_num_rows($res_u) > 0){
    $ok = false;
    $messages[] = "Business can't be deleted because it has Orders That exist";
} else {
    $query ="DELETE FROM Business WHERE id='".$id."' ";
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