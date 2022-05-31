<?php
    session_start();
    include('connect.php');

    $classid = $_GET["classid"];
    $stdid=$_SESSION["username"];

    $stmt= $pdo->prepare("SELECT * FROM register WHERE class_ID	='$classid' AND std_ID = '$stdid'");
    $stmt->execute();
    $row = $stmt->fetch();
    if(empty($row)){
        // insert
        $stmt= $pdo->prepare("INSERT INTO register(class_ID,std_ID) VALUES ('$classid','$stdid')");
        $stmt->execute();
        // update stdnum
        $stmt= $pdo->prepare("SELECT * FROM class WHERE class_ID ='$classid'");
        $stmt->execute();
        $row = $stmt->fetch();
        $sum= $row['Total_Rg_st']+1;
        $stmt= $pdo->prepare("UPDATE class SET Total_Rg_st ='$sum' WHERE class_ID ='$classid'");
        $result=$stmt->execute();
        
        if($result){
            $_SESSION['echo'] = "!! ลงทะเบียนสำเร็จ !!";
        }
        else{
            $_SESSION['echo'] = "!! ลงทะเบียนไม่สำเร็จ เกิดข้อผิดพลาด !!";
        }
    }
    else{
        $_SESSION['echo'] = "!! ลงทะเบียนไม่สำเร็จ เกิดข้อผิดพลาด !!";
      
    }
    header("location: Add_course.php");
?>