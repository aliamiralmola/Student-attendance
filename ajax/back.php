<?php 
include '../templates/header.php';
if( isset( $_GET['id'] ) ){
    $id = $_GET['id'];
    $stage = $_GET['stage']-1;
    $division = $_GET['division'];
    $query = mysqli_query($con, "UPDATE `users` SET `stage`='$stage' WHERE `id`='$id' ");
    if($query){
        $path = "../manage.php?do=stage&auv=" . $_GET['stage']. "&buv=" . $division;
        header("location: " . $path);
    }else{
        echo '<div class="alert alert-danger">' . 'فشلت العملية .... ' . '<a href="../manage.php?do=stage&auv='.$_GET['stage'].'&buv='. $division .'" > رجوع </a>' . '</div>';
    }
}
include '../templates/footer.php';