<?php
session_start();
include("connect.php");
// include("signin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../planb/style.css">
    <link rel="stylesheet" href="../planb/accounts.css">
    <link rel="stylesheet" href="booking_style.css">
    <!-- <link rel="stylesheet" href="venues_style.css"> -->
    <script src="https://kit.fontawesome.com/57e124b3e1.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <style>
        .header-content{
            background-color: rgba(240, 154, 73, 1);
        }

        .right{
            display: none;
        }
    </style>
    <title>Profile | PlanB</title>
</head>

<body style= "background: url('images/profile.jpg') no-repeat center center fixed; background-size: cover;">

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
                    // echo '<span class="nav">Welcome, ' . $_SESSION['username'] . '!</span>';
                    echo '<a class="nav" href="account.php"><i class="fa-solid fa-user"></i></a>';
                } else {
                    echo '<a class="nav" href="login.php">Login</a>';
                }
                ?>
            </nav>
        </div>
    </header>
    <div class="hero" style='margin-top: 120px;'>
        <h2>Welcome, <?php echo $_SESSION['username'] ?> !</h2>
        <div class="content">
            <div class="left">
            <h3 id="personal-info-tab" style="cursor: pointer;">Personal Information</h3>
            <h3 id="bookings-tab" style="cursor: pointer;">Bookings</h3>
            <h3><a class="logout" href="logout.php">Logout</a></h3>
            </div>
            <div class="right" id='personal_info'>
                <table>
                    <tr>
                        <th class='keys'>Name</th>
                        <th class='values'><?php echo $_SESSION['username'] ?></th>
                    </tr>
                    <tr>
                        <th class='keys'>Email</th>
                        <th class='values'><?php echo $_SESSION['email'] ?></th>
                    </tr>
                    <tr>
                        <th class='keys'>Phone Number</th>
                        <th class='values'><?php echo $_SESSION['phone'] ?></th>
                    </tr>
                    <tr>
                        <th class='keys'>Location</th>
                        <th class='values'><?php echo $_SESSION['city'].', '.$_SESSION['state'] ?></th>
                    </tr>
                </table>
            </div>

            <div class="right" id='booking_info'>
                <div class="info rows">
                    <h3 id="booking-title"></h3>
                    <div class="info_inner">
                        <p id="booking-rating" style="margin: 0; width: 100%;"></p>
                        <div style="display: flex; flex-direction: row; width: 100%; justify-content: center; align-items: center; padding: 15px;">
                            <a id="booking-phone" href="" style="padding: 0 10px;"><i class="fa-solid fa-phone" style="color: green;"></i></a>
                            <a id="booking-location" href="" target="_blank" style="padding: 0 10px;"><i class="fa-solid fa-location-arrow" style="color: black;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const personalInfoTab = document.getElementById('personal-info-tab');
            const bookingsTab = document.getElementById('bookings-tab');
            const personalInfoSection = document.getElementById('personal_info');
            const bookingsSection = document.getElementById('booking_info');

            personalInfoTab.addEventListener('click', () => {
                personalInfoSection.style.display = 'block';
                bookingsSection.style.display = 'none';
            });

            bookingsTab.addEventListener('click', () => {
                personalInfoSection.style.display = 'none';
                bookingsSection.style.display = 'block';
            });
        });
    </script>

</body>
</html>
