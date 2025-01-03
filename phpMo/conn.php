<?php

$conn = new mysqli("localhost","root","","dbsimp");#for database connectiivty


if(!$conn){
    die($conn);
}else{
   # echo "database connected";
}