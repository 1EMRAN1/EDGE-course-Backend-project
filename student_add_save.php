<?php

$id = $_POST["sid"];
$name = $_POST["fullName"];
$program = $_POST["program"];

include("db_connection.php");
$sql = "INSERT INTO student VALUES ('$id', '$name', '$program')";
mysqli_query($connection, $sql);

header ("location: student.php");