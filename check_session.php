<?php 
    session_start();
    if(!isset($_SESSION['userid']))
    {
        echo "Login First!";
        header("Location: index.html");
        exit();
    }
?>