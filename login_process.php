<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Adminlogin.html");
}


$host = "localhost";
$username = "root";
$password = "";
$dbname = "payrolldb";


try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}


if(isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password);
  $stmt->execute();


  if($stmt->rowCount() == 1) {
    $_SESSION['username'] = $username;
    echo '<script>alert("Log in successful!")</script>';
    header("Location: home.php");

  } else{
   // echo "<script language='javascript'>alert("Wrong Username/Password")</script>'";
   // echo "<script>
       //window.location.href='Adminlogin.html';</script>"
    /*echo '<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
<head>
  <title>WRONG USERNAME/PASSWORD</title>
</head>
<body>
 <div class="logo">
        <img src="img/logo.png" alt="logo">
    </div> 
 <div class="screen">
        
            <p>LOG IN ERROR</p>
            <p>PLEASE <a href="Adminlogin.html" style="text-decoration: none; color: teal; ">LOGIN </a>AGAIN</p>

       

        </div> 

    </form>
        </div>
    </div>

    <script src="index.js"></script>
</body>
</html>'; */
  header("Location: errorlogin.html");

  }
}
?>
