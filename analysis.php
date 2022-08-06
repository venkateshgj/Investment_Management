<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Analysis</title>
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
  $user = 'root';
$password = '';

// Database name is gfg
$database = 'investment_management';

// Server is localhost with
// port number 3308
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
$sql = "SELECT * FROM ananlysis ";
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
        <h1>Analysis</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>Stock Name</th>
                <th>Current Status</th>
                <th>Predicted Growth</th>
                <th>Recommendation</th>
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
                <td><?php echo $rows['CurrentStatus'];?></td>
                <td><?php echo $rows['PredictedStatus'];?></td>
                <td><?php echo $rows['Recommendation'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>

</html>
