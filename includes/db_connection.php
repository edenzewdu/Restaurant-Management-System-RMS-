<?php
$servername = "localhost";
$username ="root";
$password ="";
//$dbname = "Restaurant_management_system";
$conn = mysqli_connect($servername, $username, $password);

if(!$conn){
  echo "PLEASE BEAR WITH US AS WE ARE CURRENTLY WORKING ON OUR SITE!!!! PLEASE COME BACK LATER";
  die("connection failed: ".mysqli_connect_error());
}




?>