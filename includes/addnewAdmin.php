<?php
if( !empty($_POST['AdminNameinput']) ){
    $adminName = $_POST['AdminNameinput'];

    if( !empty($_POST['AdminBrithinput']) ){
        $AdminBrith = $_POST['AdminBrithinput'];
        $stage = null;
        $division = null;

        if( !empty($_POST['admin']) ){
            $admin = $_POST['admin'];

            if( !empty($_POST['classes']) ){
                $class = $_POST['classes']; 
                $classes = "";
                for($i=0; $i<count($class); $i++){
                    $classes = $classes . $class[$i] . ",";
                }
            }else{
                echo '<div class="alert alert-success">' . 'لم يتم تحديد اي صف' . '</div>';
                $classes = 0;
            }

            $testquery = mysqli_query($con, "SELECT * FROM `users` WHERE `name`='$adminName' AND `birth`='$AdminBrith' AND (`admin`=1 OR `admin`=9) ");
            $numOftest = mysqli_num_rows($testquery);
            if( $numOftest == 0 ){
                $query = mysqli_query($con, "INSERT INTO `users` (`id`, `name`, `birth`, `stage`, `division`, `admin`, `exchangeHistory`) 
                                                    VALUES (NULL, '$adminName', '$AdminBrith', '$stage', '$division', '$admin', '$classes')");
                if($query){
                    echo '<div class="alert alert-success">' . 'تمت الاضافة بنجاح' . '</div>';
                }else{
                    echo '<div class="alert alert-danger">' . 'فشلت الاضافة، هناك خطأ في الخادم او قاعدة البيانات' . '</div>'; 
                }
            }else{
                echo '<div class="alert alert-info">' . 'المشرف ' . '<b class=" text-danger">' . $adminName . '</b>' . ' موجود بالفعل مسبقا' . '</div>'; 
            }
        }else{
            echo '<div class="alert alert-danger">' . 'تعذرت الاضافة! لم أجد الرتبة في الحقل المخصص. ' . '</div>'; 
        }
    }else{
        echo '<div class="alert alert-danger">' . 'تعذرت الاضافة! لم أجد تأريخ الميلاد في الحقل المخصص. ' . '</div>'; 
    }
}else{
    echo '<div class="alert alert-danger">' . 'تعذرت الاضافة! لم أجد الاسم في الحقل المخصص. ' . '</div>'; 
}