<?php

$connection = mysqli_connect("localhost", "root", "", "emran_ndub");
$q = "SELECT *  FROM student";
$result = mysqli_query($connection,$q);
while($row =mysqli_fetch_assoc($result)){
    $data[] = $row;
}
echo json_encode($data);