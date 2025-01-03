<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://classless.de/classless-tiny.css">
    <title>Document</title>
</head>
<body>
    <a href="add.php">back to home</a>
    <form action="" method="post">
        <h3>Search users</h3>
        <input type="text" name="search">
        <input type="submit" name="submit">

        <?php
        include "conn.php";
        if(isset($_POST['submit'])){
            $search = $_POST['search'];

            if(empty($search)){
                echo "please input name!";
            }else{
                $sql = "SELECT * FROM users WHERE name LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
                echo "<br>Results: <br>";
                if($result ->num_rows >0){
                    while($row = $result -> fetch_assoc()){
                       echo "<br>"; 
                        echo $row['name'];
                    }
                }else{
                    echo "no data recorded with that name!";
                }
            }

            
        }

        ?>

    </form>
</body>
</html>