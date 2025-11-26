<?php 
session_start();
if(!isset($_SESSION['username'])){
   header("Location: Adminlogin.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css?fbclid=IwAR0P93j1GvFKF88ST3PvMW31AbLa9y5XxRnQUs1sNbwN8EgU6KD2dL784oA">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?fbclid=IwAR2qyv-8SWiG72I-YuJ0EieVTEKX0ATmJxVhC3pnOYV0QzE4uJ13jzyj3uk">
    <title>HOME</title>
</head>

<body>
   
    <div class="logo">
        <img src="img/logo.png" alt="logo">
    </div> 

    <div class="dash">
        <table>
            <tr>
                
                <th class = "home"> <i class="fa fa-home" ></i> </th>
				<th><a href="employee.php" style="text-decoration: none; display: block;" .toggle>EMPLOYEE</th>
				<th><a href = "attendance.php" style="text-decoration: none;" .toggle> ATTENDANCE </a> </th>
				<th><a href = "allowance.php" style="text-decoration: none;" .toggle>ALLOWANCE</th>
				<th><a href = "deduction.php" style="text-decoration: none;" .toggle>DEDUCTION</th>
				<th><a href = "payroll.php" style="text-decoration: none;" .toggle>PAYROLL</th>
            </tr>



        </table>
    </div>

    <div class="screen">
        <?php
    echo "Welcome Admin " . $_SESSION["username"] . "<br>";

?>
    </div>
<?php
if($_SESSION["username"]) {
?>
Logged in as: <?php echo $_SESSION["username"]; ?>

<div class="buttonout">
    <a href="logout.php" title="Logout" style="text-decoration: none;"   ><input type="submit" class="btn" name="submit" value="LOG OUT"></a></div>
<?php
}
?>

</body>

</html>