<html>
    <?php 
        include('index.php');
        include('employee page.php');
        $result=$con->query("SELECT * FROM rooms");
        echo "<table class='center' border='1'>
            <tr>
            <th><h1>Room_No</th>
            <th><h1>Type</h1></th>
            <th><h1>Price</h1></th>
            <th><h1>Status</h1> </th>
            </tr>";
            while($row = mysqli_fetch_assoc($result))
            {       
            echo "<tr>";       
            echo "<td><b>" . $row['Room_No'] . "</b></td>";          
            echo "<td>" . $row['Type'] . "</td>";         
            echo "<td>" . $row['Price'] . "</td>";  
            if($row['Status']=="Booked")     {
                echo "<td><p class='submitMsg'>" . $row['Status'] . "</p></td>";         
            }else{
                echo "<td><p class='submitMsgD'>" . $row['Status'] . "</p></td>";  
            }
            
            echo "</tr>";          
            }
            echo "</table>";
    ?>
    <br>
    <br>
    <br>
</html>
