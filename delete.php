<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "payrolldb");

$sql = "DELETE FROM attendancetbl WHERE userid='" . $_GET["userid"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>