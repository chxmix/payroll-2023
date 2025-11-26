<?php 

include("login_process.php");

$user_id = $_POST["user_id"];


$new_name = $_POST["new_name"];
$new_address = $_POST["new_employeetype"];
$new_email = $_POST["new_position"];

mysqli_query($connections, "UPDATE employeetbl SET name='$new_name', type='$new_type', position='$new_position' WHERE Id='$user_id'");

echo "<script language='javascript'>alert('Record has been updated!')</script>";
echo "<script>window.location.href='index.php';</script>"

?>