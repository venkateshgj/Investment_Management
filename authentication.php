<?php
    session_start();
   
    include('connection.php');
    $username = $_REQUEST['name'];
    $password = $_REQUEST['pass'];
    $_SESSION["username"]= $_REQUEST['name'];
    
        //to prevent from mysqli injection
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "select * from user where name = '$username' and password = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $_SESSION["uid"]= $row['userid'];
        $count = mysqli_num_rows($result);

        if($count == 1){
            echo "<h1><center> Login successful </center></h1>";
            header("Location: home.php");


        }
        else{
            echo "<h1> Login failed. Invalid userid or password.</h1>";
        }
        $sql1 = "select userid from user where name = '$username' and password = '$password'";
        $result1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_row($result1);
        $_SESSION["uid"]= $row1[0];
?>
