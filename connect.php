<?php
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    //database connection
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }

    else{
        $stmt = $conn->prepare("insert into registration(email, name, phone, message) 
        values(?, ?, ?, ?) ");
        $stmt->bind_param("ssis", $email, $name,$phone,$message);
        $stmt->execute();
        echo "form submitted...";
        $stmt->close();
        $conn->close();
    }

?>