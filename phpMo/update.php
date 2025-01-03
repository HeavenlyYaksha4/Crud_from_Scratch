<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://classless.de/classless-tiny.css">

</head>
<body>
    <a href="add.php">go back</a><br>
<?php

include "conn.php";
 if(isset($_GET['update'])){
    $id_up = $_GET['id_up'];
    if(empty($id_up)){
        $error = "Please enter a valid id";

        echo $error;
    }else{
        $sql = "SELECT * FROM users WHERE id = '$id_up'";
        $result = mysqli_query($conn, $sql);
      if($result -> num_rows > 0){
        while($row = $result ->fetch_assoc() ){
            echo "
        
            <form method ='POST'>
             <input type='hidden' name='id_up' value='$id_up'> <!-- Hidden field for id --> <!--to be continued -->
             <input type = 'text' name = 'name' placeholder =".$row['name']."><br>
             <br>
             <input type = 'text' name = 'email' placeholder =".$row['email']."><br>
        
             <input type ='submit' name ='update_data' value ='update'>
            </form>
            ";

        }
      }
       

    if(isset($_POST['update_data'])){
        $id_up = $_POST['id_up'];
        $name=$_POST['name'];
        $email=$_POST['email'];

        $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = '$id_up'";

        $res = mysqli_query($conn, $sql);

        if($res){
            header("location:add.php");
           
        }else{
            echo "failed to update user";
            exit();
        }
    }
    }

 }

?>
</body>
</html>

