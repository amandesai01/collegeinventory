<?php
    include('check_session.php');
    include('connect.php');
    $entityname = $_POST['entityname'];
    $entitytype = $_POST['entitytype'];
    $entitycount = $_POST['entitycount'];
    $query = "insert into component_list(entityname, entitytype, entitycount) values('$entityname', $entitytype, $entitycount);" ;
    $result = mysqli_query($conn,$query);
    header('Location: superadminpanel.php');
    $conn->close();
?>