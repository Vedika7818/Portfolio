<?php
// Start a session and check if the username is set
session_start();
if (isset($_SESSION["uname"])) {
  // Display the admin dashboard page
  echo "<h1>Welcome, " . $_SESSION["uname"] . "</h1>";
  echo "<p>This is the admin dashboard page.</p>";
  // Add any other features or functionalities you want
} else {
  // Redirect to the login page
  header("Location: loginPage.html");
}
?>
