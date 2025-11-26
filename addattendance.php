<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Adminlogin.html");
}
	$name = $timein = $timeout = $date = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
<a href="attendance.php" style="text-decoration: none;"><button class="btn">BACK</button></a>
    <div class="container">

        <div class="box form-box">
            <header>ADD ATTENDANCE</header> <br>
            <form action="" method="POST" onsubmit="return validateLoginForm()">
                <br>
                <div class="field input">
                    <label>Name</label>
                    <input type="text" required name="name" id="name"><br>
                </div>

                <div class="field input">
                    <label>Time in</label>
                    <input type="time" required name="time_in" id="time_in" ><br>
                </div>

                <div class="field input">
                    <label>Time out</label>
                    <input type="time" required name="time_out" id="time_out"><br>
                </div>

                <div class="field input">
                    <label>Date</label>
                    <input type="date" required name="date" id="date"><br>
                </div>

                <div class="field">
                    <div class="button">
                        <input type="submit" class="btn" name="submit" value="add attendance">
                    </div>

                </div>

            </form>
        </div>
    </div>
</body>

</html>

<?php

include("connection.php");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $timein = $_POST['time_in'];
    $timeout = $_POST['time_out'];
    $date = $_POST['date'];

    if($name && $timein && $timeout && $date){
    $query = mysqli_query($connection, "INSERT INTO attendancetbl (name,timein,timeout,date)VALUES('$name', '$timein', '$timeout', '$date')");
    echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
    echo "<script>window.location.href='addattendance.php';</script>";
}
}

$view_query = mysqli_query($connection, "SELECT * FROM attendancetbl");
	
	echo "<table border='1' width='50%'>";
	echo "<tr>
	<td>Name</td>
	<td>Time in</td>
	<td>Time out</td>
    <td>Date</td>

	</tr>";
	
	while($row = mysqli_fetch_assoc($view_query)){
		
		$user_id = $row["id"];

		$db_name = $row["name"];
		$db_timein = $row["timein"];
		$db_timeout = $row["timeout"];
        $db_date = $row["date"];
		
		
		
		echo "<tr>
	 		<td> $db_name </td>
			<td> $db_timein </td>
			<td> $db_timeout </td>
            <td> $db_date </td>
			

			
		</tr>";		
		
	}
	
	echo "</table>";
?>