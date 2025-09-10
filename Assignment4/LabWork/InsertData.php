<?php
$con=mysqli_connect("localhost","root","","parth");

$sname=$_POST["Name"];
$pass=$_POST["Password"];
$sql=$con->prepare("insert into student(Name,Pass)values(?,?)");
$sql->bind_param("si",$sname,$pass);
$sql->execute();

?>