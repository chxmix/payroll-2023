<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Adminlogin.html");
}
?>

<?php

$id = $name = $timein = $timeout = $date = ""; 
   echo $id; 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
        href="https://www.w3schools.com/w3css/4/w3.css?fbclid=IwAR0P93j1GvFKF88ST3PvMW31AbLa9y5XxRnQUs1sNbwN8EgU6KD2dL784oA">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?fbclid=IwAR2qyv-8SWiG72I-YuJ0EieVTEKX0ATmJxVhC3pnOYV0QzE4uJ13jzyj3uk">
    <title>ATTENDANCE</title>
</head>

<body>

    <div class="logo">
        <img src="img/logo.png" alt="logo">
    </div>

    <div class="dash">
        <table>
            <tr>
                <th class="home"> <a href="home.php"><i class="fa fa-home"></i></a> </th>
                <th><a href="employee.php" style="text-decoration: none; display: block;" .toggle>EMPLOYEE</th>
				<th>ATTENDANCE</th>
				<th><a href = "allowance.php" style="text-decoration: none;" .toggle>ALLOWANCE</th>
				<th><a href = "deduction.php" style="text-decoration: none;" .toggle>DEDUCTION</th>
				<th><a href = "payroll.php" style="text-decoration: none;" .toggle>PAYROLL</th>
            </tr>



        </table>
    </div>
    
    <div class="screen">
        ATTENDANCE  <a href="addattendance.php" style="text-decoration: none"><button class="btn">ADD</button></a>             
            <?php
            
            include("connection.php");

            $view_query = mysqli_query($connection, "SELECT * FROM employeetbl");

            if ($name && $timein && $timeout && $date) {

                $query = mysqli_query($connection, "INSERT INTO employeetbl (name,timein,timeout,date)VALUES('$name', '$timein', '$timeout', '$date')");
                echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
                echo "<script>window.location.href='employee.php';</script>";
            }

            $view_query = mysqli_query($connection, "SELECT * FROM attendancetbl");
?>
   <div class="dash">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Time in</th>
                    <th>Time Out</th>
                    <th>Date</th>
                    <th class="delete"><i class="fa fa-trash" ></i></th>
                </tr>
                <tr>
                </tr>
            </table>
        </div>

    

    </tr>
  
<?php
    
    while($row = mysqli_fetch_assoc($view_query)){
        
        $user_id = $row["id"];

        $db_id = $row["id"];
        $db_name = $row["name"];
        $db_timein = $row["timein"];
        $db_timeout = $row["timeout"];
        $db_date = $row["date"];
        
        echo '<div class="dash">';
        echo "<table class='table'>
            <tr>
            <td> $db_name </td>
            <td> $db_timein </td>
            <td> $db_timeout </td>
            <td> $db_date </td>
            <td class='delete' ><a ><i class='fa fa-trash' ></a></i></td>"; 
            
        
    }
    
    
?>
        </table>
    </div>

    </div>
<?php
    
    if ($_SESSION["username"]) {
        ?>
        Logged in as:
        <?php echo $_SESSION["username"]; ?>

    <div class="buttonout">
    
    <a href="logout.php" title="Logout" style="text-decoration: none;">
        <input type="submit" class="btn" name="submit" value="LOG OUT">

    </a>
    </div>
<?php
}
?>

</body>

</html>