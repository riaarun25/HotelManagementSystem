<?php
    $servername = "localhost";
    $username = "root";
    $password = "8567";
    $dbname = "hotelms";       //database name
    //making an connection
    $con = mysqli_connect($servername,$username,$password,$dbname);
    if(!$con){          //if $con does not return true
        die("Connection failed due to ".mysqli_connect_error());
    }else{
        //echo "Connection successful <br><br>";
    }
?>
