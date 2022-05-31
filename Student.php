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
    <title>Register</title>
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
            <a href="Index.php">ออกจากระบบ</a>
        </nav>
        <section class="Content_Space" style="font-size: 17px; text-align: center;">
            <div id="Content_Title">ข้อมูลนักศึกษา </div>
            <?php
                $stdid=$_SESSION['username'];
                $stmt = $pdo->prepare("SELECT * FROM student WHERE std_ID= '$stdid'");
                $stmt->execute();
                $row =$stmt->fetch();
                
                $jsondata = $row['std_data'];

                $myJSON = json_decode($jsondata);

            ?>
            <div id="Content">ชื่อ : <?= $myJSON->name ?> </div>
            <div id="Content">คณะ : <?= $myJSON->Group ?> </div>
            <div id="Content">สาขา : <?= $myJSON->Branch ?> </div>
            <div id="Content">เพศ : <?= $myJSON->Sex ?> </div>
        </section>
    </div>
</body>
</html>