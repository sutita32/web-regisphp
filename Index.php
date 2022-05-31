<?php include('connect.php'); ?>
<?php
    session_start();
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
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
    <link rel="stylesheet" href="style/stylepageindex2.css">
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="checkbox1.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Newsreader:wght@200;400&family=Prompt:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="Content">
        <a href="Student.php">King Mongkut's University of Tecnology North Bangkok.</a><br>
      
        <div class="Login_Space">
            <div class="Form_Title">ระบบสารสนเทศเพื่องานทะเบียนนักศึกษา</div> 
            
            <div id="Login_Form">
                <form action="logindb.php" method="POST">

                
                <div class="Form_Row">
                    <div class="Form_Area">
                        <input type="text" name="Username" id="UserId" placeholder="username"  required>
                    </div>
                </div>
                <div class="Form_Row">
                    <div class="Form_Area">
                        <input type="password" name="Password" id="Password" placeholder="password" required>
                    </div>
                </div>
               
                <div class="Form_Submit">
                    <div class="Btn_Submit">
                        <button type="submit" name="Login" onclick="alert('คุณกำลังเข้าสู้ระบบลงทะเบียนเรียน มจพ.')" id="Login_Button">
                            <span>LOGIN</span>
                        </button>
                    </div>
                </div>
                <?php if(isset($_SESSION['error'])) : ?>
                <div class="Form_Submit">
                    <h3>
                        <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </h3>
                </div>
                <?php endif; ?>
                </form>
                
            </div>
           
        </div>
    </div>
</body>
</html>