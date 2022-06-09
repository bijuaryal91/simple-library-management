<?php
    $db_host="localhost";
    $db_user="root";
    $db_password="";
    $db_name="libaryintern";

    $conn=mysqli_connect($db_host,$db_user,$db_password,$db_name);
    if(!$conn)
    {
        echo mysqli_error();
    }
?>