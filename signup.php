<?php
session_start();
    include("connection.php");
    include("functions.php");
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $Name = $_POST['name'];
        if(!empty($Username) && !empty($Password) && !is_numeric($Username))
        {
            //save to db
            $user_id = random_num(20);
            $query = "insert into users (user_id,Username,Name,Password) values('$user_id','$Username','$Name','$Password')";

            mysqli_query($con, $query);

            header("Location: signin.php");
            die;
        }else
        {
            echo"Please enter valid informarion!";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li id="logo"><img src="images/hotel_booking.jpg"><a href="home.html">Booking Hotel</a></li>
                    <li><a href="signin.php"> Sign In </a></li>
                    <li><a href="gallerie.html"> Gallerie </a></li>
                    <li><a href="#contacter"> Nous contacter </a></li>
                    <li><a href="#reserver"> Réserver </a></li>
                </ul>
            </nav>
        </header>
        <form method="POST" target="_self">
            <legend>Sign Up</legend><br>
                <label for="Name">Name: </label><br>
                <input type="text" name="name" id="name" placeholder="Enter your name" required><br>
                <label for="Username">Username: </label><br>
                <input type="text" name="username" id="username" placeholder="Username" required><br>
                <label for="Password">Password: </label><br>
                <input type="Password" name="password" id="password" placeholder="Password" required><br>
                <input type="submit" name="Register" id="Register" value="Register">
                <input type="reset" name="Annuler" id="Annuler" value="Cancel">
            <p> Do you have an account? <a href="signin.php"> Sign In </a><br> </p>
        </form>
    </body>
</html>