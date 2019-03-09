<?php
    include('connect.php');
    $typename = $_POST['typename'];
    $query = "insert into component_type(typename) values('$typename');" ;
    $result = mysqli_query($conn,$query);
    header('Location: superadminpanel.php');
?>