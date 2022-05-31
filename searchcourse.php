<script>
    function over() {
    var titleObject = document.getElementById("pageTitle");
    titleObject.style.fontSize = "20px";
    }
    function out() {
    var titleObject = document.getElementById("pageTitle");
    titleObject.style.fontSize = "16px";
    }
</script>

<?php
    session_start();
    include('connect.php');

    $keyword = $_GET["search"];

    $stmt = $pdo->prepare("SELECT * FROM course JOIN class on course.course_ID = class.course_ID WHERE course.course_ID LIKE '%$keyword%'");
    $stmt->execute();
  
?>
<table >
    <thead>
        <th>รหัสวิชา</th>
        <th>ตอน</th>
        <th>รายชื่อวิชา</th>
        <th>หน่วยกิต</th>
        <th>เวลาเรียน</th>
        <th>อาจารย์ผู้สอน</th>
        <th>จำนวนนศ.</th>
        <th>จำนวนที่รับ</th>
        <th></th>
    </thead>
    <?php
        while($row=$stmt->fetch()){
            $teach_id= $row['Teach_ID'];
            $stmt1 = $pdo->prepare("SELECT * FROM teacher WHERE Teach_ID= '$teach_id'");
            $stmt1->execute();
            $row1= $stmt1->fetch();
    ?>
    <tr>
        <td data-labe="รหัสวิชา"><?= $row['course_ID']?></td>
        
        <td data-labe="ตอน"><?= $row['class_name']?></td>
        
        <td data-labe="รายชื่อวิชา"><?= $row['course_name']?></td>
        <td data-labe="หน่วยกิต"><?= $row['credit']?></td>
        <td data-labe="เวลาเรียน"><?= $row['day']?> <?= $row['time_start']?> <br> <?= $row['time_end']?></td>
        <td data-labe="อาจารย์ผู้สอน"><?= $row1['Teach_name']?></td>
        <td data-labe="จำนวนนศ."><?= $row['Total_Rg_st']?></td>
        <td data-labe="จำนวนที่รับ"><?= $row['Total_Rg_st_max']?></td>
        <th ><a href="Registerdata.php?classid=<?= $row['class_ID']?>" style="text-decoration: none; color: rgb(255, 255, 255);" onmouseover="over()" onmouseout="out()">เพิ่มรายวิชา</a></th>
    </tr>

    <?php
        }
    ?>
    
</table>
