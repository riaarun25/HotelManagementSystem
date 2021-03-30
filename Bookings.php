<html>
    <?php 
        include('index.php');
        include('employee page.php');
        $result=$con->query("SELECT * FROM booking");
         if(mysqli_num_rows($result)>0){
             echo "<table class='center' border='1'>
             <tr>
             <th><h1>Booking No</th>
             <th><h1>Check in</h1></th>
             <th><h1>Check out</h1></th>
             <th><h1>Customer ID</h1></th>
             <th><h1>Room No</h1></th>
             </tr>";
             while($row = mysqli_fetch_assoc($result))
             {       
                 echo "<tr>";       
                 echo "<td>" . $row['Booking_No'] . "</td>";          
                 echo "<td>" . $row['Check_in'] . "</td>";  
                 echo "<td>" . $row['Check_out'] . "</td>";  
                 echo "<td>" . $row['Customer_ID'] . "</td>";         
                 echo "<td>" . $row['Room_No'] . "</td>";                
                 echo "</tr>";          
             }
             echo "</table>";
         }else{
            echo "<div class='container'><h1>NO BOOKINGS!</h1></div>";
            }
    ?>
    <br>
    <br>
    <br>
</html>
