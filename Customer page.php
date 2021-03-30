<html>
    <br>
    <div class="wrapper"><div class="container">
        <body>
            <nav>
            <a href="customer page.php"><u><h1>Customer Page</h1></u></a>
            <a href="home.php?logout=success"><button class="btn2"><p style="text-align:right;">Log out?</p></button></a>
            <?php
                session_start();
                echo"<h1>Welcome !</h1>";
            ?>
            </nav>
            </body>
        </div>
    </div>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <br>
    <div class="container">
        <nav>
            <a href="Booking page.php"><button class='btn'>Make a booking?</button></a>
            <a href="orders page.php"><button class="btn">Services</button></a>
        </nav>
        <br>
    </div>
    <div class="footer">
    <h4>Copyright 2020 Hotel Imperial | All rights reserved.</h4>
    </div>
</body>
</html>
