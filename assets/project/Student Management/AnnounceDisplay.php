<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$dbusername = "root"; // Change this to your database username
$dbpassword = ""; // Change this to your database password
$dbname = "mydatabase"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch announcements from the database
$sql = "SELECT * FROM announcements";
$result = $conn->query($sql);
echo $conn->error;

// Check if there are any announcements
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='announcement'>";
        echo "<h2>" . $row["subject"] . "</h2>";
        echo "<p>" . $row["message"] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No announcements available.</p>";
}

// Close database connection
$conn->close();
?>
