<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Update</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  <div class="topnav">
    <a class="active" href="home.php">Home</a>
    <div class="dropdown">
      <button class="dropbtn">Menu
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <!-- <a target="_self" href="Stocks.html">Stocks

      </a>-->
        <a target="_self" href="stocks1.php">Stocks</a>
         <a target="_self" href="investmentstatus.php">Investment Status</a>
        <a target="_self" href="analysis.php">Analysis</a>
        <a target="_self" href="transactions.php">Transactions</a>
      </div>
    </div>
    <a target="_self" href="contactus.html">Contact Us</a>
    <a target="_self" href="aboutus.html">About Us</a>

  </div>
  <form name="f2" action = "" onsubmit = "return validation()" method = "post">
   
    
    <?php
      include('connection.php');
        $uid=$_SESSION["uid"];
        $sql = "select * from investmentstatus where userid='$uid' and holdings>0";
        $result=mysqli_query($con, $sql);
        

        if (!$result) {
            echo "Could not open page " . mysqli_error();
            exit;
        }

        if (mysqli_num_rows($result) == 0) {
            echo "No data found";
            exit;
        }
        $option='';
        while ($row = mysqli_fetch_assoc($result)) {
          $option .= '<option value = "'.$row['Name'].'">'.$row['Name'].'</option>';
        }
         ?> 
            Select the Stock:
           <select id="stock" name="stock"> 
           <option value="" id="sel" name="sel" selected>--Select--</option>
           <?php echo $option; ?>
            </select>
            Quanatity:
            <input type="number" id="qty" name="qty">
            Sold for:
            <input type="double" id="bfr" name="bfr">
            Sold on:
            <input type="date" id="pdt" name="pdt">
            <form action="" id="btn1" method="POST">

              <input type="submit"  value ="Submit" />
              

              <script>
            function validation()
            {
                var id=document.f2.qty.value;
                var ps=document.f2.bfr.value;
                var dt=document.f2.pdt.value;
                var sel = document.getElementById('stocks');
                if(id.length=="" || ps.length=="" || dt.length=="" || sel.length=="" ) {
                    alert("Insuffecient data");
                    return false;
                }
                
            }
        </script>
            </form>
            <?php
            if(isset($_POST["stock"]) && isset($_POST["qty"]) && isset($_POST["bfr"]) && isset($_POST["pdt"])){
                $sname=$_POST["stock"];
                $qty=$_POST["qty"];
                $init=$_POST["bfr"];
                $pdt=$_POST["pdt"];
                $bfr=$_POST["bfr"];
                $sql="SELECT stockid FROM `stocks` WHERE Name='$sname'";
                $result=mysqli_query($con,$sql);
                $row = mysqli_fetch_row($result);
                $sid=$row[0];
                $sql="select * FROM `investmentstatus` WHERE Name='$sname' and userid='$uid' and stockid='$sid'";
                $result=mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                $count = mysqli_num_rows($result);
                if($count==0){
                    echo '<script> alert("Cannot Update , Record doesn\'t exist)"';
                }
                else{
                    $sql="select initialinvestment,holdings from investmentstatus where userid='$uid' and stockid='$sid'";
                    $result=(mysqli_query($con,$sql));
                    $row = mysqli_fetch_row($result);
                    $b4=$row[0];
                    $hol=$row[1];
                    $rat=$b4 / $hol;
                    $temp=$qty * $rat;
                    $af=$b4 - $temp;
                    $sql="update investmentstatus set holdings=holdings-$qty where userid='$uid' and stockid='$sid'";
                    $sql1="UPDATE `investmentstatus` SET  initialinvestment=initialinvestment-$temp where stockid='$sid' and userid='$uid'";
                    (mysqli_query($con,$sql));
                    (mysqli_query($con,$sql1));
                    $sql="select initialinvestment from investmentstatus where userid='$uid' and stockid='$sid'";
                    $result=(mysqli_query($con,$sql));
                    $row = mysqli_fetch_row($result);
                    $net=$bfr-($rat * $qty);
                    $sql="insert into transactions (`userid`,`stockid`,`name`,`sold`,`soldfor`,`net gain`,`date`) values ('$uid','$sid','$sname','$qty','$bfr','$net','$pdt')";
                    (mysqli_query($con,$sql));
                    header("Location: transactions.php",TRUE,301);
                }
            }
            ?>  