<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/holiday.css@0.11.2" />
    <title>Document</title>
</head>
<body>
    <h2>Welcome to ShopNgInaMo</h2>
    <form action="" method="post">
        <LABEl>product name: </LABEl>
        <input type="text" name="prod_name" required>
        <br>
        <label for="">price: </label>
        <input type="number" name="price" required><br>
        <input type="submit" name="submit">
        
    
        <?php
        include "conn.php";
        if(isset($_POST['submit']))
        {
            $prod_name = $_POST['prod_name'];
            $price = $_POST['price'];

            $sql = "INSERT INTO shop (prod_name, price) VALUES ('$prod_name','$price')";

            $result = mysqli_query($conn,$sql);
            if($result){
                echo "product added";
            }else{
                echo "database error";
            }
        }
        ?>
    </form><br>
    
    <a href="showP.php">View Products</a>
</body>
</html>