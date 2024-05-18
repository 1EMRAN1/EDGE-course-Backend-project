<?php

$id = $_POST["sid"];
$name = $_POST["fullName"];
$program = $_POST["program"];

include("db_connection.php");
$sql = "UPDATE student SET name='$name',program='$program' WHERE ID='$id'";
mysqli_query($connection, $sql);

header ("location: student.php");