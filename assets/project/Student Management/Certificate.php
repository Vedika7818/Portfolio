<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['title'];
    $roll_no = $_POST['description'];

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
    $sql = "INSERT INTO students (name, roll_no)
            VALUES ('$name', '$roll_no')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
