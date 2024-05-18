<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('menu.php'); ?>

    <?php
    include("db_connection.php");
    $sid=$_GET["sid"];

    $q = "SELECT * FROM student WHERE ID ='$sid'";
    $result = mysqli_query($connection, $q);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    ?>

<form method="post" action="student_edit_save.php">

<table>
    <tr>
        <th colspan="3">Student Edit</th>
    </tr>
    <tr>
        <td>ID</td>
        <td><input type="text" name ="sid" value="<?php echo $data["ID"]?>" readonly></td>
    </tr>

    <tr>
        <td>Name</td>
        <td><input type="text" name ="fullName" value="<?php echo $data["Name"]?>"></td>

    </tr>

    <tr>
        <td>Program</td>
        <td><input type="text" name ="program" value="<?php echo $data["Program"]?>"></td> 
    </tr>

    <tr>
        <td><input type="submit" value ="Save"></td>
    </tr>
    </table>
</form>
</body>
</html>