<?php
// Get the form data
$subject = $_POST["subject"];
$message = $_POST["message"];

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

// Insert the announcement into the database
$sql = "INSERT INTO announcements (subject, message) VALUES (:subject, :message)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":subject", $subject);
$stmt->bindParam(":message", $message);
$stmt->execute();

// Close the connection
$conn = null;
?>
