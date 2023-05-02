<?php 
include '../templates/header.php';
if( isset( $_GET['id'] ) ){
    $id = $_GET['id'];
    $stage = $_GET['stage'];
    $division = $_GET['division'];
    $query = mysqli_query($con, "DELETE FROM `users` WHERE `id`='$id' ");
    if($query){
        $path = "../manage.php?do=stage&auv=" . $stage. "&buv=" . $division;
        header("location: " . $path);
    }else{
        echo '<div class="alert alert-danger">' . 'فشلت العملية .... ' . '<a href="../manage.php?do=stage&auv='.$stage.'&buv='. $division .'" > رجوع </a>' . '</div>';
    }
}
include '../templates/footer.php';