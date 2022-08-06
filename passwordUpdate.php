<?php
    include('connection.php');
    $username = $_POST['name'];
    $password = $_POST['pass'];


        //to prevent from mysqli injection
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "update user set password='$password' where name='$username'";
        $result = mysqli_query($con, $sql);



        if($result) {
            echo "<script type = 'text/javascript'>alert('Updated Successfully');window.location='./index.php';</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Cannot update values');</script>";
        }
?>
