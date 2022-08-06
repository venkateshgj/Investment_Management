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
  <p>
  <form name="f2" action = "" onsubmit = "return validation()" method = "post">
    
    
    <?php
      include('connection.php');
        $uid=$_SESSION["uid"];
        $sql = "select * from stocks";
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
            Bought for:
            <input type="double" id="bfr" name="bfr">
            Bought on:
            <input type="date" id="pdt" name="pdt">
            <form action="investmentstatus.php" id="btn1" method="POST">

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
                $uid=$_SESSION["uid"];
                echo "$uid";
                $qty=$_POST["qty"];
                $init=$_POST["bfr"];
                $pdt=$_POST["pdt"];
                $sql="SELECT stockid,currentstatus FROM `stocks` WHERE Name='$sname'";
                $result=mysqli_query($con,$sql);
                $row = mysqli_fetch_row($result);
                $sid=$row[0];
                $cts=$row[1];
                $sql="SELECT * FROM `investmentstatus` WHERE Name='$sname' and UserID ='$uid'";
                $result=mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                $count = mysqli_num_rows($result);
                if($count==0){
                  echo "yes";
                   $sql="INSERT INTO `investmentstatus` (`UserID`,`StockID`, `Name`, `PurchaseDate`, `Holdings`, `Initialinvestment`, `Status`) VALUES('$uid','$sid','$sname','$pdt','$qty','$init','$cts')";
                    if (mysqli_query($con, $sql)) {

                        header("Location: investmentstatus.php",TRUE,301);
                      } else {
                        echo '<script> alert("Error: " . $sql . "<br>" . mysqli_error($con))<script>';
                      }
                  
                    
                }
                else{
                    $sql="UPDATE `investmentstatus` SET holdings=holdings+$qty WHERE stockid='$sid' and userid='$uid'";
                    $sql1="UPDATE `investmentstatus` SET  initialinvestment=initialinvestment+$init where stockid='$sid' and userid='$uid'";
                    if(mysqli_query($con,$sql1)){
                        echo '<script type="text/javascript">';
                        echo ' alert("Record updated successfully")';  
                        echo '</script>';
                        header("Location: investmentstatus.php",TRUE,301);
                    }
                    (mysqli_query($con,$sql));
                    

                }
                
            }
            ?>
    
    </form>
    

    </form>
  </p>
</body>

</html>