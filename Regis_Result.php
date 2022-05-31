<?php include('connect.php'); ?>
<?php
    session_start();
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: Index.php');
    }
    if(!($_SESSION['username'])){
        header('location: Index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListStudent</title>
    
    <link rel="stylesheet" href="style/stylepagestudent1.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Newsreader:wght@200;400&family=Prompt:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <header class="Top_Header">
        
        <div class="Logo">
            <img src="..//web_miniproject/img/Logo.png" alt="" >
        </div>
        <div class="Bot">
            <div class="Top_Title">
                <h1><b>ระบบสารสนเทศ</b></h1><span>เพื่องานลงทะเบียนนักศึกษา</span> 
                
            </div>
            <div class="Under_Title">KMUTNB REGISRATION INFORMATION SYSTEM</div> 
        </div>
        
        
    </header>
    <div class="Content">
    <h3 style="font-size: 17px; text-align: center;">ผู้ใช้ : <?php echo $_SESSION['username'];?> </h3>
        <nav class="Nav_Button">
            <a href="Add_Course.php">ลงวิชาเรียน</a>&nbsp; | &nbsp;
            <a href="Unset_Course.php">ถอนวิชาเรียน</a>&nbsp; | &nbsp;
            <a href="Regis_Result.php">ผลลงทะเบียน</a>&nbsp; | &nbsp;
            
            <a href="Timetable.php">ตารางเรียน</a>&nbsp; | &nbsp;
            <a href="Student.php">ข้อมูลนักศึกษา</a>&nbsp; | &nbsp;
            <a href="Index.php?logout='1'">ออกจากระบบ</a>               
        </nav>
        <section class="Content_Space" style="text-align: center;">
        
            
            
                <div id="Content_Title">ผลลงทะเบียน</div>
                    <div class="Table">
                        <table>
                            <thead>
                                
                                <th>รหัสวิชา</th>
                                <th>ตอน</th>
                                <th>รายวิชา</th>
                                <th>หน่วยกิต</th>
                                <th>วัน-เวลาเรียน</th>
                                
                            </thead>
                            
                            
                            <?php
                                $stdid= $_SESSION['username'];
                                $sumcredit=0;
                                $stmt = $pdo->prepare("SELECT * FROM register WHERE std_ID='$stdid'");
                                $stmt->execute();
                                while($row=$stmt->fetch()){

                                    $class_id= $row['class_ID'];
                                    $stmt1 = $pdo->prepare("SELECT * FROM course join class on course.course_ID = class.course_ID 
                                                            WHERE class.class_ID= '$class_id'");
                                    $stmt1->execute();
                                    $row1= $stmt1->fetch();
                                    $sumcredit=$sumcredit + $row1['credit'];
                            ?>
                            <tr>
                                <td data-labe="รหัสวิชา"><?= $row1['course_ID']?></td>
                                <td data-labe="ตอน"><?= $row1['class_name']?></td>
                                <td data-labe="รายวิชา"><?= $row1['course_name']?></td>
                                <td data-labe="หน่วยกิต"><?= $row1['credit']?></td>
                                <td data-labe="วัน-เวลาเรียน"><?= $row1['day']?> <?= $row1['time_start']?> <br> <?= $row1['time_end']?></td>
                            </tr>
                            <?php
                                }
                            ?>
                            
                                

                            <tr>
                                <td colspan="4">รวมจำนวนหน่วยกิต</td>
                                <td colspan="3"><?= $sumcredit?></td>
                                
                            </tr>
                        </table>
                </div>
                
            
            
        
        </section>
    </div>
</body>
</html>