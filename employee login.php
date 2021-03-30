<?php include('home.php');?>
<?php  
    session_start();
    if(isset($_POST['Emp_ID']))
	{
        $record = $_POST["Emp_ID"];
        $record2 = $_POST["Name"];  
        $pass=0;
        //$_SESSION['Name']=$record2;
        $sql="SELECT Designation FROM employee WHERE Emp_ID='$record' AND Name ='$record2'";
        $query = mysqli_query($con,$sql);
        echo "<br>";
        $row = mysqli_fetch_assoc($query);
        if($row){
            $manager= $row['Designation'];
            //echo $manager;
            if($manager=='Manager'){
                if($_POST["Pass"]=='123456'){
                    $_SESSION['Name'] = $record2;
                    header("Location:employee page.php?login=success"); 
                }else{
                    $pass=1;
                }
            }else{
                $pass=1;
            }
        }else{
            $pass=1;
        }
        if($pass==1){
            echo "<p class='submitMsg'><b>Access Denied!<b></p>";
        }
    }
    echo "<br>";
?>
<h1><center>Employee Login portal</center></h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel imperial</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="employee login.php" method="POST">
            <input style="width:250px;" type="text" name="Emp_ID" id="Emp_ID" placeholder="Enter your Employee ID" maxlength=4 minlength=4 required>
            <input style="width:250px;" type="text" name="Name" id="Name" placeholder="Enter your Name"  required>
            <input style="width:250px;" type="password" name="Pass" id="Pass" placeholder="Enter password"  required>
            <button class="btn">Login</button> 
        </form>
    </div>
</body>
</html>
