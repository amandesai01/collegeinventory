<?php
    include('connect.php');
    include('check_session.php');
    if($_SESSION['type'] != 2){
        header('Location: index.html');
    }
    $loggedinid = $_SESSION['type'];
?>
<html>
<head>
    <title>Teacher Panel</title>
</head>
<body>
    <center>
    <h1>Welcome <?php echo $_SESSION['fname']; ?></h1>
    <hr>
    <h2>Withdrawals:</h2>
    <table>
    <tr><th>ID</th><th>Component<br>Name</th><th>Component<br>Type</th><th>Date</th><th>Time</th></tr>
    <?php
        $query = "select * from recordset where userid = $loggedinid";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            $curr_recordid = $row['recordid'];
            $curr_entityname = $row['entityname'];
            $curr_typename = $row['typename'];
            $curr_issuedate = $row['issuedate'];
            $curr_issuetime = $row['issuetime'];
            echo "<tr><td>$curr_recordid</td><td>$curr_entityname</td><td>$curr_typename</td><td>$curr_issuedate</td><td>$curr_issuetime</td></tr>";
        }
    ?>

    </table><br><br>
    <a href="withdrawal.php">New Withdrawal</a><br> <hr>
    </center>
</body>
</html>
