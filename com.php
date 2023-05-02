<?php
include "templates/header.php";
if( !isset( $_GET['uid'] ) ){
    $uid = "no tag";
}else{
    $uid = $_GET['uid'];
}

date_default_timezone_set("Asia/Baghdad");
$time = date("G:i:s");
$days = date("l");
if( $days == 'Sunday' ){
    $days = 1;
}
elseif( $days == 'Monday' ){
    $days = 2;
}
elseif( $days == 'Tuesday' ){
    $days = 3;
}
elseif( $days == 'Wednesday' ){
    $days = 4;
}
elseif( $days == 'Thursday' ){
    $days = 5;
}
elseif( $days == 'Friday' ){
    $days = 6;
}
elseif( $days == 'Saturday' ){
    $days = 7;
}

$query = mysqli_query($con, "SELECT * FROM `users` WHERE `tags`='$uid' ");
$row = mysqli_fetch_assoc( $query );
$id = $row["id"];
$stage = $row['stage'];
$division = $row["division"];

$query = mysqli_query($con, "SELECT * FROM `schedule` WHERE `stage`='$stage' AND `devision`='$division' AND `day`='$days' ");
while( $row = mysqli_fetch_assoc($query) ){

    $s_time = $row['s_time'];
    $s_time = str_replace(":", "", $s_time);
    $s_time[4] = 0;
    $s_time[5] = 0;

    $l_time = $row['l_time'];
    $l_time = str_replace(":", "", $l_time);
    $l_time[4] = 0;
    $l_time[5] = 0;

    if( $time[1] == ":" ){
        $t_time[5] = 0;
        $t_time[6] = 0;
    }else{
        $t_time[6] = 0;
        $t_time[7] = 0;
    }
    $t_time = str_replace(":", "", $time);

    if( $s_time <= $t_time && $l_time >= $t_time ){
        $e_time = $row['l_time'];
        $lec = $row['code'];
    }
}
if( !isset( $e_time ) ){
    $e_time = $time;
    $lec = 111;
}
$sql = "INSERT INTO register (`u_id`, `lecture`, `day`, `e_time`) VALUES ('$id', '$lec', '$days', '$e_time')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


// $con->close();
?>
