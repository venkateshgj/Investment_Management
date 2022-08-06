<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Stocks</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <p>
      <div class="topnav">
        <a class="active" href="home.html">Home</a>
        <div class="dropdown">
          <button class="dropbtn">Dropdown
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <!-- <a target="_self" href="Stocks.html">Stocks

          </a>-->
            <form action="stocks.php" id="btn1" method="POST">

              <input type="submit"  value ="Stocks" />
            </form>
            <form action="investmentstatus.php"  method="POST">

              <input type="submit" value ="Investment Status"/>
            </form>
            <a target="_self" href="analysis.html">Ananlysis</a>
            <a target="_self" href="transaction.html">Transaction</a>
          </div>
        </div>
        <a target="_self" href="contactus.html">Contact Us</a>
        <a target="_self" href="aboutus.html">About Us</a>

      </div>
    </p>
    <?php
      include('connection.php');

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
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<td><input type='text' value=".$row['Name']."></td>";
          echo "<td><input type='text' value=".$row['LastCls']."></td>";
          echo "<td><input type='text' value=".$row['WeekHigh']."></td>";
          echo "<td><input type='text' value=".$row['WeekLow']."></td>";
          echo "<td><input type='text' value=".$row['CurrentStatus']."></td>";
          echo"<br />";
      #    echo $row["StockID"];
    #      echo $row["Name"];
    #      echo $row["LastCls"];
    #      echo $row["WeekHigh"];
    #      echo $row["WeekLow"];
    #      echo $row["CurrentStatus"];

        }

        mysqli_free_result($result);

     ?>

  </body>
</html>
