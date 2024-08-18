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
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/57e124b3e1.js" crossorigin="anonymous"></script>
    <title>Services | PlanB</title>
    <style>
        .header-content{
            background-color: rgba(240, 154, 73, 1);
        }

        main div{
            font-size: 50px;
            margin-top: 180px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>

    <header>
        <div class="header-content" id="header">
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

    <main>
        <!-- <div class="service_banner">
            <h1>Services</h1>
        </div> -->
        <div>
            Coming Soon..
        </div>
    </main>

</body>
</html>