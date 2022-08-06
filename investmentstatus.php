<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Investment Status</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <p>
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
    </p>
<?php
  include('connection.php');
  $username= $_SESSION["username"];
  $uid=$_SESSION["uid"];
  $username = stripcslashes($username);
  $username = mysqli_real_escape_string($con, $username);
  $user = 'root';
$password = '';


$database = 'investment_management';

// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}

// SQL query to select data from database
$sql="delete from investmentstatus where userid ='$uid' and holdings=0";
(mysqli_query($con,$sql));

$sql = "SELECT * FROM investmentstatus where userid ='$uid' and holdings>0";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stock details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
    body{
    margin: 0;
background: linear-gradient(45deg, #49a09d, #5f2c82);
font-family: sans-serif;
font-weight: 100;
}
        table {
          margin: 0 auto;
          font-size: large;
          width: 800px;
border-collapse: collapse;
overflow: hidden;
box-shadow: 0 0 20px rgba(0,0,0,0.1);

        }

        h1 {
            text-align: center;
            color: white;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        

        th,
        td {
          padding: 15px;
background-color: rgba(255,255,255,0.2);
color: #fff;
        }


                td {
                    font-weight: lighter;
                }
                th{
                  background-color: #55608f;
                }

              *{
              font-family: 'Poppins', sans-serif;

            }

    </style>
</head>

<body>
    <section>
        <h1>Investment Status</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>Name</th>
                <th>Purchase Date</th>
                <th>Holdings</th>
                <th>Total Investment</th>
                <th>Current Status</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['PurchaseDate'];?></td>
                <td><?php echo $rows['Holdings'];?></td>
                <td><?php echo ($rows['Initialinvestment']);?></td>
                <td><?php echo $rows['Status'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
    <h1><form action="add.php">
    <input type="submit" value="Bought">
    </form></h1>
    <h1><form action="del.php">
    <input type="submit" value="Sold">
    </form></h1>

</body>

</html>
