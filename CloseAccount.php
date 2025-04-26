<?php
session_start();
if(!isset($_SESSION['userid'])) 
{
    echo "<a href='Login.php'>Go to Login</a>";
    exit;
}
?>
<html>
<head>
    <title>Close Account - SBI</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="main-box">
        <h2>Close Your SBI Account</h2>
        <form method="post">
            <p>Are you sure you want to close your account?</p>
            <input type="submit" name="close" value="Yes, Close My Account"><br><br>
            <a href="DashBoard.php">Back to Dashboard</a><br><br>
            <a href="index.php">Back to Home</a><br>
        </form>

        <?php
        if(isset($_POST['close'])) 
		{
            $uid = $_SESSION['userid'];
            $con = mysqli_connect("localhost", "root", "", "bank");
			if(!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
            $sql = "DELETE FROM users WHERE id=$uid";
            if(mysqli_query($con, $sql)) 
			{
                session_destroy();
                echo "<p>Your account has been closed successfully.</p><br>";
                echo "<a href='Register.php'>Register New Account</a><br><br>";
                echo "<a href='index.php'>Back to Home</a><br>";
            } 
			else 
			{
                echo "<p>Failed to close account. Try again later.</p>";
            }
            mysqli_close($con);
        }
        ?>
    </div>
</body>
</html>
