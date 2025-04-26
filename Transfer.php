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
    <title>Transfer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="main-box">
        <h2>Transfer Money</h2>
        <form method="post">
            To Username : <input type="text" name="to_user" placeholder="Enter receiver username"><br><br>
            Amount : <input type="text" name="amount" placeholder="Enter amount"><br><br>
            <input type="submit" name="transfer" value="Transfer"><br><br>
            <a href="DashBoard.php">Back to Dashboard</a><br><br>
            <a href="index.php">Back to Home</a><br><br>
        </form>

        <?php
        if(isset($_POST['transfer'])) 
		{
            $to = $_POST['to_user'];
            $amt = $_POST['amount'];
            $from_id = $_SESSION['userid'];
            $con = mysqli_connect("localhost", "root", "", "bank");
			$res = mysqli_query($con, "SELECT balance FROM users WHERE id=$from_id");
            $bal = mysqli_fetch_assoc($res)['balance'];
            if($amt > $bal) 
			{
                echo "Insufficient Balance!";
            } 
			else 
			{
                $to_res = mysqli_query($con, "SELECT id FROM users WHERE username='$to'");
                if(mysqli_num_rows($to_res) == 1) 
				{
                    $to_id = mysqli_fetch_assoc($to_res)['id'];
                    mysqli_query($con, "UPDATE users SET balance = balance - $amt WHERE id = $from_id");
                    mysqli_query($con, "UPDATE users SET balance = balance + $amt WHERE id = $to_id");
                    echo "₹$amt transferred to $to successfully!";
                } 
				else 
				{
                    echo "Receiver not found!";
                }
            }
            mysqli_close($con);
        }
        ?>
    </div>
</body>
</html>
