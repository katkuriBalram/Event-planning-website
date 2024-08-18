<?php
session_start();
include("connect.php");
// include("date_time.php");

$bk_photo = '';
$bk_title = '';
$bk_phone = '';
$bk_location = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bk_photo = $_POST['bk_photo'] ?? '';
    $bk_title = $_POST['bk_title'] ?? '';
    $bk_phone = $_POST['bk_phone'] ?? '';
    $bk_location = $_POST['bk_location'] ?? '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../planb/style.css">
    <link rel="stylesheet" href="../planb/confirmation.css">
    <script src="https://kit.fontawesome.com/57e124b3e1.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <title>Confirmation | PlanB</title>
</head>

<body>
    <header>
        <div class="header-content" id="header">
            <div class="logo">
                <img src="../planb/images/logo-white.png" alt="Company Logo">
                <a href="../planb/index.php">PlanB</a>
            </div>
            <nav>
                <a class='nav' href="../planb/index.php">Home</a>
                <a class='nav' href="../planb/services.php">Services</a>
                <a class='nav' href="../planb/events.php">Events</a>
                <a class='nav' href="#">About</a>
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a class="nav" href="account.php"><i class="fa-solid fa-user"></i></a>';
                } else {
                    echo '<a class="nav" href="login.php">Login</a>';
                }
                ?>
            </nav>
        </div>
    </header>

    <div class="outer" style='margin-top:13%;'>
        <div class="left">
            <h1>Booking Confirmed!</h1>
            <!-- <h3><?php //echo htmlspecialchars($bk_title); ?></h3> -->
            <h3>Lakshmi Events</h3>
            <?php echo '<a href="tel:' . htmlspecialchars($bk_phone) . '">Call <i class="fa-solid fa-arrow-up-right-from-square"></i></a>'; ?>
            <!-- <?php //echo '<a href="' . htmlspecialchars($bk_location) . '" target="_blank">Location <i class="fa-solid fa-arrow-up-right-from-square"></i></a>'; ?> -->
            <a href="https://www.google.com/maps/place/Lakshmi+Events+-+(Wedding+Planning+%26+Event+Management+Company)/@17.3570237,78.5177087,17z/data=!3m1!4b1!4m6!3m5!1s0x3bcb994ad16d0c63:0x71b8d2b4f79fccf!8m2!3d17.3570186!4d78.5202836!16s%2Fg%2F11n1qsjpbn?authuser=0&entry=ttu" target="_blank">Location <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="right">
            <div class="date-time">
                <div>
                    <h1 style='margin:0;'><?php echo $_SESSION['day'] ?> </h1>
                    <p style='margin:0;'><?php echo $_SESSION['month'] ?></p>
                </div>
                <!-- <h3>Time</h3> -->
            </div>
        </div>
    </div>
</body>
</html>
