<?php
  include('index.php');
  include('Customer page.php');
  $result=mysqli_query($con,"SELECT * FROM services");
  if(isset($_POST['Service'])){
  //if($check==1){
    $Customer_ID =$_SESSION['Customer_ID'];
    $Service=$_POST['Service'];
    $sql="SELECT * FROM services WHERE description='$Service';";
    $query=mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    $Service_No=$row['Service_No'];  //service number extracted
    $Price=$row['Price']; //price of service extracted
    
    //Inserting into orders table
    $sql2= "INSERT INTO orders(Customer_ID,Service_No) VALUES ('$Customer_ID','$Service_No');";
    $query2=mysqli_query($con,$sql2);   

    //updating the bill of customer
    //Checking if there exists a bill of a particular customer and updating the bill/Generating bill
    $sql3="SELECT Total_Amount FROM payment WHERE Customer_ID = '$Customer_ID';";
    $query3=mysqli_query($con,$sql3);  
    $row = mysqli_fetch_assoc($query3);
    if($row){
      $old_amount=$row['Total_Amount'];     //previous bill total amount
      $new_amount=$old_amount+$Price;
      $sql4="UPDATE payment
      SET Total_Amount=$new_amount
      WHERE Customer_ID='$Customer_ID';";
      $query4=mysqli_query($con,$sql4);
    }else{
      $sql4="INSERT INTO payment(Customer_ID,Total_Amount)
      VALUES('$Customer_ID',$Price);";
      $query4=mysqli_query($con,$sql4);
    }
    if($query2 && $query3 && $query4){
      echo "<p class='submitMsgD'><b>Service Confirmed!<b></p>";
      echo "<p class='submitMsgD'><b>Service will be provided shortly.<b></p><br>";
    }
    /*else{
      echo"Error: $sql2 <br> $con->error <br>";
    }*/
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
    <h1><center>Service page</center></h1>
    </div>
    <?php
      if(mysqli_num_rows($result)>0){
          echo "<table class='center' border='1'>
          <tr>
          <th><h1>Service</h1></th>
          <th><h1>Pricing</h1></th>
          </tr>";
          while($row = mysqli_fetch_assoc($result))
          {       
              echo "<tr>";       
              echo "<td>" . $row['description'] . "</td>";          
              echo "<td>" . $row['Price'] . "</td>";         
              echo "</tr>";          
          }
          echo "</table>";
      }
    ?>
        <form action="orders page.php" method="POST">
            <br>
            <p><h4>Select Service:</h4></p>
            <br>
            <select style="width:200px;height:50px;" name="Service" >
            <br>
            <br>
              <option value='Laundry'><button class='btn'>Laundry</button></option>
              <option value='Beverages'><button class='btn' selected>Beverages</button></option>                
              <option value='Lunch'><button class='btn'>Lunch</button></option>
              <option value='Dinner'><button class='btn'>Dinner</button></option>
              <option value='Room Cleaning'><button class='btn'>Room Cleaning</button></option>
            </select>
            <br>
            <button class="btn">Confirm service!</button> 
        </form>
</body>
<br>
<br>
</html>
