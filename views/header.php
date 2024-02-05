<!DOCTYPE html>
<html lang="en">
<?php 
if(isset($_GET['page'])){
    $title = $_GET['page'];
}else{
    $title = 'Home';
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B2B - <?php print $title ?></title>
    <link href="./public/icon/logo.ico" rel="icon">
	<link href="./public/icon/logo.ico" rel="apple-touch-icon">
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="stylesheet" href="./public/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
</head>

<body style="background-color: #0000001f;">