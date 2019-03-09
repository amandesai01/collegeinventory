<?php
    include('connect.php');
    $username = $_POST['username'];
    $passkey = $_POST['passkey'];
    $usertype = $_POST['usertype'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id = $_POST['id'];
    $sex = $_POST['sex'];
    $query = "insert into users(userid,username,passkey,usertype,fname,lname,sex) values($id,'$username','$passkey','$usertype','$fname','$lname','$sex');" ;
    $result = mysqli_query($conn,$query);
    header('Location: superadminpanel.php');
    $conn->close();
?>