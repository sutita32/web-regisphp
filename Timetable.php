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
    <title>Classroom</title>
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
        <section class="Content_Space">
            <div id="Content_Title">ตารางเรียน</div>
                <div class="Table">
                    <?php
                        
                        
                        
                    ?>
                        <table>
                            <thead>
                                <th>Day</th>
                                <th>8:00</th>
                                <th>9:00</th>
                                <th>10:00</th>
                                <th>11:00</th>
                                <th>12:00</th>
                                <th>13:00</th>
                                <th>14:00</th>
                                <th>15:00</th>
                                <th>16:00</th>
                                <th>17:00</th>
                                <th>18:00</th>
                                <th>19:00</th>
                                <th>20:00</th>
                            </thead>

                            <?php
                                $day=['M','T','W','H','F'];
                               
                                $k=0;
                                while($k<5){

                                
                            ?>
                            <tr>
                                <th><?= $day[$k]?></th>
                                <?php 
                                        $stdid= $_SESSION['username'];
                                        $stmt= $pdo->prepare("SELECT * FROM register WHERE std_ID='$stdid'");
                                        $stmt->execute();
                                        $subname=[0,0,0,0,0,0,0,0,0];
                                        $len=[0,0,0,0,0,0,0,0,0];
                                        $timest=[0,0,0,0,0,0,0,0,0];
                                        $countf =0;
                                        while($row = $stmt->fetch()){
                                            $classid= $row['class_ID'];
                                            $stmt1 =$pdo->prepare("SELECT * FROM course JOIN class on course.course_ID=class.course_ID WHERE class_ID='$classid'");
                                            $stmt1->execute();
                                            $row1 = $stmt1->fetch();
                                            
                                            if($row1['day'] == $day[$k]){
                                                $len1 = (( strtotime($row1['time_end']) - strtotime($row1['time_start']) ) / 60)/60;
                                                $time =strtotime($row1['time_start']);
                                                $hourst1=date("H", $time);
                                                $len[$countf]=$len1;
                                                $timest[$countf]=$hourst1;
                                                $subname[$countf]=$row1['course_name'];
                                                $countf++;
                                            }
                                        }
                                        $i=8;
                                        $count=0;
                                        while($i<=20){
                                            if($i==$timest[$count]){
                                                
                                ?>
                                                <td colspan="<?= $len[$count]?>"><?= $subname[$count]?></td>
                                <?php
                                                $i=$i+$len[$count];
                                                $count++;
                                            }
                                            if($countf == $count || $countf == 0){
                                                $space= 21 - $i;
                                ?>
                                                <td colspan="<?= $space?>"></td>
                                <?php
                                                $i=21;
                                            }
                                            else{
                                                $i++;
                                ?>
                                                <td colspan="1"></td>
                                <?php
                                            }
                                            
                                            
                                        }
                                ?>

                            </tr>

                            <?php
                                    $k++;
                                }
                            ?>

                        </table>
                    
                </div>                    
            </section>
    </div>
</body>
</html>