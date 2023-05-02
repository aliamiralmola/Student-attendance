<?php
// include "templates/connection.php";
// $sch = [
//     '0' => '1',
//     '1' => '4'
// ];
// $lec = [
//     '0',
//     '1',
//     '2',
//     '3',
//     '4',
//     '5',
//     '6',
//     '7',
//     '8',
//     '9',
//     '10',
//     '11',
//     '12',
//     '13',
//     '14',
//     '15',
//     '16',
//     '17',
//     '18',
//     '19',
//     '20',
//     '21',
//     '22',
//     '23',
//     '24',
//     '25',
//     '26',
//     '27',
//     '28',
//     '29',
//     '30',
//     '31',
//     '32',
//     '33',
//     '34',
//     '35',
//     '36',
//     '37',
//     '38',
//     '39'
// ];
// $stu = [
//     '1',
//     '2',
//     '3',
//     '4',
//     '5'
// ];
// $j=0; $k=0; $m=0;
// for($i=0; $i<50000; $i++){
//     $query = mysqli_query($con, 
//         "INSERT INTO `register` (`id`, `u_id`, `lecture`, `date`, `day`, `s_time`, `e_time`) 
//         VALUES (NULL, '$stu[$m]', '$lec[$k]', current_timestamp(), '$sch[$j]', current_timestamp(), current_timestamp() )" );
//     if( ($i%2) == 1 ){ $j = 0; }else{ $j++; }
//     if( $k < 39 ){ $k++; }else{ $k=0; }
//     if( $m < 4 ){ $m++; }else{ $m=0; }
// }


// Prints the day
// echo date("l") . "<br>";
// print_r(getdate());
// Prints the day, date, month, year, time, AM or PM
// echo date_default_timezone_set("Asia/Baghdad") . "<br>";
// echo date("h:i:s") . "<br>";

date_default_timezone_set("Asia/Baghdad");
$time = date("G:i:s");
$days = date("l");
echo $time . "<br> " . $days;
