
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
        <li><a href="adminDashboard.php">Home</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Rides</a>
            <div class="dropdown-content">
                <a href="cabRequests.php">Pending</a>
                <a href="completedRides.php">Completed</a>
                <a href="cancelledRides.php">Cancelled</a>
                <a href="allRides.php">All Rides</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Users</a>
            <div class="dropdown-content">
                <a href="admin.php">Pending</a>
                <a href="customers.php">Approved</a>
                <a href="allUsers.php">All Users(Get Invoice)</a>
            </div>
        </li>
        <li><a href="locations.php">Manage Locations</a></li>
        <li><a href="adminPassword.php">Change Password</a></li>
        <li><a href="logout.php" name="logout">Logout Here</a></li>
    </ul>
<div id="main">