<?php
// Get the username and password from the form
$uname = $_POST["uname"];
$psw = $_POST["psw"];

// Connect to the MySQL database using PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Check if the username and password are valid
$sql = "SELECT * FROM admin WHERE username = :uname AND password = :psw";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":uname", $uname);
$stmt->bindParam(":psw", $psw);
$stmt->execute();

// If the query returns a row, the login is successful
if ($stmt->rowCount() > 0) {
  echo "Login successful";
  // Start a session and store the username in a session variable
  session_start();
  $_SESSION["uname"] = $uname;
  // Redirect to the admin dashboard page
  header("Location: Dashboard.php");
} else {
  echo "Invalid username or password";
  // Redirect to the login page
  header("Location: LoginPage.html");
}
print_r($_POST);
// Close the connection
$conn = null;
?>
