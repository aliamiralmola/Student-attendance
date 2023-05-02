<h1>إدارة المشرفين</h1>
<hr>
<!--  -->
<div id="perfomeAlert1">
<?php
// //////////////////
// اضافة مشرف جديد
if( isset($_POST['addnewAdmin']) ){
    include "includes/addnewAdmin.php";
}
?>
</div>
<!-- اخفاء الاشعار بعد 5 ثوان من ظهوره -->
<script>
    setTimeout(() => {
        document.getElementById('perfomeAlert1').style.display="none";
    }, 5000);
</script>
<?php
// //////////////////////////////////
$query = mysqli_query($con, "SELECT * FROM `users` WHERE (`admin`=1 OR `admin`=9) ORDER BY `users`.`name` ASC");
$adminNum = mysqli_num_rows($query);
?>
<div>
    <span> عدد المشرفين: <?php  echo $adminNum; ?> </span>
    <input class=" alert" placeholder="ابحث عن مشرف" type="search"  id="ASI" oninput="searcher( 'ASI', 'AT' )">
    <button class="alert btn-light" onclick="searcher( 'ASI', 'AT' )"><i class="fa fa-search"></i></button>
</div>
<!--  -->
<div class="list1 mb-4">
    <div class=" btn btn-outline-light" onclick="hid4show('hidden1', 'addAdmin')">
        <span class="p-2 m-0 text-dark">
            <span>اضافة جديد</span>
            <i class=" text-primary fa fa-add"></i>
        </span>
    </div>
</div>
<!--  -->
<div id="hidden1"></div>
<!-- مربع اضافة مشرف -->
<form id="addAdmin" action="<?php echo $_SERVER["PHP_SELF"] . "?do=" . $do; ?>" method="post" class=" border p-2 shadow-padding none">
    <div>
        <h3 class="">اضافة مشرف</h3>
    </div>
    <div>
        <label for="AdminNameinput">الاسم: </label>
        <input class=" alert" type="text" name="AdminNameinput" id="AdminNameinput" placeholder="الاسم">
    </div>
    <div>
        <label for="AdminBrithinput">تأريخ الميلاد: </label>
        <input class="alert" type="date" name="AdminBrithinput" id="AdminBrithinput" placeholder="تأريخ الميلاد">
    </div>
    <div>
        <label for="admin">الرتبة: </label>
        <select class="alert" name="admin" id="admin">
            <option value="9">مشرف عام</option>
            <option value="1">مشرف على بعض الصفوف</option>
        </select>
    </div>
    <div>
        <label for="">الصفوف التي يدرسها</label>
        <div>
        <?php  
            $query = mysqli_query($con, "SELECT * FROM `stages` ORDER BY `stages`.`stage` ASC, `stages`.`division` ASC");
            while($row = mysqli_fetch_assoc($query)){ 
        ?>
            <span class="p-2  tr1">
                <?php  ?>
                <label for="c<?php echo $row['id']; ?>">
                <?php
                if($row['stage'] === "1"){
                    echo "الأول" . " " . $row['division'];
                    $classes = $row['stage'] . $row['division'];
                }elseif($row['stage'] === "2"){
                    echo "الثاني" . " " . $row['division'];
                    $classes = $row['stage'] . $row['division'];
                }elseif($row['stage'] === "3"){
                    echo "الثالث" . " " . $row['division'];
                    $classes = $row['stage'] . $row['division'];
                }elseif($row['stage'] === "4"){
                    echo "الرابع" . " " . $row['division'];
                    $classes = $row['stage'] . $row['division'];
                }
                ?>
                </label>
                <input type="checkbox" name="classes[]" id="c<?php echo $row['id']; ?>" value="<?php echo $classes; ?>" >
            </span>
        <?php } ?>
        </div>
    </div>
    <div>
        <br>
        <button class="btn btn-success w-25" type="submit" name="addnewAdmin"> إضافة </button>
        <br> <br>
        <button class="btn btn-warning w-25" type="reset"> إخلاء الحقول</button>
        <button class="btn btn-danger w-25" type="reset" onclick="hid4show('addAdmin', 'hidden1')"> إلغاء </button>
    </div>
</form>

<!-- جدول بيانات المشرفين -->
<table class="table table-striped" id="AT">
    <thead>
        <tr class="tr1 center">
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">الرتبة</th>
            <th scope="col">الصفوف</th>
            <th scope="col">اجراءات</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php
        $query = mysqli_query($con, "SELECT * FROM `users` WHERE (`admin`=1 OR `admin`=9) ORDER BY `users`.`name` ASC");
        $ii = 0;
        while($row = mysqli_fetch_assoc($query)){
            $ii++;
            $id = $row['id'];
        ?>
        <tr class="tr1">
            <th class="td1 center" scope="row"><?php echo $ii; ?></th>
            <td class="td1 center"><?php echo $row['name']; ?></td>
            <td class="td1 center"><?php 
                if( $row['admin'] == 9){
                    echo '<span class="text-primary alert-primary p-1">' . "مشرف عام" . '</span>';
                }else{
                    echo "تدريسي";
                }
            ?></td>
            <td class="td1 center"><?php 
                if( !empty($row['exchangeHistory']) ){
                    $classes = $row['exchangeHistory'];
                    $len = strlen($classes);
                    for( $i=0; $i<$len; $i++ ){
                        if( ( ($i+1) %3 ) == 0){
                            if( $classes[$i-2] == 1 ){echo "<a href='?do=stage&auv=". $classes[$i-2] . '&buv='. $classes[$i-1] . "' class='p-1 text-primary'>" . "الاول" . $classes[$i-1] . "</a>";}
                            if( $classes[$i-2] == 2 ){echo "<a href='?do=stage&auv=". $classes[$i-2] . '&buv='. $classes[$i-1] . "' class='p-1 text-success'>" . "الثاني" . $classes[$i-1] . "</a>";}
                            if( $classes[$i-2] == 3 ){echo "<a href='?do=stage&auv=". $classes[$i-2] . '&buv='. $classes[$i-1] . "' class='p-1 text-warning'>" . "الثالث" . $classes[$i-1] . "</a>";}
                            if( $classes[$i-2] == 4 ){echo "<a href='?do=stage&auv=". $classes[$i-2] . '&buv='. $classes[$i-1] . "' class='p-1 text-danger'>" . "الرابع" . $classes[$i-1] . "</a>";}
                        }
                    }
                }else{
                    echo "<span class=' text-danger'> لا يوجد </span>";
                }
            ?></td>
            <td class="td1 center">
                <a class="pl-1 text-primary" href="edit.php?id=<?php $ra = rand(999, 99999); echo $row['id'] * $ra * 58754.9754277456 / 42.9869456903?>&k=<?php echo $ra; ?>">تعديل<i class="fa fa-edit"></i></a>
                <?php if( $row['admin'] != 9 ){
                echo '<span class="pr-1 text-success hand" onclick="ajax()" >ترقية<i class="fa fa-up-long"></i></span>';
                } ?>
                <?php if( $row['admin'] != 1 ){
                echo '<span class="pr-1 text-danger hand" >انزال<i class="fa fa-down-long"></i></span>';
                } ?>
                <span class="pr-1 text-dark hand" >حذف<i class="fa fa-user-xmark"></i></span>
                <!-- onclick="ajax('ajax/pass.php?id=<?php echo $id; ?>', 'ajaxresult')" -->
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
