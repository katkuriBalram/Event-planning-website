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
    <!-- <link rel="stylesheet" href="venues_style.css"> -->
    <script src="https://kit.fontawesome.com/57e124b3e1.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <title>PlanB</title>
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
                    // echo '<span class="nav">Welcome, ' . $_SESSION['username'] . '!</span>';
                    echo '<a class="nav" href="account.php"><i class="fa-solid fa-user"></i></a>';
                } else {
                    echo '<a class="nav" href="login.php">Login</a>';
                }
                ?>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="overlay">
            <div class="text-content">
                <h1>Discover the Perfect Event Venue</h1>
                <p>Experience seamless event management with a selection of premier venues. <br>Start planning your dream event with us today.</p>
            </div>
            <div class="explore">
                <a href="#events"><b>Explore Events</b></a>
                <a href="#venues"><b>Explore Venues</b></a>
            </div>
        </div>
    </main>
    
    <section id="events">
        <h1 class="name top">Events</h1>
        <div class="events">
            <a href="../planb/events/venues.php#venue_marriage" class="row marriage left">
                Marriage
            </a>
            <a href="../planb/events/venues.php#venue_sangeet" class="row sangeet right">
                Sangeet
            </a>
            <a href="../planb/events/venues.php#venue_birthday" class="row birthday left">
                Birthday
            </a>
            <a href="../planb/events/venues.php#venue_conference" class="row conference right">
                Conference
            </a>
        </div>
    </section>
    
    <section id="venues">
        <h1 class="name top">Venues</h1>
        <div class="venues">
            <div class="in" id="inner1">
            
            </div>
        </div>
    </section>

    <div class="overlay">
        <div class="text-content">
            <h1>Discover the Perfect Event Venue</h1>
            <p>Experience seamless event management with a selection of premier venues. <br>Start planning your dream event with us today.</p>
        </div>
    </div>
    <div class="overlay">
        <div class="text-content">
            <h1>Discover the Perfect Event Venue</h1>
            <p>Experience seamless event management with a selection of premier venues. <br>Start planning your dream event with us today.</p>
        </div>
    </div>

    <script>
        function debounce(func, wait = 10, immediate = true) {
                let timeout;
                return function () {
                    const context = this, args = arguments;
                    const later = function () {
                        timeout = null;
                        if (!immediate) func.apply(context, args);
                    };
                    const callNow = immediate && !timeout;
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                    if (callNow) func.apply(context, args);
                };
            }

            document.addEventListener('scroll', debounce(function () {
                const header = document.getElementById('header');
                const scrollPosition = window.scrollY;
                const maxScroll = 300; // The scroll position at which the header is fully opaque
                let opacity = scrollPosition / maxScroll;

                // Cap the opacity at 1
                if (opacity > 1) {
                    opacity = 1;
                }

                header.style.backgroundColor = `rgba(240, 154, 73, ${opacity})`;
            }));


            document.addEventListener('DOMContentLoaded', function () {
                    const rows = document.querySelectorAll('.row, .name');

                    const observer = new IntersectionObserver(entries => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('animate', 'anim');
                            }
                            // else {
                            //     entry.target.classList.remove('animate', 'anim');
                            // }
                        });
                    }, { threshold: 0.2 });

                    rows.forEach(row => observer.observe(row));
                });

    </script>
    <script src="home_venues.js"></script>

</body>
</html>
