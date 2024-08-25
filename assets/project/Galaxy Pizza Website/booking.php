<?php
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Mobile = $_POST['Mobile'];
$Date = $_POST['Date'];
$Time = $_POST['Time'];
$Guest = $_POST['Guest'];

//Database Connection
$conn = new mysqli('localhost','root','','booking');
if($conn->connect_error)
{
    die('Connection Failed : '.$conn->connect_error);
}
else
{
    $stmt = $conn->prepare("insert into booking(Name,Email,Mobile,Date,Time,Guest)values(?,?,?,?,?,?)");
    $stmt->bind_param("ssiiii",$Name, $Email, $Mobile, $Date, $Time, $Guest);
    $stmt->execute();
    echo "Table Booking done....";
    $stmt->close();
    $conn->close();
}
?>