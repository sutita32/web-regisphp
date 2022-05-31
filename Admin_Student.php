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
        <nav class="Nav_Button">
            <a href="Admin_Subject.php">เพิ่มรายวิชา</a>&nbsp; | &nbsp;
            <a href="#">เพิ่มรายชื่อนักศึกษา</a>&nbsp; | &nbsp;
            <a href="Admin_Professor.php">เพิ่มรายชื่ออาจารย์</a>&nbsp; | &nbsp;
            <a href="Index.php?logout='1'">ออกจากระบบ</a>   
        </nav>
        <section class="Content_Space">
            <div id="Content_Title">เพิ่มรายชื่อนักศึกษา</div>
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
                                รหัสนักศึกษา
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <input type="text" name="std_id" id="No1" placeholder="รหัสนักศึกษา 13 ตัวอักษร" pattern="[0-9]{13}" minlength="13" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="Input_Password">
                                Password
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <input type="text" name="Password1" id="Password1" placeholder="Password" required>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="Input_Password">
                                Confirm Password
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <input type="text" name="Password2" id="Password2" placeholder="Password" required>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="Input_Name">
                                ชื่อ-นามสกุล
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        <input type="text" name="Name" id="Name" placeholder="ชื่อ-นามสกุล" required>
                                    </div>
                                </div>
                                
                            </div>  
                            <div id="bb">
                                <div class="Input_Group">
                                    คณะ
                                    <div class="Form_Row">
                                        <div class="Form_Area">
                                            <input type="text" name="Group" id="Group"  placeholder="คณะ"  required>
                                        </div>
                                    </div>
                                    
                                </div> 
                                <div class="Input_Branch">
                                    สาขา
                                    <div class="Form_Row">
                                        <div class="Form_Area">
                                            <input type="text" name="Branch" id="Branch"  placeholder="สาขา" required>
                                        </div>
                                    </div>
                                    
                                </div> 
                            </div>
                           
                            <div class="Input_Sex">
                                เพศ
                                <div class="Form_Row">
                                    <div class="Form_Area">
                                        
                                            <input type="radio" name="sex" id="male" value="male">
                                            <label for="male">male</label>
                                            <input type="radio" name="sex" id="male" value="female">
                                            <label for="female">female</label>
                                        
                                        
                                    </div>
                                </div>
                                
                            </div> 
                            <input type="submit" value="เพิ่ม" id="Submit" name="Add_std">
                        </div>  
                       
                    </div>
                    </form>    
                </div>            
            </section>
        </div>
    </div>
</body>
</html>