<?php
    $host="localhost";
    $user="root";
    $password="";
    $database="temp";

    $conn=mysqli_connect($host,$user,$password,$database);

    if($conn)
    {
        // echo"successfull connected";
    }
    else{
        echo"fail connected";
    }
?>