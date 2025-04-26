<?php
session_start();
if(!isset($_SESSION['userid'])) 
{
    echo "<a href='Login.php'>Go to Login</a><br>";
    exit;
}
$con = mysqli_connect("localhost", "root", "", "bank");
$uid = $_SESSION['userid'];
$result = mysqli_query($con, "SELECT * FROM users WHERE id=$uid");
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
	<title>SBI - Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="main-box">
    <h2>Welcome to SBI, <?php echo $row['fullname']; ?>!</h2>
    <p><strong>Username : </strong> <?php echo $row['username']; ?></p>
    <p><strong>Account Status : </strong> Active & Verified</p>
    <br>
    <div class="dashboard-links">
        <a href="Deposit.php">Deposit Money</a><br><br>
        <a href="Withdraw.php">Withdraw Money</a><br><br>
        <a href="Transfer.php">Transfer Money</a><br><br>
        <a href="Balance.php">Check Balance</a><br><br>
		<a href="Loan.php">Apply for Loan</a><br><br>
		<a href="Interest.php">View Interest Rates</a><br><br>
		<a href="CloseAccount.php">Close Account</a><br><br>
        <a href="Logout.php">Logout</a><br><br>
        <a href="index.php">Back to Home</a><br><br>
    </div>
</div>
</body>
</html>
