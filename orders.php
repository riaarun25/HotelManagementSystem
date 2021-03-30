<html>
    <?php 
        include('index.php');
        include('employee page.php');
        $result=$con->query("SELECT * FROM orders");
         if(mysqli_num_rows($result)>0){
             echo "<table class='center' border='1'>
             <tr>
             <th><h1>Order No</th>
             <th><h1>Customer ID</h1></th>
             <th><h1>Service No</h1></th>
             </tr>";
             while($row = mysqli_fetch_assoc($result))
             {       
                 echo "<tr>";       
                 echo "<td>" . $row['Order_No'] . "</td>";          
                 echo "<td>" . $row['Customer_ID'] . "</td>";         
                 echo "<td>" . $row['Service_No'] . "</td>";                
                 echo "</tr>";          
             }
             echo "</table>";
         }else{
            echo "<div class='container'><h1>NO ORDERS!</h1></div>";
            }
    ?>
    <br>
    <br>
    <br>
</html>
