<?php
include "../templates/header.php";

$name = $_GET["name"];
if( !empty($name) ){

    $sql = "SELECT * FROM `users` WHERE `name` LIKE '%$name%' LIMIT 5";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
            <a class="jjjj" href="registers.php?id=<?php $ra = rand(999, 99999); echo $row['id'] * $ra * 58754.9754277456 / 42.9869456903?>&k=<?php echo $ra; ?>&name=<?php echo $row['name']; ?>">
                <?php echo $row["name"]; ?>
            </a>
            <br>
        <?php
    }
    } else {
    echo "<div class='text-danger h5' >" . "لا يوجد طلاب بهذا الاسم" . "</div>";
    }
}else{
    echo "";
}
$con->close();

?>