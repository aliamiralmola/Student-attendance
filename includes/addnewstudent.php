<?php
if( !empty($_POST['studentNameInput']) ){
    $stuName = $_POST['studentNameInput'];
    if( !empty($_POST['taginput']) ){
        $tag = $_POST["taginput"];
        $testquery = mysqli_query($con, "SELECT * FROM `users` WHERE `tags`='$tag' ");
        $numOftest = mysqli_num_rows($testquery);
        if( $numOftest == 0 ){
            if( !empty($_POST['studentBrithInput']) ){
                $stuBrith = $_POST['studentBrithInput'];
                $stage = $_GET['auv'];
                $division = $_GET['buv'];
                $exh = $stage . $division . ',';

                $testquery = mysqli_query($con, "SELECT * FROM `users` WHERE `name`='$stuName' AND 
                                                                `birth`='$stuBrith' AND 
                                                                `stage`='$stage' AND 
                                                                `division`='$division' ");
                $numOftest = mysqli_num_rows($testquery);
                if( $numOftest == 0 ){
                    $query = mysqli_query($con, "INSERT INTO `users` (`id`, `name`, `birth`, `stage`, `division`, `admin`, `exchangeHistory`, `tags`) 
                                                        VALUES (NULL, '$stuName', '$stuBrith', '$stage', '$division', '0', '$exh', '$tag' )");
                    if($query){
                        echo '<div class="alert alert-success">' . 'تمت الاضافة بنجاح' . '</div>';
                    }else{
                        echo '<div class="alert alert-danger">' . 'فشلت الاضافة، هناك خطأ في الخادم او قاعدة البيانات' . '</div>'; 
                    }
                }else{
                    echo '<div class="alert alert-info">' . 'الطالب ' . '<b class=" text-danger">' . $stuName . '</b>' . ' موجود بالفعل مسبقا' . '</div>'; 
                }

            }else{
                echo '<div class="alert alert-danger">' . 'تعذرت الاضافة! لم أجد تأريخ الميلاد في الحقل المخصص. ' . '</div>'; 
            }
        }else{
            echo '<div class="alert alert-danger">' . 'تعذرت الاضافة! لان معرف البطاقة مستخدم لشخص اخر. ' . '</div>'; 
        }
    }else{
        echo '<div class="alert alert-danger">' . 'تعذرت الاضافة! لم أجد معرف البطاقة في الحقل المخصص. ' . '</div>'; 
    }
}else{
    echo '<div class="alert alert-danger">' . 'تعذرت الاضافة! لم أجد اسم الطالب في الحقل المخصص. ' . '</div>'; 
}