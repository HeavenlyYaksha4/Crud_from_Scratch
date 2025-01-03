<?php
include "conn.php";
$sql = "SELECT * FROM shop";

$result = mysqli_query($conn,$sql);

if($result -> num_rows >0){
    while($row = $result -> fetch_assoc()){
        echo $row['prod_name'] . " " . $row['price'];

    }
}
?>