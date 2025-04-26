<!DOCTYPE html>
<html>
<head>
    <title>SBI - User Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="main-box">
    <h2>User Login - SBI</h2>
    <form method="post">
        Username : <input type="text" name="username" placeholder="Enter username" required><br><br>
        Password : <input type="password" name="password" placeholder="Enter password" required><br><br>
        <input type="submit" name="login" value="Login"><br><br>
        <a href="register.php">New User? Register Here</a><br><br>
        <a href="index.php">Back to Home</a><br><br>
    </form>

    <?php
    session_start();
    if(isset($_POST['login'])) 
	{
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $con = mysqli_connect("localhost", "root", "", "bank");
        if(!$con)
		{
			die("Connection failed: " . mysqli_connect_error());
		}

        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) == 1) 
		{
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            echo "<p class='success'>Login successful!</p>";
            echo "<a href='dashboard.php'>Go to Dashboard</a>";
        } 
		else 
		{
            echo "<p class='error'>Invalid login, please try again.</p>";
        }
        mysqli_close($con);
    }
    ?>
</div>
</body>
</html>
