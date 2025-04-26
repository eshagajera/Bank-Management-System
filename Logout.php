<?php
session_start();
session_destroy();
?>
<html>
<head>
    <title>Logout</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="main-box">
        <h2>You are logged out.</h2>
        <a href="Login.php">Login Again</a><br><br>
        <a href="index.php">Back to Home</a><br><br>
    </div>
</body>
</html>
