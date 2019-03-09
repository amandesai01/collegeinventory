<?php 
    include('check_session.php');
    include('connect.php');
    if($_SESSION['usertype'] != 4){
        header('Location: index.html');
    }
    $userid = $_GET['userid'];
    $username = $_GET['username'];
    $usertype = $_GET['usertype'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $sex = $_GET['sex'];
    echo "<h1>$fname $lname</h1><hr><h3>Withdrawals:</h3>";
?>