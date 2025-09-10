<?php
$Oldname = $_GET['oldusername'] ?? '';
$name = $_GET['name'] ?? '';
$pass = $_GET['password'] ?? '';

$conn = new mysqli('localhost', 'root', '', 'parth');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($Oldname == '' || $name == '' || $pass == '') {
    echo "Please fill all fields..";
} else {
    
    $check = $conn->prepare("SELECT * FROM student WHERE Name=?");
    $check->bind_param('s', $Oldname);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
       
        $stat = $conn->prepare("UPDATE student SET Name=?, Pass=? WHERE Name=?");
        $stat->bind_param('sss', $name, $pass, $Oldname);

        if ($stat->execute()) {
            echo "Data Updated Successfully...";
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
