<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Adminlogin.html");
}
?>
<?php

$name = $type = $middle_initial = $surname = $suffix = $birth_date = $age = $address = $email = $position = "";
$nameErr = $typeErr = $middle_initialErr = $surnameErr =$birth_dateErr = $suffixErr = $ageErr = $addressErr = $emailErr = $positionErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(empty($_POST["name"])){
		$nameErr = "Name is required!";
	}else{ $name = $_POST["name"];
	
	}
	

	if(empty($_POST["type"])){
		$typeErr = "Employee type is required!";
	}else{ $type = $_POST["type"];
	
	}
	
	

	if(empty($_POST["middle_initial"])){
		$middle_initialErr = "Middle initial is required!";
	}else{ $middle_initial = $_POST["middle_initial"];
	
	}

	if(empty($_POST["surname"])){
		$surnameErr = "Surname is required!";
	}else{ $surname = $_POST["surname"];
	
	}

	if(empty($_POST["birth_date"])){
		$birth_dateErr = "Birth date is required!";
	}else{ $birth_date = $_POST["birth_date"];
	
	}

	if(empty($_POST["age"])){
		$ageErr = "Age is required!";
	}else{ $age = $_POST["age"];
	
	}

	if(empty($_POST["address"])){
		$addressErr = "Address is required!";
	}else{ $address = $_POST["address"];
	
	}

	if(empty($_POST["email"])){
		$emailErr = "Email is required!";
	}else{ $email = $_POST["email"];
	
	}

	if(empty($_POST["position"])){
		$positionErr = "Position is required!";
	}else{ $position = $_POST["position"];
	
	}
	
	

}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
        href="https://www.w3schools.com/w3css/4/w3.css?fbclid=IwAR0P93j1GvFKF88ST3PvMW31AbLa9y5XxRnQUs1sNbwN8EgU6KD2dL784oA">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?fbclid=IwAR2qyv-8SWiG72I-YuJ0EieVTEKX0ATmJxVhC3pnOYV0QzE4uJ13jzyj3uk">
    <title>EMPLOYEE LIST</title>
</head>

<style>
.error{
	color:red;
	fon-family: monospace;
}

.cen{
    align-items: center;
    text-align: center;  
    background-color: #67D6CF;
    border-radius: 20px;
    margin-top: 2%;
    margin-left: 7%;
    margin-right: 7%;
}

.th:hover{
    background: none;
}

</style>

<a href="employee.php" style="text-decoration: none;"><button class="btn">BACK</button></a>

<body>

    <div class="logo">
        <img src="img/logo.png" alt="logo">
    </div>

<div class="cen" class="">
<form method="POST" action="<?php htmlspecialchars("PHP_SELF");?>">

<label for="name" position="left">First name</label><br>
<input id="name" style="background-color: transparent;"  type="text" name="name" value="<?php echo $name; ?>"><br>
<span class="error"><?php echo $nameErr; ?></span><br><br>

<label for="middle_initial" position="left">Middle initial</label><br>
<input id="middle_initial" style="background-color: transparent;"  type="text" name="middle_initial" value="<?php echo $middle_initial; ?>"><br>
<span class="error"><?php echo $middle_initialErr; ?></span><br><br>

<label for="surname" position="left">Surname</label><br>
<input id="surname" style="background-color: transparent;"  type="text" name="surname" value="<?php echo $surname; ?>"><br>
<span class="error"><?php echo $surnameErr; ?></span><br><br>

<label for="suffix" position="left">Suffix</label><br>
<input id="suffix" style="background-color: transparent;"  type="text" name="suffix" value="<?php echo $suffix; ?>"><br><br>

<label for="birth_date" position="left">Birth date</label><br>
<input id="birth_date" style="background-color: transparent;" type="date" name="birth_date" value="<?php echo $birth_date; ?>"><br>
<span class="error"><?php echo $birth_dateErr; ?></span><br>

<label for="age" position="left">Age</label><br>
<input id="age" style="background-color: transparent;"  type="number" name="age" value="<?php echo $age; ?>"><br>
<span class="error"><?php echo $ageErr; ?></span><br><br>

<label for="address" position="left">Address</label><br>
<input id="address" style="background-color: transparent;"  type="text" name="address" value="<?php echo $address; ?>"><br>
<span class="error"><?php echo $addressErr; ?></span><br><br>

<label for="email" position="left">Email</label><br>
<input id="email" style="background-color: transparent;"  type="text" name="email" value="<?php echo $email; ?>"><br>
<span class="error"><?php echo $emailErr; ?></span><br><br>

<label for="type">Employee type: </label>
<select name="type" id="type">
<option disabled selected value="" ></option>
<option value="Regular" >Regular</option>
<option value="Part-time">Part-time</option>
</select><br>

<span class="error"><?php echo $typeErr; ?></span><br><br>

<label for="pos">Position</label>
<select name="position" id="pos">
<option  disabled selected value="" style="text-align: center;" required> </option>
<option value="IT Support Specialist">IT Support Specialist</option>
<option value="Senior Management" >Senior Management</option>
<option value="Project Manager" >Project Manager</option>
<option value="Software Designer" >Software Designer</option>
<option value="Web Designer" >Web Designer</option>
</select><br>
<span class="error"><?php echo $positionErr; ?></span><br>


<button class="btn"><input style="border-style: none; background-color: transparent; color: white;" type="submit" value="Submit"></button>
<br><br>
</form>
</div>
</body>
<hr>
<?php

	
include("connection.php");
	
	if($name && $type && $position){
	
		$query = mysqli_query($connection, "INSERT INTO employeetbl (name,middle_initial,surname,birth_date,age,address,email,type,position)VALUES('$name', '$middle_initial', '$surname','$birth_date', '$age', '$address', '$email', '$type', '$position')");
		echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
		echo "<script>window.location.href='addemployee.php';</script>";
	}
	
	$view_query = mysqli_query($connection, "SELECT * FROM employeetbl");
	
	echo "<table border='1' width='50%'>";
	echo "<tr>
	<td>Name</td>
	<td>type</td>
	<td>position</td>

	</tr>";
	
	while($row = mysqli_fetch_assoc($view_query)){
		
		$user_id = $row["id"];

		$db_name = $row["name"];
		$db_type = $row["type"];
		$db_position = $row["position"];
		$db_middle_initial = $row["middle_initial"];
		$db_surname = $row["surname"];
		$db_suffix = $row["suffix"];
		$db_birth_date = $row["birth_date"];
		$db_age = $row["age"];
		
		
		
		
		echo "<tr>
	 		<td> $db_name $db_middle_initial $db_surname $db_suffix  </td>
			<td> $db_type </td>
			<td> $db_position </td>
		</tr>";		
		
	}
	
	echo "</table>";
?>
</hr>