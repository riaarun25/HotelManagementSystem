<?php
    include('index.php');
    include('Customer page.php');
    $result=$con->query("SELECT * FROM rooms");
    $Customer_ID =$_SESSION['Customer_ID'];
    $sql0="SELECT Customer_ID FROM booking WHERE Customer_ID='$Customer_ID';";
    $query0=mysqli_query($con,$sql0);
    $row = mysqli_fetch_array($query0) ;
    if($row){
        echo "<p class='submitMsg'><b>Booking already present, Only one booking per customer allowed</b></p>";
    }
    else{
        if(isset($_POST['Room_Type']))
        {
            $Check_In =$_POST['Check_In'];
            $Check_Out =$_POST['Check_Out'];
            $Room_Type =$_POST['Room_Type'];
            $sql="SELECT Room_No FROM rooms WHERE Type='$Room_Type'";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($query);
            $Room_No=$row['Room_No'];
            $sql1="SELECT Status from rooms WHERE Room_No='$Room_No'";
            $row= mysqli_fetch_assoc(mysqli_query($con,$sql1));
            if($row['Status']=='Booked'){
                echo "<p class='submitMsg'><b>Booking Failed! Room already booked<b></p>";
            }else{
                $sql2="INSERT INTO booking(Check_in,Check_out,Customer_ID,Room_No)
                VALUES('$Check_In','$Check_Out','$Customer_ID','$Room_No')";
                echo "<br>";
                $query2 = mysqli_query($con,$sql2);
                //To check if booking is successsful
                if(!$query2){  //if insertion into booking is successful
                    echo "<p class='submitMsg'><b>Booking Failed!<b></p>";
                }
                else{
                    $sql3="UPDATE rooms SET Status='Booked' WHERE Room_No='$Room_No'";
                    //echo $sql3;
                    $query3 = mysqli_query($con,$sql3);
                    //creating a bill
                    $sql4="SELECT Price from rooms WHERE Room_No='$Room_No'";
                    $Room_Price=(mysqli_fetch_assoc(mysqli_query($con,$sql4)))['Price'];
                    $sql5="INSERT INTO payment(Customer_ID,Total_Amount)
                    VALUES ('$Customer_ID',$Room_Price)";
                    mysqli_query($con,$sql5);
                    echo "<p class='submitMsgD'><b>Booking Successful!<b></p>";
                }
            }
        }
    }
    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Imperial</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1><center>Booking page</center></h1>
    </div>
    <?php
        echo "<table class='center' border='1'>
        <tr>
        <th><h1>Room Type</h1></th>
        <th><h1>Price</h1></th>
        </tr>";
        while($row = mysqli_fetch_assoc($result))
        {       
        echo "<tr>";       
        echo "<td><b>" . $row['Type'] . "</td>";         
        echo "<td>INR " . $row['Price'] . "</td>";  
        echo "</tr>";          
        }
        echo "</table>";
    ?>
        <form action="Booking page.php" method="POST">
            <br>
            <input style="width:200px;" type="date" name="Check_In" id="Check_In" placeholder="Enter Check in Date"  required>
            <input style="width:200px;" type="date" name="Check_Out" id="Check_Out" placeholder="Enter Check out date"  required>
            <br>
            <p><h4>Select Room Type:</h4></p><select style="width:200px;height:50px;" name="Room_Type"  required>
                <option value='Single'><button class='btn'>Single</button></option>
                <option value='Single AC'><button class='btn'>Single AC</button></option>
                <option value='Double'><button class='btn'>Double</button></option>
                <option value='Double AC'><button class='btn'>Double AC</button></option>                
                <option value='Deluxe'><button class='btn'>Deluxe</button></option>
                <option value='Deluxe AC'><button class='btn'>Deluxe AC</button></option>
                <option value='Suite'><button class='btn'>Suite</button></option>
                <option value='Suite AC'><button class='btn'>Suite AC</button></option>
            </select>
            <br>
            <button class="btn">Book my room!</button> 
        </form>
        <br><br>
</body>
<br>
<br>
</html>
