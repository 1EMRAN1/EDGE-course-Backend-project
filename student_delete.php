<?php

$id = $_GET["sid"];

include("db_connection.php");

$sql = "DELETE FROM student WHERE ID='$id'";
mysqli_query($connection, $sql);

header("Location: student.php");