<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<t, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('menu.php'); ?>

<a href="student_add.php">Add Student</a><br>
    <table border="1">
        <tr>
            <th colspan="4">All Students</th>
        </tr>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Program</td>
            <td>Action</td>
        </tr>
    </table>


<script>
        fetch("http://localhost/class/api/api.php").then(function(response){
            //console.log(response.ok);
            return response.json();
        }).then(function(data){
            console.log(data);
        });
    </script>
</body>
</html>