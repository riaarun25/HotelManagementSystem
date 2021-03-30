<html>
    <?php 
        include('index.php');
        include('employee page.php');
        if(isset($_POST['Customer_ID']))
	    {
            $record = $_POST["Customer_ID"];  
            $sql="SELECT Customer_ID FROM payment WHERE Customer_ID='$record'";
            $query = mysqli_query($con,$sql);
            echo "<br>";
            if(mysqli_num_rows($query)>0){
                $sql2="SELECT rooms.Room_No
                FROM customer
                JOIN booking ON customer.Customer_ID = booking.Customer_ID
                JOIN rooms ON booking.Room_No = rooms.Room_No
                WHERE Customer.Customer_ID=$record";
                $query2=mysqli_query($con,$sql2);
                if(mysqli_num_rows($query2)>0){
                    while($row = mysqli_fetch_assoc($query2))
                    { 
                        $room=$row['Room_No'];
                    }
                    $sql3="UPDATE rooms
                    set status='Available'
                    where Room_No='$room'";
                    //echo $sql3;
                    mysqli_query($con,$sql3);
                }
                $sql4="SELECT * FROM payment WHERE Customer_ID=$record";
                $query4=mysqli_query($con,$sql4);
                echo "<table class='center' border='1'>
                <tr>
                <th><h1>Bill No</th>
                <th><h1>Customer ID</h1></th>
                <th><h1>Total Amount</h1></th>
                </tr>";
                while($row = mysqli_fetch_assoc($query4))
                {       
                    echo "<tr>";       
                    echo "<td>" . $row['Bill_No'] . "</td>";          
                    echo "<td>" . $row['Customer_ID'] . "</td>";         
                    echo "<td>" . $row['Total_Amount'] . "</td>";                
                    echo "</tr>";          
                }
                echo "</table>";
                echo "<br>";
                echo "<p class='submitMsgD'><b>Customer successfully Checked out<b></p>"; 
                $sql5="DELETE FROM payment
                WHERE Customer_ID=$record";
                mysqli_query($con,$sql5);
                $sql6="DELETE FROM booking
                WHERE Customer_ID=$record";
                mysqli_query($con,$sql6);
                $sql7="DELETE FROM orders
                WHERE Customer_ID=$record";
                mysqli_query($con,$sql7);
            }
            else{
                echo "<p class='submitMsg'><b>Searched Customer Not Found!<b></p>";
            }
        }
    ?>
    <body>
        <div class="container">
            <form action="Check out.php" method="POST">
                <input style="width:200px;" type="text" name="Customer_ID" id="Customer_ID" placeholder="Enter Customer ID" maxlength=12 minlength=12 required>
                <button class="btn">Check Out</button> 
            </form>
        </div>
    </body>
</html>
