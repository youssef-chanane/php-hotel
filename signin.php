<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        if(!empty($Username) && !empty($Password) && !is_numeric($Username))
        {
            //read from db
            $query = "select * from users where Username = '$Username' limit 1";

            $result = mysqli_query($con, $query);
            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['Password'] === $Password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php#");
                        die;
                    }

                }
            }
            echo"Please enter valid Password or Username!";
        }
        else
        {
            echo"Please enter valid Password or Username!";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign In</title>
        <link rel="stylesheet" href="style.css">
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
            <div class="class1">
                <legend style="text-align:center"><h2><b>Sign in</b></h2></legend>
                <p>
                    <input type="text" name="username" id="username" placeholder="Username" required><br>
                </p>
                <p>
                    <input type="password" name="password" id="password" placeholder="Password" required><br>
                </p>
                    <button>Se connecter</button> 
                    <p style="text-align:center"> Don’t you have an account? <a href="signup.php"> Sign Up </a><br>  </p>
            </div>  
        </form>
    </body>
</html>