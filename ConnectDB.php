<?php
    $uname = $_POST['uname'];
    $emm = $_POST['emm'];
    $pwd = $_POST['pwd'];

    //Database connection method
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into usertable(uname, emm, pwd)
        values(?, ?, ?)");
        $stmt->bind_param("sss", $uname, $emm, $pwd);
        $stmt->execute();
        sleep(3);
        echo "Registration Successful... Please Login now to enter to the dashboard";
        sleep(3);
        $stmt->close();
        $conn->close();
        header('Location: /test');
        // or die();
        exit();
    }
?>