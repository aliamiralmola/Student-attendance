<?php

$stage = $_GET['auv'];
$newDiv = $_POST["newdivision2"];
if($newDiv > 0x00 ){
$query = mysqli_query($con, "UPDATE `users` SET `division`='$newDiv' WHERE `stage`='$stage' ");
if( $query ){
echo '<div class="alert alert-success">' . 'تم النقل بنجاح ' . ' ||  <a href="?do=stage&auv=' . $stage . '&buv='. $newDiv .'"> فتح الصف الجديد </a>' . '</div>';
}
}else{
echo '<div class="alert alert-warning">' . "لم يتم التعرف على الشعبة المختارة، فشلت عملية النقل." . '</div>';
}