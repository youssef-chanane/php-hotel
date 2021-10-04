<?php
session_start();
    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Booking Hotel</title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li id="logo"><img src="images/hotel_booking.jpg"><a href="#">Booking Hotel</a></li>
                    <li><a href="signin.php"> Sign In </a></li>
                    <li><a href="gallerie.html"> Gallerie </a></li>
                    <li><a href="logout.php"> Logout </a></li>
                    <li><a href="#contacter"> Nous contacter </a></li>
                    <li><a href="#reserver"> Réserver </a></li>
                </ul>
            </nav>
            <div id="image_principale">
                <h1>
                    <span aria-hidden="true">Hotel Comfort</span>
                </h1>
                <h2> Hello, <?php echo $user_data['Username']; ?></h2>
            </div>
        </header>
        <footer>
            
        </footer>
    </body>
</html>