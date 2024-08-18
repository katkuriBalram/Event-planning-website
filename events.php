<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../planb/style.css">
    <script src="https://kit.fontawesome.com/57e124b3e1.js" crossorigin="anonymous"></script>
    <title>Events | PlanB</title>
    <style>
        .header-content{
            background-color: rgba(240, 154, 73, 1);
        }
    </style>
</head>

<body>

    <header>
        <div class="header-content" id="header">
            <div class="logo">
                <img src="../planb/images/logo-white.png" alt="Company Logo">
                <a href="../planb/index.php">PlanB</a>
                <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
            </div>
            <nav>
                <a class='nav' href="../planb/index.php">Home</a>
                <a class='nav' href="../planb/services.php">Services</a>
                <a class='nav' href="../planb/events.php">Events</a>
                <a class='nav' href="#">About</a>
                <?php
                if (isset($_SESSION['username'])) {
                    // echo '<span class="nav">Welcome, ' . $_SESSION['username'] . '!</span>';
                    echo '<a class="nav" href="account.php"><i class="fa-solid fa-user"></i></a>';
                } else {
                    echo '<a class="nav" href="login.php">Login</a>';
                }
                ?>
            </nav>
        </div>
    </header>

    <main>
        <div class="events_banner">
            <h1>Events</h1>
            <div class="events-page">
                <!-- <a href="#"></a> -->
                <img src="images/events/marriage.jpg" alt="marriage">
                <section>
                    <h2>Marriages</h2>
                    <p>Make your life's most important event even more special<br>Book your favorite venue</p><br>
                    <a href="./events/venues.php#venue_marriage">Explore Now</a>
                </section>
            </div>
            <div class="events-page">
                <!-- <a href="#"></a> -->
                <section>
                    <h2>Sangeet</h2>
                    <p>Make your life's most important event even more special<br>Book your favorite venue</p><br>
                    <a href="./events/venues.php#venue_sangeet">Explore Now</a>
                </section>
                <img src="images/events/sangeet.jpeg" alt="sangeet">
            </div>
            <div class="events-page">
                <!-- <a href="#"></a> -->
                <img src="images/events/birthday.jpg" alt="birthday">
                <section>
                    <h2>Birthdays</h2>
                    <p>Make your life's most important event even more special<br>Book your favorite venue</p><br>
                    <a href="./events/venues.php#venue_birthday">Explore Now</a>
                </section>
            </div>
            <div class="events-page">
                <!-- <a href="#"></a> -->
                <section>
                    <h2>Conferences</h2>
                    <p>Make your life's most important event even more special<br>Book your favorite venue</p><br>
                    <a href="./events/venues.php#venue_conference">Explore Now</a>
                </section>
                <img src="images/events/conference.jpg" alt="conference">
            </div>
        </div>
    </main>

</body>
</html>