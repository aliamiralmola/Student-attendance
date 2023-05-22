<?php
$title = 'الادارة';
include "templates/header.php";
include "templates/navbar.php";
//
if(isset($_GET['do'])){
    $do = $_GET['do'];
}else{
    $do = 'students';
}

?>
<!--  -->
<div class="container">
    <div class="row">
        <div class=" col-12 p-2 bg-dark">
            <ul class=" flex center">
                <a href="?do=admins"> 
                    <li class=" block pb-0 pt-0">إدارة المشرفين</li>
                </a>
                <a href="?do=students">
                    <li class=" block pb-0 pt-0">إدارة الطلبة</li>
                </a>
                <a href="?do=schedule">
                    <li class=" block pb-0 pt-0">الجدول</li>
                </a>
            </ul>
        </div>
        <!--  -->
        <div class="col-12">
            <?php if( $do == 'students' || $do == 'stage' ){ 
                include 'includes/doStudent.php';
            } 
            // 
            if( $do == 'admins' ){
                include 'includes/doAdmins.php';
            } 
            // 
            if( $do == 'schedule' ){
            ?>
            <div class="row">
                <div class="col-12 col-md-3 col-lg-3">
                <?php 
                    $query = mysqli_query($con, "SELECT * FROM `stages` ORDER BY `stages`.`stage` ASC, `stages`.`division` ASC");
                    while($row = mysqli_fetch_assoc($query)){ 
                    ?>
                    <a href="?do=schedule&auv=<?php echo $row['stage']; ?>&buv=<?php echo $row['division']; ?>">
                        <div class=" h4 center ul1">
                            <?php
                            if($row['stage'] === "1"){
                                echo '<div class="text-primary li1 ">' . "الأول" . " " . $row['division'] . "</div>";
                            }elseif($row['stage'] === "2"){
                                echo '<div class="text-success li1 ">' . "الثاني" . " " . $row['division'] . "</div>";
                            }elseif($row['stage'] === "3"){
                                echo '<div class="text-warning li1 ">' . "الثالث" . " " . $row['division'] . "</div>";
                            }elseif($row['stage'] === "4"){
                                echo '<div class="text-danger li1 ">' . "الرابع" . " " . $row['division'] . "</div>";
                            }
                            ?>
                        </div>
                    </a>
                    <?php } ?>
                </div>
                <!--  -->
                <?php 
                    $days = [ 
                        'الاحد',
                        'الاثنين',
                        'الثلاثاء',
                        'الاربعاء',
                        'الخميس'
                    ];
                    // 
                    if( isset( $_GET['auv'] ) ){
                        $auv = $_GET['auv'];
                        // 
                        if( $auv == 1 ){
                            $n=0; $n2=11;
                            $lec = [
                                '0' => 'فراغ',
                                '1' => 'اسس الكهربائية',
                                '2' => 'المنطق',
                                '3' => 'الرياضيات',
                                '4' => 'الفيزياء',
                                '5' => 'برمجة',
                                '6' => 'الرسم الهندسي',
                                '7' => 'الديمقراطية',
                                '8' => 'اللغة العربية',
                                '9' => 'مختبر الكهربائية',
                                '10' => 'مختبر المنطق',
                                '11' => 'اللغة الانكليزية',
                                '12' => '' // حقوق انسان
                            ];
                        }
                        // 
                        if( $auv == 2 ){
                            $n=13; $n2=23;
                            $lec = [
                                '13' => 'فراغ',
                                '14' => 'مجالات',
                                '15' => 'الكترونيك',
                                '16' => 'تصاميم',
                                '17' => 'اساسيات الاتصالات',
                                '18' => 'برمجة',
                                '19' => 'تحليلات هندسية',
                                '20' => 'ادارة صناعية',
                                '21' => 'اشارة ونظم',
                                '22' => 'مختبر الكترونيك',
                                '23' => 'مختبر تصاميم'
                            ];
                        }
                        // 
                        if( $auv == 3 ){
                            $n=24; $n2=33;
                            $lec = [
                                '24' => 'فراغ',
                                '25' => 'قياسات',
                                '26' => 'اتصالات رقمية',
                                '27' => 'سيطرة',
                                '28' => 'موجات',
                                '29' => 'DSP',
                                '30' => 'الكترونيات الاتصالات',
                                '31' => 'معالجات',
                                '32' => 'مختبر اتصالات',
                                '33' => 'مختبر DSP',
                                '34' => 'فراغ',
                                '35' => 'فراغ'
                            ];
                        }
                        // 
                        if( $auv == 4 ){
                            $n=36; $n2=43;
                            $lec = [
                                '36' => 'فراغ',
                                '37' => 'هوائيات',
                                '38' => 'ضوئية',
                                '39' => 'امنة',
                                '40' => 'اقمار',
                                '41' => 'انظمة',
                                '42' => 'مختبر اتصالات',
                                '43' => 'مختبر DSP',
                                '44' => 'فراغ',
                                '45' => 'فراغ'

                            ];
                        }
                    }else{
                        echo "<h2>" . "اختر صفا رجاءً" . "</h2>";
                    }
                ?>
                <div class="col-12 col-md-9 col-lg-9">
                <!--  -->
                    <?php 
                    if( isset($_GET['auv']) && isset($_GET['buv']) ){
                        $auv = $_GET['auv'];
                        $buv = $_GET['buv'];
                    ?>
                        <h3> 
                            <?php
                            if($auv === "1"){
                                echo '<div class="text-primary ">' . "الأول" . $buv . "</div>";
                            }elseif($auv === "2"){
                                echo '<div class="text-success ">' . "الثاني" . $buv . "</div>";
                            }elseif($auv === "3"){
                                echo '<div class="text-warning ">' . "الثالث" . $buv . "</div>";
                            }elseif($auv === "4"){
                                echo '<div class="text-danger ">' . "الرابع" . $buv . "</div>";
                            }
                            ?>
                        </h3>
                        <hr>
                        <!-- <iframe src="t2.php" frameborder="0" width="100%" height="100%"></iframe> -->
                    <?php
                    include "t2.php";
                        if( isset($_GET["schedulebtn"]) ){
                            echo "success";
                        }
                        for($i=0; $i<5; $i++){ ?>
                        <div> 
                            <hr>
                            <div> <span> يوم <?php echo $days[$i] ?> </span> </div>   
                            <form class=" pt-5 pr-0 pl-0 row" action="<?php echo $_SERVER["PHP_SELF"]; ?>?do=schedule" method="GET"> 
                                <div class="col-sm-12 col-md-3 col-lg-3 center"> 
                                    <span> المحاضرة الاولى </span>
                                    <select class="btn btn-dark" name="" id="">
                                        <option value="" disabled> اختر مادة </option>
                                    <?php $nr=$n; while( $n <= $n2  ){ ?>
                                        <option value="<?php echo $n ?>"> <?php echo $lec[$n]; ?> </option>
                                    <?php $n++; } ?>
                                    </select> 
                                    <div class="center">
                                        من: <input class="btn btn-primary" type="time" name="" id="">
                                    </div>
                                    <div class="center">
                                        الى: <input class="btn btn-danger" type="time" name="" id="">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-sm-12 col-md-3 col-lg-3 center"> 
                                    <span> المحاضرة الثانية</span>
                                    <select class="btn btn-dark" name="" id="">
                                        <option value="" disabled> اختر مادة </option>
                                    <?php $n=$nr; while( $n <= $n2  ){ ?>
                                        <option value="<?php echo $n ?>"> <?php echo $lec[$n]; ?> </option>
                                    <?php $n++; } ?>
                                    </select> 
                                    <div class="center">
                                        من: <input class="btn btn-primary" type="time" name="" id="">
                                    </div>
                                    <div class="center">
                                        الى: <input class="btn btn-danger" type="time" name="" id="">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-sm-12 col-md-3 col-lg-3 center"> 
                                    <span> المحاضرة الثالثة </span>
                                    <select class="btn btn-dark" name="" id="">
                                        <option value="" disabled> اختر مادة </option>
                                    <?php $n=$nr; while( $n <= $n2  ){ ?>
                                        <option value="<?php echo $n ?>"> <?php echo $lec[$n]; ?> </option>
                                    <?php $n++; } ?>
                                    </select> 
                                    <div class="center">
                                        من: <input class="btn btn-primary" type="time" name="" id="">
                                    </div>
                                    <div class="center">
                                        الى: <input class="btn btn-danger" type="time" name="" id="">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-sm-12 col-md-3 col-lg-3 center"> 
                                    <span> المحاضرة الرابعة </span>
                                    <select class="btn btn-dark" name="" id="">
                                        <option value="" disabled> اختر مادة </option>
                                    <?php $n=$nr; while( $n <= $n2  ){ ?>
                                        <option value="<?php echo $n ?>"> <?php echo $lec[$n]; ?> </option>
                                    <?php $n++; } $n=$nr; ?>
                                    </select> 
                                    <div class="center">
                                        من: <input class="btn btn-primary" type="time" name="" id="">
                                    </div>
                                    <div class="center">
                                        الى: <input class="btn btn-danger" type="time" name="" id="">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="center w-100">
                                    <button class="btn btn-success w-25" type="submit" name="schedulebtn"> حفظ </button>
                                </div>
                            </form> 
                        </div>
                    <?php }  } ?>
                <!--  -->
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
onload = () => {
    let cell = document.querySelectorAll('.cell');
    for (var i=0; i<cell.length; i++){
        cell[i].innerHTML = '<select class=" bg-none select-sch" name="" id="">'
            +'<option value="" disabled> اختر مادة </option>'
            +'<?php $n=$nr; while( $n <= $n2  ){ ?>'
            +'<option value="<?php echo $n ?>"> <?php echo $lec[$n]; ?> </option>'
            +'<?php $n++; } ?>'
            +'</select>';
    }
}
</script>

<!-- footer include -->
<?php
include "templates/footer.php";
?>