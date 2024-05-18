<?php

$id = $_GET["sid"];

include("db_connection.php");

$sql = "DELETE FROM students WHERE sid='$id'";
mysqli_query($connection, $sql);

header("Location: students.php");