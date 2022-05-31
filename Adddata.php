
<?php 
    session_start();
    include('connect.php');
    $errors = array();

    if(isset($_POST['Add_std'])){

        $std_id =  $_POST["std_id"];
        $password1 = $_POST["Password1"];
        $password2 =$_POST["Password2"];

        $jsondata = array("name"=> $_POST["Name"], "Group"=>$_POST["Group"], "Branch"=>$_POST["Branch"],"Sex"=>$_POST["sex"]);
        $myJSON = json_encode($jsondata,JSON_UNESCAPED_UNICODE);

        if($password1 == $password2){
            $stmt = $pdo->prepare("SELECT * FROM student WHERE std_ID = $std_id AND std_password = $password1 ");
            $stmt->execute();
            $row = $stmt->fetch();

            if(empty($row)){
                $stmt = $pdo->prepare("INSERT INTO student (std_ID,std_password,std_data) VALUES ('$std_id','$password1','$myJSON')");
                $result=$stmt->execute();
                if($result){
                    $_SESSION['echo'] = "!! ลงทะเบียนสำเร็จ  !!";
                }
                else{
                    $_SESSION['echo'] = "!! ไม่สำเร็จ เกิดข้อผิดพลาด !!";
                }
            }
        }
        else{
           
            $_SESSION['echo'] = "!! ไม่สำเร็จ เกิดข้อผิดพลาด !!";
            
        }
        header("location: Admin_Student.php");
    }

    if(isset($_POST['Add_pro'])){

        $pro_id =  $_POST["Professoer_No"];
        $proname = $_POST["Name_Professoer"];


     
        $stmt = $pdo->prepare("SELECT * FROM teacher WHERE Teach_ID = '$pro_id'");
        $stmt->execute();
        $row = $stmt->fetch();

        if(empty($row)){
            $stmt = $pdo->prepare("INSERT INTO teacher (Teach_ID,Teach_name) VALUES ('$pro_id','$proname')");
            $result=$stmt->execute();
            $_SESSION['echo'] = "!! ลงทะเบียนสำเร็จ  !!";
            
        }
        else{
            $_SESSION['echo'] = "!! ไม่สำเร็จ เกิดข้อผิดพลาด !!";
        }
        header("location: Admin_Professor.php");
    }
    if(isset($_POST['Add_sub'])){

        $sub_id =  $_POST["No1"];
        $sub_name = $_POST["subject1"];
        $sub_sec = $_POST["sec"];
        $sub_starttime = $_POST["starttime"];
        $sub_endtime = $_POST["endtime"];
        $sub_credit = $_POST["unit1"];
        $sub_teach = $_POST["profeccer"];
        $sub_std = $_POST["num_std"];
        $sub_day = $_POST["day"];
        $sub_std=intval($sub_std);
        $stmt = $pdo->prepare("SELECT * FROM course WHERE course_ID = '$sub_id'");
        $stmt->execute();
        $row = $stmt->fetch();

        if(empty($row)){
            $stmt = $pdo->prepare("INSERT INTO course (course_ID,course_name,credit) VALUES ('$sub_id','$sub_name','$sub_credit')");
            $stmt->execute();
            $stmt =$pdo->prepare("INSERT INTO class (class_name,Total_Rg_st,time_start,time_end,course_ID,Teach_ID,Total_Rg_st_max,day)
                                    VALUES ('$sub_sec',0,'$sub_starttime','$sub_endtime','$sub_id','$sub_teach','$sub_std','$sub_day')");
            $result= $stmt->execute();
            if($result){
                $_SESSION['echo'] = "!! ลงทะเบียนสำเร็จ  !!";
            }
            else{
                $_SESSION['echo'] = "!! ไม่สำเร็จ เกิดข้อผิดพลาด !!";
            }
        }
        else{
            $stmt =$pdo->prepare("INSERT INTO class (class_name,Total_Rg_st,time_start,time_end,course_ID,Teach_ID,Total_Rg_st_max,day)
                                    VALUES ('$sub_sec',0,'$sub_starttime','$sub_endtime','$sub_id','$sub_teach','$sub_std','$sub_day')");
            $result= $stmt->execute();
            if($result){
                $_SESSION['echo'] = "!! ลงทะเบียนสำเร็จ  !!";
            }
            else{
                $_SESSION['echo'] = "!! ไม่สำเร็จ เกิดข้อผิดพลาด !!";
            }
        }
    
        header("location: Admin_Subject.php");
    }
?>
