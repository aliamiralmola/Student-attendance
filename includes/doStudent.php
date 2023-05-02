<h1>إدارة الطلبة</h1>
<hr>
<div class="row">
    <!-- list -->
    <div class="col-sm-12 col-md-4 col-lg-3 ">
        <?php 
        $query = mysqli_query($con, "SELECT * FROM `stages` ORDER BY `stages`.`stage` ASC, `stages`.`division` ASC");
        while($row = mysqli_fetch_assoc($query)){ 
        ?>
        <a href="?do=stage&auv=<?php echo $row['stage']; ?>&buv=<?php echo $row['division'];?>">
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
    <!-- contents -->
    <?php if($do == 'students'){ ?>
    <div class="col-sm-12 col-md-8 col-lg-9">
        <div class="row">
            <div class="w-100" id="alerthidden2">
            <script>
                setTimeout(() => {
                    document.getElementById('alerthidden2').style.display="none";
                }, 5000);
            </script>
            <?php
                // اضافة صف جديد
                if( isset($_GET['stage']) ){
                    include "includes/addstage.php";
                }
            ?>
            </div>
        <!-- //////////////////////////////////////////////////////////////////// -->
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
            <!-- إضافة صف جديد -->
            <div class="w-100"></div>
            <div class="col-sm-12 col-md-4 col-lg-3 p-2">
                <div onclick="hid4show('addclassUI', 'addclass')" id="addclassUI" class="border shadow-padding center h5 text-primary">
                    صف جديد <i class=" fa fa-add"></i>
                </div>
                <!--  -->
                <div id="addclass" class="border none">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET"> 
                        <!-- اختيار الصف -->
                        <label for="stageSelect">الصف: </label>
                        <select name="stage" id="stageSelect" class="btn">
                            <option value="0" disabled="true">اختر صفا</option>
                            <option value="1">الاول</option>
                            <option value="2">الثاني</option>
                            <option value="3">الثالث</option>
                            <option value="4">الرابع</option>
                        </select>
                        <!--  -->
                        <br> <br>
                        <!-- اختيار الشعبة -->
                        <label for="divisionSelect">الشعبة: </label>
                        <select name="division" id="divisionSelect" class="btn">
                            <option value="0" disabled="true">اختر شعبة</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <!-- زر الادخال -->
                        <button class="btn btn-success w-100 mt-2" type="submit">اضافة</button>
                        <br>
                        <button onclick="hid4show('addclass', 'addclassUI')" class="btn btn-danger w-100 mt-2" type="reset">الغاء</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <?php }elseif($do == 'stage'){ ?>
    <div class="col-sm-12 col-md-8 col-lg-9">
        <div class="row">
            <div class=" col-sm-12 col-md-12 col-lg-12"> 
                <?php
                if( isset( $_GET['auv'] ) && isset( $_GET['buv'] ) ){
                ?>
                <div id="perfomeAlert">
                <!-- هنا تطبع النواتج العائدة من الاجاكس -->
                <div class="ajaxresult"></div>
                
                <?php    
                    // اضافة طالب جديد
                    if( isset($_POST['addnewstudent']) ){
                        include "includes/addnewstudent.php";
                    }
                    // انجاح الجميع
                    if( isset($_POST['passall'] ) ){
                        include "includes/passall.php";
                    }
                    // ارجاع الجميع
                    if( isset($_POST['backall'] ) ){
                        include "includes/backall.php";
                    }
                    // إرجاع اخر اضافة
                    if( isset( $_POST['backEndAdd'] ) ){
                        include 'includes/backEndAdd.php';
                    }
                    // تبديل الشعبة
                    if( isset($_POST['divisionExchange']) ){
                        include 'includes/divisionExchange.php';
                    }
                    // حذف الجميع
                    if( isset($_POST['deleteAll']) ){
                        include "includes/deleteAll.php";
                    }
                    
                ?>
                    <!-- اخفاء الاشعار بعد 5 ثوان من ظهوره -->
                    <script>
                        setTimeout(() => {
                            document.getElementById('perfomeAlert').style.display="none";
                        }, 5000);
                    </script>
                </div>
                    <?php
                    // //////////////////
                    $stagenum = $_GET['auv'];
                    $stagedivision = $_GET['buv'];

                    $query = mysqli_query($con, "SELECT * FROM `users` WHERE `stage`='$stagenum' AND `division`='$stagedivision' ORDER BY `users`.`name` ASC");
                    $stunum = mysqli_num_rows($query);
                    ?>
                    <div>
                        <h3>
                            <span> <?php if( $_GET['auv'] == 1 ){ echo 'الصف ' . 'الاول' . " " . $_GET['buv']; }?> <span>
                            <span> <?php if( $_GET['auv'] == 2 ){ echo 'الصف ' . 'الثاني' . " " . $_GET['buv']; }?> <span>
                            <span> <?php if( $_GET['auv'] == 3 ){ echo 'الصف ' . 'الثالث' . " " . $_GET['buv']; }?> <span>
                            <span> <?php if( $_GET['auv'] == 4 ){ echo 'الصف ' . 'الرابع' . " " . $_GET['buv']; }?> <span>
                        </h3>
                        <br>
                        <span> عدد الطلاب: <?php  echo $stunum; ?> </span>
                        <input class=" alert" placeholder="ابحث عن طالب" type="search"  id="SSI" oninput="searcher( 'SSI', 'ST' )">
                        <button class="alert btn-light" onclick="searcher( 'SSI', 'ST' )" ><i class="fa fa-search"></i></button>
                        <!-- ////////////////////////// -->
                        <br> <br>
                        <div class="list1 mb-4">
                            <div class=" btn btn-outline-light" onclick="hid4show('hidden', 'addStudentForm')">
                                <span class="p-2 m-0 text-dark">
                                    <span>اضافة طالب</span>
                                    <i class=" text-primary fa fa-add"></i>
                                </span>
                            </div>
                            <div class=" btn btn-outline-light" onclick="hid4show('hidden', 'passAll')">
                                <span class="p-2 m-0 text-dark">
                                    <span>إنجاح الجميع</span>
                                    <i class="text-success fa fa-up-long"></i>
                                </span>
                            </div>
                            <div class=" btn btn-outline-light" onclick="hid4show('hidden', 'backAll')">
                                <span class="p-2 m-0 text-dark">
                                    <span>إرجاع الجميع</span>
                                    <i class="text-danger fa fa-down-long"></i>
                                </span>
                            </div>
                            <div class=" btn btn-outline-light" onclick="hid4show('hidden', 'backEndAdd')">
                                <span class="p-2 m-0 text-dark">
                                    <span>إرجاع اخر اضافة</span>
                                    <i class="text-danger fa fa-turn-down"></i>
                                </span>
                            </div>
                            <div class=" btn btn-outline-light" onclick="hid4show('hidden', 'divisionExchange')">
                                <span class="p-2 m-0 text-dark">
                                    <span>نقل الجميع الى شعبة اخرى</span>
                                    <i class="text-primary fa fa-exchange"></i>
                                </span>
                            </div>
                            <div class=" btn btn-outline-light">
                                <span class="p-2 m-0 text-dark" onclick="hid4show('hidden', 'deleteAll')">
                                    <span>حذف الجميع</span>
                                    <i class=" text-danger fa fa-cancel"></i>
                                </span>
                            </div>
                        </div>
                        <!-- //////////////// -->
                        <div id="hidden"></div>
                        <!-- مربع اضافة طالب -->
                        <form id="addStudentForm" action="<?php echo $_SERVER["PHP_SELF"] . "?do=" . $do . "&auv=" . $_GET['auv'] . "&buv=" . $_GET['buv']; ?>" method="post" class=" border p-2 shadow-padding none">
                            <div>
                                <h3 class="">اضافة طالب</h3>
                            </div>
                            <div>
                                <label for="studentnameinput">اسـم الـطـالـب: </label>
                                <input class=" alert" type="text" name="studentNameInput" id="studentnameinput" placeholder="اسم الطالب">
                            </div>
                            <div>
                                <label for="taginput">معرف البطاقة: </label>
                                <input class=" alert" type="text" name="taginput" id="taginput" placeholder="معرف البطاقة (tag)">
                            </div>
                            <div>
                                <label for="studentbrithinput">تأريخ الميلاد: </label>
                                <input type="date" name="studentBrithInput" id="studentbrithinput" placeholder="تأريخ الميلاد">
                            </div>
                            <div>
                                <label for="studentstageinput">الصف: </label>
                                <input type="text" disabled name="" id="studentstageinput" placeholder="الصف" value="<?php if($_GET['auv'] == 1){echo 'الاول';}
                                                                                                                        elseif($_GET['auv'] == 2){echo 'الثاني';}
                                                                                                                        elseif($_GET['auv'] == 3){echo 'الثالث';}
                                                                                                                        elseif($_GET['auv'] == 4){echo 'الرابع';} ?>">
                            </div>
                            <div>
                                <label for="studentdivisioninput">الشعبة: </label>
                                <input type="text" disabled name="" id="studentdivisioninput" placeholder="الصف" value="<?php echo $_GET['buv']; ?>">
                            </div>
                            <div>
                                <br>
                                <button class="btn btn-success w-25" type="submit" name="addnewstudent"> إضافة </button>
                                <br> <br>
                                <button class="btn btn-warning w-25" type="reset"> إخلاء الحقول</button>
                                <button class="btn btn-danger w-25" type="reset" onclick="hid4show('addStudentForm', 'hidden')"> إلغاء </button>
                            </div>
                        </form>
                        <!-- انجاح الجميع -->
                        <form id="passAll" class="border none shadow-padding" action="<?php echo $_SERVER['PHP_SELF'] . '?do=' . $do . "&auv=" . $_GET['auv'] . "&buv=" . $_GET['buv'];?>" method="post">
                            <div class=" alert center h3">
                                <?php 
                                    $stage = $_GET['auv'];
                                    $division = $_GET['buv'];
                                    $newStage = $stage + 1;
                                    echo 'سيتم إنجاح جميع الطلبة ونقلهم الى ';
                                    if($stage == 1){
                                        echo 'الثاني' . $division;
                                    }
                                    elseif($stage == 2){
                                        echo 'الثالث' . $division;
                                    }
                                    elseif($stage == 3){
                                        echo 'الرابع' . $division;
                                    }
                                    elseif($stage == 4){
                                        echo 'سجل الخريجين';
                                    }
                                ?>
                            </div>
                            <?php if( $stage < 4 ){ ?>
                            <div class="center " >
                                <span id="changedivisionbutton" class="btn text-primary" onclick="hid4show('changedivisionbutton', 'changedivisiondiv', false)">تغيير الشعبة</span>
                                <div class="none1 center" id="changedivisiondiv">
                                    <label for="newdivisioninput">الشعبة الجديدة: </label>
                                    <select class="alert" id="newdivisioninput" name="newdivision">
                                        <option value="0" disabled="true">اختر شعبة</option>
                                        <option value="<?php echo $division; ?>"><?php echo $division; ?></option>
                                        <?php 
                                        $testquery = mysqli_query($con, "SELECT * FROM `stages` WHERE `stage`='$newStage' ORDER BY `stages`.`division` ASC");
                                        while( $row = mysqli_fetch_assoc($testquery) ){
                                            if( $row['division'] != $division ){
                                        ?>
                                            <option value="<?php echo $row['division']; ?>"><?php echo $row['division']; ?></option>
                                        <?php } } ?>
                                    </select>
                                    <div class=" alert center"> <b class=" text-primary">ملاحظة: </b> اذا لم تكن الشعبة موجودة فسيتم انشاؤها تلقائيا.</div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="center mb-5 mt-5">
                                <button class="btn btn-success w-25" type="submit" name="passall"> إنجاح </button>
                                <button class="btn btn-danger w-25" type="reset" onclick="hid4show('passAll', 'hidden')"> إلغاء </button>
                            </div>
                        </form>
                        <!-- ارجاع الجميع -->
                        <form id="backAll" class="border none shadow-padding" action="<?php echo $_SERVER['PHP_SELF'] . '?do=' . $do . "&auv=" . $_GET['auv'] . "&buv=" . $_GET['buv'];?>" method="post">
                            <div class=" alert center h3">
                                <?php 
                                    $stage = $_GET['auv'];
                                    $division = $_GET['buv'];
                                    $newStage = $stage - 1;
                                    if($stage != 1){
                                        echo 'سيتم ارجاع جميع الطلبة ونقلهم الى ';
                                    }else{
                                        echo 'الطلاب في المرحلة الاولى ولا يمكن ارجاعهم';
                                    }
                                    if($stage == 2){
                                        echo 'الاول' . $division;
                                    }
                                    elseif($stage == 3){
                                        echo 'الثاني' . $division;
                                    }
                                    elseif($stage == 4){
                                        echo 'الثالث' . $division;
                                    }
                                    
                                ?>
                            </div>
                            <?php if( $stage > 1 ){ ?>
                            <div class="center " >
                                <span id="changedivisionbutton1" class="btn text-primary" onclick="hid4show('changedivisionbutton1', 'changedivisiondiv1', false)">تغيير الشعبة</span>
                                <div class="none1 center" id="changedivisiondiv1">
                                    <label for="newdivisioninput1">الشعبة الجديدة: </label>
                                    <select class="alert" id="newdivisioninput1" name="newdivision1">
                                        <option value="0" disabled="true">اختر شعبة</option>
                                        <option value="<?php echo $division; ?>"><?php echo $division; ?></option>
                                        <?php 
                                        $testquery = mysqli_query($con, "SELECT * FROM `stages` WHERE `stage`='$newStage' ORDER BY `stages`.`division` ASC ");
                                        while( $row = mysqli_fetch_assoc($testquery) ){
                                            if( $row['division'] != $division ){
                                        ?>
                                            <option value="<?php echo $row['division']; ?>"> <?php echo $row['division']; ?> </option>
                                        <?php } } ?>
                                    </select>
                                    <div class=" alert center"> <b class=" text-primary">ملاحظة: </b> اذا لم تكن الشعبة موجودة فسيتم انشاؤها تلقائيا.</div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="center mb-5 mt-5">
                                <?php if($stage != 1){ ?>
                                <button class="btn btn-dark w-25" type="submit" name="backall"> ارجاع </button>
                                <?php } ?>
                                <button class="btn btn-danger w-25" type="reset" onclick="hid4show('backall', 'hidden')"> إلغاء </button>
                            </div>
                        </form>
                        <!-- ارجاع اخر اضافة -->
                        <form id="backEndAdd" class="border none shadow-padding" action="<?php echo $_SERVER['PHP_SELF'] . '?do=' . $do . "&auv=" . $_GET['auv'] . "&buv=" . $_GET['buv'];?>" method="post">                                            
                            <div class="center mb-5 mt-5">
                                <div class=" alert center h3">
                                    سيتم ارجاع جميع الطلاب الذين تمت اضافتهم مؤخرا الى صفهم السابق 
                                </div>
                                <button class="btn btn-dark w-25" type="submit" name="backEndAdd"> ارجاع </button>
                                <button class="btn btn-danger w-25" type="reset" onclick="hid4show('backEndAdd', 'hidden')"> إلغاء </button>
                            </div>
                        </form>
                        <!-- تبديل الشعب -->
                        <form id="divisionExchange" class="border none shadow-padding" action="<?php echo $_SERVER['PHP_SELF'] . '?do=' . $do . "&auv=" . $_GET['auv'] . "&buv=" . $_GET['buv'];?>" method="post">                                            
                            <div class="center mb-5 mt-5">
                                <div class=" alert center h3">
                                    اختر الشعبة الجديدة
                                </div>
                                <div class="center">
                                    <select class="alert" id="newdivisioninput2" name="newdivision2">
                                        <option value="0" disabled="true">اختر شعبة</option>
                                        <?php 
                                        $testquery = mysqli_query($con, "SELECT * FROM `stages` WHERE `stage`='$stage' ORDER BY `stages`.`division` ASC ");
                                        while( $row = mysqli_fetch_assoc($testquery) ){
                                            if( $row['division'] != $division ){
                                        ?>
                                            <option value="<?php echo $row['division']; ?>"> <?php echo $row['division']; ?> </option>
                                        <?php } } ?>
                                    </select>
                                </div>
                                <button class="btn btn-primary w-25" type="submit" name="divisionExchange"> نقل </button>
                                <button class="btn btn-danger w-25" type="reset" onclick="hid4show('divisionExchange', 'hidden')"> إلغاء </button>
                            </div>
                        </form>
                        <!-- حذف الجميع -->
                        <form id="deleteAll" class="border none shadow-padding" action="<?php echo $_SERVER['PHP_SELF'] . '?do=' . $do . "&auv=" . $_GET['auv'] . "&buv=" . $_GET['buv'];?>" method="post">                                            
                            <div class="center mb-5 mt-5">
                                <div class=" alert center h3">
                                    سيتم حذف الجميع نهائيا ولن تستطيع استعادتهم
                                </div>
                                <button class="btn btn-warning w-25" type="submit" name="deleteAll"> حذف </button>
                                <button class="btn btn-danger w-25" type="reset" onclick="hid4show('deleteAll', 'hidden')"> إلغاء </button>
                            </div>
                        </form>
                    </div>
                    <!-- جدول بيانات الطلبة -->
                    <table class="table table-striped" id="ST">
                        <thead>
                            <tr class="tr1 center">
                                <th scope="col">#</th>
                                <th scope="col">الاسم</th>
                                <th scope="col">tag</th>
                                <th scope="col">تأريخ الميلاد</th>
                                <th scope="col">اجراءات</th>
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
                                <td class="td1 center"><?php echo $row['name']; ?></td>
                                <td class="td1 center"> 
                                    <?php echo $row['tags']; ?>
                                    <!-- <form action="" method="get">
                                        <input class="btn btn-ligth" type="text" name="" id="" value="<?php echo $row['tags']; ?>">
                                        <button type="button" onclick="hid4show(hid, show, none)"> تغيير </button>
                                        <button type="submit" class="btn btn-success none"> حفظ </button>
                                    </form> -->
                                </td>
                                <td class="td1 center"><?php echo $row['birth']; ?></td>
                                <td class="td1 center">
                                    <!-- <a class="pl-1 text-primary" href="edit.php?id=<?php $ra = rand(999, 99999); echo $row['id'] * $ra * 58754.9754277456 / 42.9869456903?>&k=<?php echo $ra; ?>">تعديل<i class="fa fa-edit"></i></a> -->
                                    <a class="pr-1 text-info " href="registers.php?id=<?php $ra = rand(999, 99999); echo $row['id'] * $ra * 58754.9754277456 / 42.9869456903?>&k=<?php echo $ra; ?>&name=<?php echo $row['name']; ?>">السجل<i class="fa fa-history"></i></a>
                                    <a class="pr-1 text-success hand"  href="./ajax/pass.php?id=<?php echo $id; ?>&stage=<?php echo $_GET['auv']; ?>&division=<?php echo $_GET['buv']; ?>" >نجح<i class="fa fa-up-long"></i></a>
                                    <?php if( $_GET['auv'] != 1){ ?>
                                        <a class="pr-1 text-danger hand" href="./ajax/back.php?id=<?php echo $id; ?>&stage=<?php echo $_GET['auv']; ?>&division=<?php echo $_GET['buv']; ?>">ارجاع<i class="fa fa-down-long"></i></a>
                                    <?php } ?>
                                    <a class="pr-1 text-dark hand" href="./ajax/del.php?id=<?php echo $id; ?>&stage=<?php echo $_GET['auv']; ?>&division=<?php echo $_GET['buv']; ?>">حذف<i class="fa fa-user-xmark"></i></a>
                                    <!-- onclick="ajax('ajax/pass.php?id=<?php echo $id; ?>', 'ajaxresult')" -->
                                    <!-- <button type="button" onclick="ajax()"> انجاح </button> -->
                                    <script>
                                        // function ajax() {
                                        //     const ajax = new XMLHttpRequest();
                                        //     ajax.onload = function() {
                                        //         //document.getElementById("ajaxresult").innerHTML = this.responseText;
                                        //         alert(this.responseText);
                                        //     }
                                        //     ajax.open("GET", "./ajax/back.php?id=<?php echo $row['id']; ?>&stage=<?php echo $row['stage']; ?>", true);
                                        //     ajax.send();
                                        // }
                                    </script>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php
                }else{
                    echo '<div class="alert alert-warning">
                    لم يتم ايجاد الصف المقصود !!! هناك خطأ في الرابط. 
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>