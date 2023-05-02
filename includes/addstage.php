<?php
if( isset($_GET['division']) ){
    if( !empty($_GET['stage']) ){
        if( !empty($_GET['division']) ){
            $stage = $_GET['stage'];
            $division = $_GET['division'];
            $query = mysqli_query($con, "SELECT * FROM `stages` WHERE `stage`='$stage' AND `division`='$division'");
            $stageNum = mysqli_num_rows($query);
            if($stageNum < 1){
                $query = mysqli_query($con, "INSERT INTO `stages` (`id`, `stage`, `division`) 
                                                VALUES (NULL, '$stage', '$division')");
                if( $query ){
                    echo '<div class="alert alert-success"> تمت اضافة الصف بنجاح' . '</div>';
                }else{
                    echo '<div class="alert alert-danger"> فشلت الاضافة،  مشكلة في الاتصال بالخادم' . '</div>';
                }
            }elseif($stageNum == 1){
                echo '<div class="alert alert-warning"> هذا الصف موجود مسبقا' . '</div>';
            }else{
                echo '<div class="alert alert-danger"> تحذير !! الصف مكرر' . $stageNum . ' مرات .. راجع قاعدة البيانات رجاءً.' . '</div>';
            }
        }else{
            echo '<div class="alert alert-warning"> لم تختر الشعبة !' . '</div>';
        }
    }else{
        echo '<div class="alert alert-warning"> لم تختر صفا !' . '</div>';
    }
}