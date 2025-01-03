<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://classless.de/classless-tiny.css">
    <title>Document</title>
</head>
<body>
<?php

include "conn.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = '$id'";

    $result = mysqli_query($conn,$sql);
    echo "
    <br>
    <a href = 'add.php'>go back</a>
    <br>
    ";
    echo "RESULT<br>";
    if($result -> num_rows > 0){
        while ($row = $result ->fetch_assoc()){
            echo "Name: ".$row['name'];

            echo "<br>";
            echo "Email: ".$row['email'];
        }
    }
        }
?>
</body>
</html>



        