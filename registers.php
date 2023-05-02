<?php
if( isset( $_GET['name'] ) ){
    $title = "سجل الطالب: " . $_GET['name'];
}else{
    $title = "السجلات";
}
include 'templates/header.php';
include "templates/navbar.php";

if( isset($_GET['id']) && isset($_GET['k']) ){
    $rid = $_GET['id'];
    $ra = $_GET['k'];
    $id = ($rid * 42.9869456903 ) / ($ra * 58754.9754277456);
    $id = round($id);    
    $do = "stu";
}else{
    $do = "all";
}
if( isset( $_GET['do'] ) ){
    if( $_GET['do'] == 'stage' ){
        $do = $_GET['do'];
    }
}
?>
<div class="h1 alert alert-dark"> السجلات </div>

<div class=" container">
    <div class=" row">
        <?php
        if($do == "all"){
        ?>
            <?php
            // استدعاء بيانات الصفوف والشعب من قاعدة البيانات
            $query = mysqli_query($con, "SELECT * FROM `stages` ORDER BY `stages`.`stage` ASC, `stages`.`division` ASC");
            while($row = mysqli_fetch_assoc($query)){    
            ?>
            <div class="col-sm-12 col-md-4 col-lg-3 p-2">
                <a href="?do=stage&auv=<?php echo $row['stage']; ?>&buv=<?php echo $row['division'];?>">
                    <div class="shadow-padding center h3 ">
                        <?php
                        if($row['stage'] === "1"){
                            echo '<span class="text-primary">' . "الأول" . " " . $row['division'] . "</span>";
                        }elseif($row['stage'] === "2"){
                            echo '<span class="text-success">' . "الثاني" . " " . $row['division'] . "</span>";
                        }elseif($row['stage'] === "3"){
                            echo '<span class="text-warning">' . "الثالث" . " " . $row['division'] . "</span>";
                        }elseif($row['stage'] === "4"){
                            echo '<span class="text-danger">' . "الرابع" . " " . $row['division'] . "</span>";
                        }
                        ?>
                    </div>
                </a>
            </div>
        <?php } ?>
        <!--  -->
        <?php
        }
        if($do == "stage"){
        ?>
        <div class="col-12">
            <!-- جدول بيانات الطلبة -->
            <table class="table table-striped">
                <thead>
                    <tr class="tr1 center">
                        <th scope="col">#</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">اجراءات</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $stagenum = $_GET["auv"];
                    $stagedivision = $_GET["buv"];
                    $query = mysqli_query($con, "SELECT * FROM `users` WHERE `stage`='$stagenum' AND `division`='$stagedivision' ORDER BY `users`.`name` ASC");
                    $i = 0;
                    while($row = mysqli_fetch_assoc($query)){
                        $i++;
                        $id = $row['id'];
                    ?>
                    <tr class="tr1">
                        <th class="td1 center" scope="row"><?php echo $i; ?></th>
                        <td class="td1 center"><?php echo $row['name']; ?></td>
                        <td class="td1 center">
                            <a class="pr-1 text-primary " href="registers.php?id=<?php $ra = rand(999, 99999); echo $row['id'] * $ra * 58754.9754277456 / 42.9869456903?>&k=<?php echo $ra; ?>&name=<?php echo $row['name']; ?>">السجل<i class="fa fa-history"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } ?>

        <?php  
        if( $do == "stu" ){
        ?>
        <!-- list -->
        <div class="col-sm-12 col-md-4 col-lg-3 ">
            <?php 
            $query = mysqli_query($con, "SELECT * FROM `register` WHERE `u_id`='$id' ORDER BY `register`.`lecture` ASC");
            $num = mysqli_num_rows($query);
            $ss = '';
            while($row = mysqli_fetch_assoc($query)){ 
                if( $row['lecture'] !== $ss){
            ?>
                <a href="?id=<?php echo $rid; ?>&k=<?php echo $ra; ?>&lec=<?php echo $row['lecture']; ?>&name=<?php echo $_GET['name']; ?>">
                    <div class=" h4 center ul1">
                        <div class="li1">
                            <?php 
                            $code = $row["lecture"];
                            $second_query = mysqli_query($con, "SELECT `name` FROM `schedule` WHERE `code`='$code' ");
                            $second_row = mysqli_fetch_assoc($second_query);
                            if( $row['lecture'] == 111 ){
                                echo 'خارج اوقات المحاضرات';
                            }else{
                                echo $second_row['name'];
                            }
                            ?>
                        </div>
                    </div>
                </a>
            <?php $ss=$row['lecture']; } } ?>
        </div>
        <!--  -->
        <div >
        <?php 
            if($num < 1){
                echo '<div class="alert h1">' . "لا يوجد اي ايام حضور في قاعدة البيانات" . '</div>';
            }else{
                if( !isset($_GET['lec'])){
                    echo '<div class="alert h1">' . "اختر مادة رجاءً" . '</div>';
                }else{
                ?>
                <!--  -->
                <!-- جدول بيانات الطلبة -->
                <?php
                    $lec = $_GET['lec'];
                    $query = mysqli_query($con, "SELECT * FROM `register` WHERE `u_id`='$id' AND `lecture`='$lec' ORDER BY `register`.`date` DESC, `register`.`s_time` DESC ");
                ?>
                <div class="h5">
                    <div class="p-1"> الاسم: <?php echo $_GET['name']; ?> </div>
                    <div class="p-1"> المادة: <?php 
                        $code = $_GET["lec"];
                        $second_query = mysqli_query($con, "SELECT * FROM `schedule` WHERE `code`='$code' ");
                        $second_row = mysqli_fetch_assoc($second_query);
                        if( $_GET['lec'] == 111 ){
                            echo 'خارج اوقات المحاضرات';
                        }else{
                            echo $second_row['name'];
                        }
                    ?> </div>
                    <div class="p-1"> الوقت الكلي داخل المقرر: <span id="alltimediv"></span> </div>
                    <div class="p-1"> من اصل: <?php echo $second_row["all_time"]; ?> ساعة </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr class="tr1 center">
                            <th scope="col">#</th>
                            <th scope="col">التأريخ</th>
                            <th scope="col">الموافق</th>
                            <th scope="col">وقت الدخول</th>
                            <th scope="col">وقت المغادرة</th>
                            <th scope="col">الزمن داخل المحاضرة</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $i = 0;
                        while($row = mysqli_fetch_assoc($query)){
                            $i++;
                            $id = $row['id'];
                        ?>
                        <tr class="tr1">
                            <th class="td1 center" scope="row"><?php echo $i; ?></th>
                            <td class="td1 center" scope="row"><?php echo $row['date']; ?></td>
                            <td class="td1 center" scope="row"><?php 
                                if( $row['day'] == 1 ){
                                    echo "الاحد"; 
                                }
                                if( $row['day'] == 2 ){
                                    echo "الاثنين"; 
                                }
                                if( $row['day'] == 3 ){
                                    echo "الثلاثاء"; 
                                }
                                if( $row['day'] == 4 ){
                                    echo "الاربعاء"; 
                                }
                                if( $row['day'] == 5 ){
                                    echo "الخميس"; 
                                }
                                if( $row['day'] == 6 ){
                                    echo "الجمعة"; 
                                }
                                if( $row['day'] == 7 ){
                                    echo "السبت"; 
                                }
                            
                            ?></td>
                            <td class="td1 center text-success" scope="row"><?php echo $row['s_time']; ?></td>
                            <td class="td1 center text-danger" scope="row"><?php echo $row['e_time']; ?></td>
                            <td class="td1 center text-primary subTime" scope="row"><?php  
                                $s_time = $row['s_time'];
                                $e_time = $row['e_time'];
                                $s_time = str_replace(":", "", $s_time);
                                $e_time = str_replace(":", "", $e_time);
                                $s_h = $s_time[0] . $s_time[1];
                                $e_h = $e_time[0] . $e_time[1];
                                $s_m = $s_time[2] . $s_time[3];
                                $e_m = $e_time[2] . $e_time[3];
                                
                                if( $s_m > $e_m ){
                                    $s_h = $s_h + 1;
                                    $e_m = $e_m + 60;
                                }
                                $sub_h = $e_h - $s_h; 
                                $sub_m = $e_m - $s_m;
                                
                                echo $sub_h . ":" . $sub_m;
                                                            
                            ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <?php
                }
            }
        ?>
        </div>

        <?php } ?>
    </div>
</div>

<?php
include 'templates/footer.php';
?>