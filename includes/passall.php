<?php
$stage = $_GET['auv'];
$division = $_GET['buv'];
$tostage = $stage + 1;
$todivition = $_POST['newdivision'];
// اذا لم تكن الشعبة موجودة سيتم انشاء الشعبة
$testquery = mysqli_query($con, "SELECT * FROM `stages` WHERE `stage`='$tostage' AND `division`='$todivition' ");
$num = mysqli_num_rows($testquery);
if( $num < 1){
    $query = mysqli_query($con, "INSERT INTO `stages` (`stage`, `division`) 
                                    VALUES ('$tostage', '$todivition')");
}
$testquery = mysqli_query($con, "SELECT * FROM `users` WHERE `stage`='$stage' AND `division`='$division' ");
while( $row = mysqli_fetch_assoc($testquery) ){
    $id = $row['id'];
    $exh0 = $row['exchangeHistory'];
    $exh0 = $exh0 . $tostage . $todivition . ",";
    $query = mysqli_query($con, "UPDATE `users` SET `exchangeHistory`='$exh0' WHERE `id`='$id' ");
}
$query = mysqli_query($con, "UPDATE `users` 
                            SET `stage`='$tostage',`division`='$todivition',`TimeExchange`=current_timestamp() WHERE `stage`='$stage' ");
if($query){
    echo '<div class="alert alert-success">' . 'تم انجاح الجميع بنجاح ' . ' ||  <a href="?do=stage&auv=' . $tostage . '&buv='. $todivition .'"> فتح الصف الجديد </a>' . '</div>';
}