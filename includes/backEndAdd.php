<?php
$stage = $_GET['auv'];
$division = $_GET['buv'];
$testquery = mysqli_query($con, "SELECT * FROM `users` WHERE `stage`='$stage' AND `division`='$division' ORDER BY `users`.`DateExchange` DESC, `users`.`TimeExchange` DESC ");
$row = mysqli_fetch_assoc($testquery);
$lastTime = $row['TimeExchange'];
$lastDate = $row['DateExchange'];
$lastTime = str_replace(":", "", $lastTime);
$strlen = strlen($lastTime);
// انقاص ثانية واحدة من الوقت الاصلي
$lastTime1 = $lastTime-1;
$lastTime1 = $lastTime1 . '00';
for( $i=0; $i<strlen($lastTime1);  $i++){
    if( $i == 2 || $i == 5 ){
        for( $j=(strlen($lastTime1)-1); $j>=$i; $j-- ){
            $lastTime1[$j] = $lastTime1[$j-1];
        }
        $lastTime1[$i] = ":";
    }
}
$testquery = mysqli_query($con, "SELECT * FROM `users` WHERE `stage`='$stage' AND `division`='$division' AND `DateExchange`='$lastDate'
                                AND (`TimeExchange`='$lastTime' OR `TimeExchange`='$lastTime1') 
                                ORDER BY `users`.`DateExchange` DESC, `users`.`TimeExchange` DESC ");
while( $row = mysqli_fetch_assoc($testquery) ){
    $id = $row['id'];
    $exh0 = $row['exchangeHistory'];
    $exh = $row['exchangeHistory'];
    $exh = str_replace(" ", "", $exh);
    $exh = str_replace(",", "", $exh);
    $exh = str_split($exh, 2);
    $lastStageCount = count($exh) - 2; // -2
    if( $lastStageCount >= 0 ){
        $exh = $exh[$lastStageCount];
        $tostage = $exh[0];
        $todivition = $exh[1];
        $exh0 = $exh0 . $tostage . $todivition . ",";
        $query = mysqli_query($con, "UPDATE `users` SET `stage`='$tostage',`division`='$todivition',`exchangeHistory`='$exh0',
                                    `DateExchange`=current_timestamp(),`TimeExchange`=current_timestamp() WHERE `id`='$id' ");
        
        if($query){
            echo '<div class="alert alert-success">' . 'تم الارجاع بنجاح ' . ' ||  <a href="?do=stage&auv=' . $tostage . '&buv='. $todivition .'"> فتح الصف الجديد </a>' . '</div>';
        }else{
            echo "<div class='alert alert-warning'> فشلت عملية الاستعلام مع قاعدة البيانات.  </div>";
        }
    }else{
        echo "<div class='alert alert-warning'> .لقد اكتشفنا ان اخر طالب اضيف الى هذا الصف جديد وليس لديه صف سابق لإرجاعه اليه </div>";
    }
}