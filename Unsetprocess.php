<?php
    session_start();
    include('connect.php');

    $classid = $_GET["classId"];
    $stdid=$_SESSION["username"];

    $stmt= $pdo->prepare("DELETE FROM register WHERE class_ID ='$classid' AND std_ID = '$stdid'");
    $result =$stmt->execute();

    $stmt= $pdo->prepare("SELECT * FROM class WHERE class_ID ='$classid'");
    $stmt->execute();
    $row = $stmt->fetch();
    $sum= $row['Total_Rg_st']-1;
    $stmt= $pdo->prepare("UPDATE class SET Total_Rg_st ='$sum' WHERE class_ID ='$classid'");
    $result=$stmt->execute();
    if($result){
        $_SESSION['echo'] = "!! ถอนวิชาสำเร็จ  !!";
    }
    else{
        $_SESSION['echo'] = "!! ถอนวิชาไม่สำเร็จ เกิดข้อผิดพลาด !!";
    }
    header("location: Unset_Course.php");
?>