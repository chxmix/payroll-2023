<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "payrolldb");

if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>