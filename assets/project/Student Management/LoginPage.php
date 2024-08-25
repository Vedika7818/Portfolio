<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

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
    $sql = "INSERT INTO mydb.users (username, password)
            VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // Authentication successful, redirect to the homepage
        header("Location: index.html");
        exit; // Prevent further execution of the script
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        // Authentication failed, redirect back to the login page with an error message
        header("Location: LoginPage.html?error=invalid_credentials");
        exit; // Prevent further execution of the script
    }

    $conn->close();
}
?>
