<?php
session_start();
if(!isset($_SESSION['userid'])) {
    echo "<a href='Login.php'>Go to Login</a><br>";
    exit;
}
?>
<html>
<head>
    <title>Apply for Loan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="main-box">
    <h2>SBI Loan Application</h2>
    <form method="post">
        Loan Type: 
        <select name="loan_type">
            <option value="Home">Home Loan</option>
            <option value="Personal">Personal Loan</option>
            <option value="Education">Education Loan</option>
        </select><br><br>
        Amount: <input type="text" name="amount" placeholder="Enter amount"><br><br>
        Duration (in years): <input type="text" name="duration" placeholder="Enter duration"><br><br>
        <input type="submit" name="apply" value="Apply Loan"><br><br>
        <a href="DashBoard.php">Back to Dashboard</a><br><br>
        <a href="index.php">Back to Home</a>
    </form>

    <?php
    if(isset($_POST['apply'])) {
        $type = $_POST['loan_type'];
        $amt = $_POST['amount'];
        $duration = $_POST['duration'];
        echo "Loan application submitted for ₹$amt as a $type Loan for $duration years.";
    }
    ?>
</div>
</body>
</html>
