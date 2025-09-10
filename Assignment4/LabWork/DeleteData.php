<?php
$username = $_GET['username'] ?? '';

$conn = new mysqli('localhost', 'root', '', 'parth');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($username == '') {
    echo "Please enter some value..";
} else {
   
    $check = $conn->prepare("SELECT * FROM student WHERE Name=?");
    $check->bind_param('s', $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        
        $stat = $conn->prepare("DELETE FROM student WHERE Name=?");
        $stat->bind_param('s', $username);

        if ($stat->execute()) {
            echo "Data Deleted Successfully...";
        } else {
            echo "Error Occurred: " . $stat->error;
        }

        $stat->close();
    } else {
        echo "User Does Not Exist..";
    }

    $check->close();
}

$conn->close();
?>
