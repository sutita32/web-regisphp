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
    <title>AddCourse</title>
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
        <nav class="Nav_Button">
            <a href="#.php">เพิ่มรายวิชา</a>&nbsp; | &nbsp;
            <a href="Admin_Student.php">เพิ่มรายชื่อนักศึกษา</a>&nbsp; | &nbsp;
            <a href="Admin_Professor.php">เพิ่มรายชื่ออาจารย์</a>&nbsp; | &nbsp;
            <a href="Index.php?logout='1'">ออกจากระบบ</a>   
            
            
        </nav>
        <section class="Content_Space">
            <div id="Content_Title">เพิ่มรายวิชา</div>
                <div class="Input_All">
                <form action="Adddata.php" method="POST">
                    <div class="Log">
                        <div class="Hex">
                        <?php if(isset($_SESSION['echo'])) : ?>
                            <div class="Form_Submit">
                                <h3>
                                    <?php
                                        echo $_SESSION['echo'];
                                        unset($_SESSION['echo']);
                                    ?>
                                </h3>
                            </div>
                            <?php endif; ?>
                            <div class="Input_No">
                                รหัสวิชา
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <input type="text" name="No1" id="No1" placeholder="รหัสวิชา 9 หลัก" pattern="[0-9]{9}" required>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="Input_Sec">
                                ชื่อวิชา
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <input type="text" name="subject1" id="subject1" placeholder="รายวิชา" required>
                                    </div>
                                </div>
                                
                            </div>  
                            <div class="Input_Sec">
                                ตอนเรียน
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <input type="text" name="sec" id="sec"  placeholder="ตอน" pattern="[0-9]{1}" required>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="Input_unit">
                                หน่วยกิต
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <input type="text" name="unit1" id="unit1"  placeholder="จำนวนหน่วยกิต" pattern="[0-9]{1}" required>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="Input_unit">
                                จำนวนนักศึกษาในคลาส
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <input type="number" name="num_std" id="unit1"  placeholder="จำนวนนักศึกษา" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="Input_Sec">
                                เวลาเรียน
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <div>
                                            <select name="day" id="Type" >
                                            <option value="M">M</option>
                                            <option value="T">T</option>
                                            <option value="W">W</option>
                                            <option value="H">H</option>
                                            <option value="F">F</option>
                                            <option value="Sa">Sa</option>
                                            <option value="Su">Su</option>
                                        </div>
                                        
                                        <input type="time" name="starttime" id="sec" min="09:00" max="19:00" required>
                                        -
                                        <input type="time" name="endtime" id="sec" min="09:00" max="21:00" required>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="Input_pro">
                                อาจารย์ผู้สอน
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <select name="profeccer" id="Type" >
                                            <option value="-">-</option>
                                        <?php
                                            include('connect.php');

                                            $stmt = $pdo->prepare("SELECT * FROM teacher");
                                            $stmt->execute();
                                            while($row = $stmt->fetch()){
                                        ?>
                                                <option value="<?php echo $row["Teach_ID"]; ?>"><?php echo $row['Teach_name']; ?></option>    
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            
                            </div> 

                             <input type="submit" value="เพิ่ม" id="Submit" name="Add_sub">
                             
                        </div>
                        <!-- <button type="submit" name="Add_sub" id="Submit" >
                                <span>ADD</span>
                            </button>     -->
                       
                    </div> 
                </form>
            </div>
        </div>
    </div>
</body>
</html>