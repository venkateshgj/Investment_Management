<?php
    include('connection.php');
    $username = $_POST['name'];
    $password = $_POST['pass'];

        //to prevent from mysqli injection
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "insert into user(name,password) values('$username','$password')";
        $result = mysqli_query($con, $sql);
		    #$sql1 = "insert into login values('$username','$password')";
        #$result1 = mysqli_query($con, $sql1);


        /*if($result && $result1 ){
            echo "<script type='text/javascript'>alert('Inserted Successfully');window.location='./index.html';</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Cannot insert values');</script>";
        }*/
        if($result) {
          echo "<script type='text/javascript'>alert('Inserted Successfully');window.location='./index.php';</script>";
        }
        else {
          echo "<script type='text/javascript'>alert('Cannot insert values');</script>";
        }
?>
