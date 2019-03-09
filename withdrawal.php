<?php
    include('connect.php');
    include('check_session.php');
    $withdraw_fname = $_SESSION['fname'];
?>
<html>
<head>
    <title>WithdrawPanel</title>
</head>
<body>

<h4><u>Withdrawer: <?php echo $withdraw_fname; ?></u></h4>

</body>
</html>