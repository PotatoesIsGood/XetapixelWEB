<?php
    $m_nickname = $_GET['m_nickname'];
    $d_nickname = $_GET['d_nickname'];
    $email = $_GET['email'];
    $phonenumber = $_GET['phonenumber'];
    $birthdate = $_GET['birhdate'];
    $reason = $_GET['reason'];

    //Database connection
    $conn = new mysqli('localhost','root','xetacareer_database','Abu123zZiU07!');
    if ($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(m_nickname, d_nickname, email, phonenumber, birthdate, reason)
            values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi",$m_nickname, $d_nickname, $email, $phonenumber, $birthdate, $reason);
        $stmt->execute();
        echo "Registration Successfully!";
        $stmt->close();
        $conn->close();
    }
?>