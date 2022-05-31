<?php 
    session_start();
    include('connect.php');
    $errors = array();

    if(isset($_POST['Login'])){
        $ID= $_POST["Username"];
        $pass= $_POST["Password"];
        if($ID == "admin" && $pass == "12345"){
            $_SESSION['username']="admin";
            header("Location: Admin_Subject.php");
        }else{
            $stmt = $pdo->prepare("SELECT std_ID FROM student WHERE std_ID = ? AND std_password = ?");

            $stmt->bindParam(1, $_POST["Username"]);
            $stmt->bindParam(2, $_POST["Password"]);
            
            $stmt->execute();

            

            if($row = $stmt->fetch()){
                $_SESSION['username']=$row['std_ID'];
                header("Location: Add_Course.php");
                // echo "เข้าสู่ระบบสำเร็จ<br>";
                // echo "<a href='Add_Course.php'>ไปยังหน้าหลักของผู้ใช้</a>"; 
            }
            
            else{
                // array_push($errors,"wrong username/password combination");
                $_SESSION['error'] = "!! ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง !!";
                header("location: Index.php");
                // echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
                // echo "<a href='Index.php'>เข้าสู่ระบบอีกครัง</a>"; 
            }
        }
        
    }
?>