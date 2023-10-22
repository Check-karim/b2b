<?php 
$title = 'Home';
?>
<?php require_once('./views/header.php') ?>
<?php 
if(!isset($_COOKIE['username'])){
    header("Location: ./login.php");
}
?>

<?php require_once('./views/footer.php') ?>