<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="booking_style.css">
    <link rel="stylesheet" href="../planb/style.css">
    <!-- <link rel="stylesheet" href="venues_style.css"> -->
    <script defer src="../planb/booking.js"></script>
    <script src="https://kit.fontawesome.com/57e124b3e1.js" crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <div class="header-content" id="header" style="background-color: rgba(240, 154, 73, 1);">
            <div class="logo">
                <img src="../planb/images/logo-white.png" alt="Company Logo">
                <a href="../planb/index.php">PlanB</a>
            </div>
            <nav>
                <a class="nav" href="../planb/index.php">Home</a>
                <a class="nav" href="../planb/services.php">Services</a>
                <a class="nav" href="../planb/events.php">Events</a>
                <a class="nav" href="#">About</a>
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
    
    <form action="../planb/date_time.php" method="post">
        <main class="bookings-main">
            <div id="booking-container" class="booking-container">
                <img id="booking-photo" class="rows" src="" alt="" style="width: 50%; height: 20%;">
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
                <div class="dates rows">
                    <div style="display: flex; width: 100%; justify-content: space-around; align-items: center; gap: 20px;">
                        <label style="width: 20%;"><input type="radio" name="time" value="full-day" required>Full-Day</label>
                        <label style="width: 20%;"><input type="radio" name="time" value="custom-time" required>Custom-Time</label>
                        <div id="custom-time-input" style="display: none; width: 60%;">
                            <label>Start Time: <input type="time" name="start-time"></label>
                            <label>End Time: <input type="time" name="end-time"></label>
                        </div>
                    </div>
                    <input type="date" name="date" required>
                </div>
            </div>
            <!-- <a class="book" onclick='bookingConfirmation()'>Book Now</a> -->
            <input type="submit" name="" value="Book Now" class="book" style="font-family: 'Alilato';" />
        </main>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const customTimeRadio = document.querySelector('input[name="time"][value="custom-time"]');
            const fullDayRadio = document.querySelector('input[name="time"][value="full-day"]');
            const customTimeInput = document.getElementById('custom-time-input');

            customTimeRadio.addEventListener('change', () => {
                if (customTimeRadio.checked) {
                    customTimeInput.style.display = 'block';
                }
            });

            fullDayRadio.addEventListener('change', () => {
                if (fullDayRadio.checked) {
                    customTimeInput.style.display = 'none';
                }
            });
        });

        function bookingConfirmation() {
            const container = document.querySelector('.bookings-main'); // Fix the selector here
            const h2 = document.createElement('h2'); // Use 'h2' instead of 'h1'
            h2.className = 'confirm';
            h2.innerHTML = 'Booking Confirmed';
            container.appendChild(h2);
        }
    </script>
</body>
</html>
