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

    <script>
        var httpRequest;
        function sender(){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = showResult;
            var a = document.getElementById("search").value;
 
            var url= "searchcourse.php?search=" + a ;
            httpRequest.open("GET", url);
            httpRequest.send();
        }
        function showResult() {
            if (httpRequest.readyState == 4 && httpRequest.status == 200) {
                document.getElementById("result").innerHTML = httpRequest.responseText;
            }
        }
    </script>

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

        
        <section class="Content_Space" style="text-align: center; font-size: 17px;">
            <div id="Content_Title">ลงวิชาเรียน</div>
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
            <span class="find" style="font-size: 17px;" >ค้นหาวิชาเรียน : </span>
            <input type="text" onkeyup="sender()" id="search" placeholder=" กรอกรหัสวิชา">
            <br><br>
            <div id="block" style="font-size: 24px;">
                <span class="H">วิชาเรียน</span>
                <div class="Table">
                    <div id="result"></div>
                </div>
                
            </div>
            
        
        </section>
    </div>
</body>
</html>