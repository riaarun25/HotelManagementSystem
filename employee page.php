<html>
    <br>
    <div class="wrapper"><div class="container">
        <body>
            <nav>
            <a href="employee page.php"><u><h1>Employee portal</h1></u></a>
            <a href="home.php?logout=success"><button class="btn2"><p style="text-align:right;">Log out?</p></button></a>
            <?php
                session_start();
                $record2=$_SESSION['Name'];
                echo"<h1>Welcome $record2 !</h1>";
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
    <title>Employee portal</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <br>
    <div class="container">
        <nav>
            <a href="employee list.php"><button class="btn">Employees list</button></a>
            <a href="Customers list.php"><button class='btn'>Customers List</button></a>
            <a href="Rooms.php"><button class='btn'>View Rooms status</button></a>
            <a href="Orders.php"><button class="btn">View Orders list</button></a>
            <a href="Bookings.php"><button class="btn">Bookings list</button></a>
            <a href="Check out.php"><button class="btn">Check Out</button></a>
        </nav>
    </div>
    <div class="footer">
    <h4>Copyright 2020 Hotel Imperial | All rights reserved.</h4>
    </div>
</body>
</html>
