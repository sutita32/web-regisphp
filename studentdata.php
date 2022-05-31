<?php
    include('connect.php');
    session_start();
    header("Content-Type: application/json; charset=UTF-8");
    $stdid=$_SESSION['username'];
    $stmt = $pdo->prepare("SELECT * FROM student WHERE std_ID= '$stdid'");
    $stmt->execute();
    $row =$stmt->fetch();

    echo json_encode($row['std_data']);
?>