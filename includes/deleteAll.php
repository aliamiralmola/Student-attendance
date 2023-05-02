<?php
$stage = $_GET['auv'];
$division = $_GET['buv'];
$query = mysqli_query($con, "DELETE FROM `users` WHERE `stage`='$stage' AND `division`='$division' ");
if( $query ){
    echo '<div class="alert alert-success">' . "تم حذف الجميع بنجاح" . '</div>';
}else{
    echo '<div class="alert alert-danger">' . "فشلت عملية الحذف" . '</div>';
}