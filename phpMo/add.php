<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://classless.de/classless-tiny.css">
    <title>Document</title>
</head>
<body>
<a href="shop.php">goto shop</a>
    <h3 class="colored-text">Simple crud made by ikers with search feature</h3>
    <p>back-end gods wannabee hehe (sana)</p>
    <br>
    <h1>Add user</h1>
    <form action="" method="post">
        <input type="text" name="name" placeholder="ex. Juan Gomez">
        <br>
        <br>
        <input type="email" name="email"  placeholder="123@gmail.com">

        <br>
        <br>
        <input type="submit" name="submit" value="Add">
    </form>

    <?php
    include "conn.php";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        if(empty($name) || empty($email)){
            echo "Please fill in all fields";
        }else{
           
            $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    
            $result = mysqli_query($conn,$sql);
    
            if($result){
                echo "User added";
            }else{
                echo "problem with database";
            }
        }
       
    }
    ?>


<form action="update.php" method="GET">
    <p>Update, enter id u want to update</p>
    <input type="number" name="id_up" placeholder="enter id you update"><br>

    <input type="submit" name="update" value="update">
</form>
<?php
include "conn.php";

$sql = "SELECT * FROM users";

$result = mysqli_query($conn,$sql);
?>
<table>
  <tr>
    <th>USER ID
    <th>Company</th>
    <th>Contact</th>
    <th>Action</th>
    
    
  </tr>
 

  <a href="search.php">Search Names</a>
    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "
             <tr>
              <td>".$row["id"]."</td>
            <td>".$row["name"]."</td>
            <td>".$row["email"]."</td>
             <td>
             <form action ='show.php' method ='get'>
            <input type='hidden' name='id' value='".$row['id']."'>
            <input type='submit' value='Show'>

             </form>
             </td>
           
            <br>
            </tr>
            ";
        }
    }
   
    ?> 
  
</table> 

<div class="other">
<br>
<br>
<h3>Enter id if you want to delete</h3>
<form action="" method="post">
        <input type="number" name="id_user"><br><br>
        <input type="submit" name="delete" value="delete">

        <?php
        #use for deleting id by inputing user id to delete directly into the database. HAHAHHAHA TANhga
        include "conn.php";
            if(isset($_POST['delete'])){
                $id_user = $_POST['id_user'];
            $sql = "DELETE FROM users WHERE id = '$id_user'";

            $res = mysqli_query($conn,$sql);

            if($res){
              header("location:add.php");
            }else{
                #fix this, if the user enter a invalid id, this will appear
               echo "no data has been deleted, please try another id";
            }
            }
        ?>
    </form>

</div>

    
</body>
</html>