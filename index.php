<?php



require_once 'config.php';
require_once 'userHeader.php';
$errors = array();
$message = '';
$userdata = new DB_con();



if (isset($_POST['submit1'])) {
    $cabStatus = '1';
    if (isset($_POST['luggage'])) {
        $luggage = $_POST['luggage'];
    }
    $luggage = '0';
    // $luggage = isset($_POST['luggage']) ? $_POST['luggage'] : '';
    $pickupL = isset($_POST['pickupL']) ? $_POST['pickupL'] : '';
    $dropL = isset($_POST['dropL']) ? $_POST['dropL'] : '';
    $fare = isset($_POST['fare']) ? $_POST['fare'] : '';
    $custUserid = $_SESSION['user_id'];
    $distance = $_SESSION["distance"];

    $sql = $userdata->bookCab($pickupL, $dropL, $distance, $luggage, $fare, $cabStatus, $custUserid);
    if ($sql) {
        echo "<script>alert('Cab Request sent successfully. Wait for Confirmation.');</script>";
        unset($_SESSION["distance"]);
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='index.php'</script>";
        unset($_SESSION["distance"]);
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>


<div id="message">
    <?php echo $message; ?>
</div>
<div id="errors">
    <?php if (sizeof($errors) > 0) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error['msg']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<div>
    <h3>Welcome <?php echo $_SESSION['name']; ?></h3>
</div>

<div id="divm" class="container">
    <h1>CedCab Takes you to your destination</h1>
    <p>Fill your travel details and book the cab</p>
    <div>

        <form id="myForm" action="" method="POST">
            <div>
                <label>Select Cab Type</label>
                <select name="cabType" id="dropdown1">
                    <option value="250">CedSUV</option>
                    <option value="200">CedRoyal</option>
                    <option value="150">CedMini</option>
                    <option value="50">CedMicro</option>
                </select>
            </div>
            <div>
                <label>Luggage Weight</label>
                <input id="dropdown2" name="luggage" type="text" placeholder="Weight">
            </div>
            <div>
                <label>PickUP Location</label>
                <select name="pickupL" id="dropdown3">

                    <?php
                    $sql = $userdata->availableLocations();
                    if ($sql > 0) {
                        while ($row = mysqli_fetch_array($sql)) {

                    ?>
                            <option id="<?php echo $row['location_id'] ?>" value="<?php echo $row['locDistance'] ?>"><?php echo $row['locationName'] ?></option>
                    <?php
                        }
                    } else {
                        // echo "0 results";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label>Dropping Location</label>
                <select name="dropL" id="dropdown4">
                    <?php
                    $sql = $userdata->availableLocations();
                    if ($sql > 0) {
                        while ($row = mysqli_fetch_array($sql)) {

                    ?>
                            <option id="<?php echo $row['location_id'] ?>" name="<?php echo $row['locationName'] ?>" value="<?php echo $row['locDistance'] ?>"><?php echo $row['locationName'] ?></option>
                    <?php
                        }
                    } else {
                        // echo "0 results";
                    }
                    ?>
                </select>
            </div>

            <div>
                <p><input id="button1" class="ryt" type="button" name="submit" value="Calculate Fare"></p>
            </div>
            <div>
                <p><input type="submit" class="ryt" name="submit1" value="Book Cab" <?php echo $style; ?>></p>
            </div>
            <div>
                <h3 <?php echo $style1; ?>>Please Login first and come back here to continue Booking!!</h3>
            </div>
            <div>
                <p>Cab Fare <input type="text" id="fare" name="fare" value="" readonly></p>
            </div>
        </form>

    </div>

</div>

<?php
require_once 'footer.php';
?>