<?php

error_reporting(E_ALL & ~E_NOTICE);
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '3') {
    $style1 = "style='display:none;'";
} elseif (isset($_SESSION['user_id']) && $_SESSION['user_id'] == '3') {
    header('location:logout.php');
} else {
    $style = "style='display:none;'";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="scriptCED.js"></script>
    <link rel="stylesheet" href="styleCEDCAB.css">
</head>

<body>
    <ul>
        <li><a class="primary" href="#">Ced<span>Cab</span></a></li>
        <li><a href="login.php" name="login" <?php echo $style1; ?>>Login/ Signup Here</a></li>
        <li><a href="userDashboard.php"<?php echo $style; ?>>Home</a></li>
        <li><a href="index.php"<?php echo $style; ?>>Book New Ride</a></li>
        <li class="dropdown"<?php echo $style; ?>>
            <a href="javascript:void(0)" class="dropbtn">Rides</a>
            <div class="dropdown-content">
                <a href="userPendingR.php">Pending</a>
                <a href="userCompletedR.php">Completed</a>
                <a href="userAllR.php">All Rides</a>
            </div>
        </li>
        <li class="dropdown"<?php echo $style; ?>>
            <a href="javascript:void(0)" class="dropbtn">Account</a>
            <div class="dropdown-content">
                <a href="updateUser.php">Update Information</a>
                <a href="userPassword.php">Change Password</a>
            </div>
        </li>
        <li><a href="logout.php" name="logout"<?php echo $style; ?>>Logout Here</a></li>
    </ul>
<div id="main">