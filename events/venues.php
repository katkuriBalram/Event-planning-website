<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../events/venues_style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/57e124b3e1.js" crossorigin="anonymous"></script>
    <title>Venues | PlanB</title>
</head>

<body>

    <header>
        <div class="header-content" id="header">
            <div class="logo">
                <img src="../images/logo-white.png" alt="Company Logo">
                <a href="../index.php">PlanB</a>
            </div>
            <nav>
                <a class="nav" href="../index.php">Home</a>
                <a class="nav" href="../services.php">Services</a>
                <a class="nav" href="../events.php">Events</a>
                <a class="nav" href="#">About</a>
                <?php
                if (isset($_SESSION['username'])) {
                    // echo '<span class="nav">Welcome, ' . $_SESSION['username'] . '!</span>';
                    echo '<a class="nav" href="../account.php"><i class="fa-solid fa-user"></i></a>';
                } else {
                    echo '<a class="nav" href="../login.php">Login</a>';
                }
                ?>
            </nav>
        </div>
    </header>

    <main>
        <div class="service_banner">
            <h1>Explore Venues</h1>
            <div class="venue_marriage" id="venue_marriage">
                <h2>Top Marriage Venues and Event Managers</h2>
                <div class="inner1" id="inner1">

                </div>
            </div>
            <div class="venue_marriage" id="venue_sangeet">
                <h2>Top Sangeet Venues and Event Managers</h2>
                <div class="inner1" id="inner2">

                </div>
            </div>
            <div class="venue_marriage" id="venue_birthday">
                <h2>Top Birthday Venues</h2>
                <div class="inner1" id="inner3">

                </div>
            </div>
            <div class="venue_marriage" id="venue_conference">
                <h2>Top Conference Halls</h2>
                <div class="inner1" id="inner4">

                </div>
            </div>
        </div>
    </main>

    <script src="showmore.js"></script>

</body>
</html>