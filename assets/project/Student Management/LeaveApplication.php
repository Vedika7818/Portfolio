<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $from_date = $_POST['date'];
    $to_date = $_POST['date'];
    $reason = $_POST['reason'];

    // Connect to the database
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "mydb";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO leave_application (name, rollno, from_date, to_date, reason)
            VALUES ('$name', '$rollno', '$from_date', '$to_date', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
