<?php
    session_start();
    include('connect.php');
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    $sql = "select * from users where username = '$myusername' and passkey = '$mypassword';";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if($count == 1){
        echo "Logged in!!";
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['type'] = $row['usertype'];
        $_SESSION['sex'] = $row['sex'];
        include('assign.php');
        if($_SESSION['type'] == 4){
            header('Location: superadminpanel.php');
        }
        if($_SESSION['type'] == 3){
            header('Location: adminpanel.php');
        }
        if($_SESSION['type'] == 2){
            header('Location: teacherpanel.php');
        }
        //if($_SESSION['type'] == 1){
          //  header('Location: studentpanel.php');
        //}
    }
    else{
        echo "Login Invalid.";
    }
    $conn->close();
?> 