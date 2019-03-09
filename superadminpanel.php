<?php 
    include('check_session.php');
    include('connect.php');
?>
<html>
    <head>
        <title>
            SuperAdmin Panel
        </title>
    </head>
    <body>
        <center>
        <h1>Welcome <?php echo $_SESSION['fname']; ?></h1>
        <hr>
        <h2>Users:</h2>
        <table>
        <th><h4>ID</h4></th>
                <th><h4>Username</h4></th>
                <th><h4>Usertype</h4></th>
                <th><h4>Firstname</h4></th>
                <th><h4>Lastname</h4></th>  
                <th><h4>Sex</h4></th>
        <?php 
            $usrview = 'select * from users;' ;
            $result = mysqli_query($conn,$usrview);
            while($row = mysqli_fetch_array($result)){
                $curr_userid = $row['userid'];
                $curr_username = $row['username'];
                $curr_usertype = $row['usertype'];
                if($curr_usertype==4){$curr_usertype = 'Super-Admin';}
                if($curr_usertype==3){$curr_usertype = 'Admin';}
                if($curr_usertype==2){$curr_usertype = 'Teacher';}
                if($curr_usertype==1){$curr_usertype = 'Student';}
                $curr_fname = $row['fname'];
                $curr_lname = $row['lname'];
                $curr_sex = $row['sex'];
                if($curr_sex==1){$curr_sex = 'Male';}
                if($curr_sex==2){$curr_sex = 'Female';}
                echo "
                <tr>
                <td> $curr_userid </a></td><td><a href=\"usrview.php?userid=$curr_userid&username=$curr_username&usertype=$curr_usertype&fname=$curr_fname&lname=$curr_lname&sex=$curr_sex\">
                 $curr_username </a></td><td> $curr_usertype </td><td> $curr_fname </td><td> $curr_lname </td> <td> $curr_sex </td> </tr>
                ";
            
            }
        ?>
        </table><br>
        <form method='post' action='adduser_superadmin.php'>
        <input type="text" name="id" placeholder="ID">
        <input type='text' name='username' placeholder='Username'> 
        &nbsp;&nbsp;&nbsp; <input type='password' name='passkey' placeholder='Set Password'> 
        &nbsp;&nbsp;&nbsp;
        <select name='usertype'><option value='1'>Student</option><option value='2'>Teacher</option><option value='3'>Admin</option><option value='4'>Super Admin</option></select>&nbsp;&nbsp;&nbsp;
        <input type='text' name='fname' placeholder='First Name'>&nbsp;&nbsp;&nbsp;<input type='text' name='lname' placeholder='Last Name'>&nbsp;&nbsp;&nbsp;<select name="sex"><option value="1">Male</option><option value="2">Female</option></select>&nbsp;&nbsp;&nbsp;<button value="submit">Add User</button>
        <hr></form>
        <h3>Components:</h3>
        <table>
        <th><h4>ID</h4></th>
<th><h4>Component <br>name</h4></th>	
<th><h4>Component <br>type</h4></th>
	<th><h4>Quantity <br> Available</h4></th>  
            <?php
                $compview = 'select * from component_list;' ;
                $result = mysqli_query($conn,$compview);
                while($row = mysqli_fetch_array($result)){
                    $curr_entityid = $row['entityid'];
                    $curr_entityname = $row['entityname'];
                    $curr_entitytype = $row['entitytype'];
                    $queryo = "select typename from component_type where typeid = $curr_entitytype";
                    $resulto = mysqli_query($conn,$queryo);
                    $rowo = mysqli_fetch_array($resulto);
                    $curr_entitytype = $rowo['typename'];
                    $curr_entitycount = $row['entitycount'];
                    echo "<tr><td> $curr_entityid </td><td> $curr_entityname </td><td> $curr_entitytype </td><td> $curr_entitycount </td></tr>";
                
                }
            ?>
        </table><br>
        <form method='post' action='addcomponent_superadmin.php'>
        <input type='text' name = 'entityname' placeholder="Component name">&nbsp;&nbsp;&nbsp;
        <select name="entitytype"><?php $query="select * from component_type;" ; 
                                    $result = mysqli_query($conn,$query); 
                                    while($row = mysqli_fetch_array($result)){
                                        $typename = $row['typename'];
                                        $type = $row['typeid'];
                                        echo "<option value='$type'>$typename</option>" ;
                                        } 
                                ?></select>
        &nbsp;&nbsp;&nbsp;<input type="text" placeholder="Available Quantity" name='entitycount'>
        <input type="submit" action="submit" value="submit">
        </form><hr>
        <h3>Component Type:</h3>
        <table><tr>
        <th><h4>ID</h4></th>
<th><h4>Type <br>Name</h4></th>	</tr>

            <?php
                $compview = 'select * from component_type;' ;
                $result = mysqli_query($conn,$compview);
                while($row = mysqli_fetch_array($result)){
                    $curr_typeid = $row['typeid'];
                    $curr_typename = $row['typename'];
                    //$curr_entitytype = $row['entitytype'];
                    echo "<tr><td> $curr_typeid </td><td> $curr_typename </td></tr>";
                }
            ?>
        </table><br>
        <form method="post" action="addcomponenttype.php">
            <input type="text" name="typename" placeholder="Name of New Type">
            <button value=submit>Add Type</button>                
        </form>
        </center>
    </body>
</html>