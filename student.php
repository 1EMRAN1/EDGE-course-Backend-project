<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('menu.php'); ?>
<a href="student_add.php">Add Student</a>
    <table border="2">

        <tr>
        <th colspan="4">All Student </th>
        </tr>

        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Program</td>
            <td>Action</td>
        </tr>
        
        <?php
        include("db_connection.php");
        $q = "SELECT * FROM student";
        $result = mysqli_query($connection,$q);

       while($row = mysqli_fetch_assoc($result)){ 
        ?>
        <tr>
            <td><?php echo $row["ID"] ?></td>
            <td><?php echo $row["Name"] ?></td>
            <td><?php echo $row["Program"] ?></td>
            <td><a href="student_edit.php?sid=<?php echo $row["ID"]?>"> Edit</td>
            <td><a href="student_delete.php?sid=<?php echo $row["ID"]?>"> Delete</td>
        </tr>
        <?php
       }
       ?>
    </table>
</body>
</html>