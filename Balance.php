<?php
session_start();
if(!isset($_SESSION['userid'])) 
{
    echo "<a href='Login.php'>Go to Login</a><br>";
    exit;
}
?>
<html>
<head>
    <title>Check Balance - SBI</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="main-box">
        <h2>SBI - Check Account Balance</h2>
        <?php
        $con = mysqli_connect("localhost", "root", "", "bank");
		if(!$con)
		{
			die("Connection failed: " . mysqli_connect_error());
		}
        $uid = $_SESSION['userid'];
        $result = mysqli_query($con, "SELECT balance FROM users WHERE id=$uid");
        $row = mysqli_fetch_assoc($result);
        echo "<p>Your Current Balance is: ₹" . $row['balance'] . "</p>";
        mysqli_close($con);
        ?>
        <br>
        <a href="DashBoard.php">Back to Dashboard</a><br><br>
        <a href="index.php">Back to Home</a><br><br>
    </div>
</body>
</html>
