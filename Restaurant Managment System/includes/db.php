<?php


$servername = "localhost";
$username ="root";
$password ="";
$dbname = "Restaurant_management_system";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  echo "PLEASE BEAR WITH US AS WE ARE CURRENTLY WORKING ON OUR SITE!!!! PLEASE COME BACK LATER";
  die("connection failed: ".mysqli_connect_error());
}


// //Create database
// $sql = "CREATE DATABASE IF NOT EXISTS Restaurant_management_system ";
// if (mysqli_query($conn, $sql)) {
//   echo "Database and table created successfully";
// } else {
//   echo "PLEASE BEAR WITH US AS WE ARE CURRENTLY WORKING ON OUR SITE!!!! PLEASE COME BACK LATER";
//   echo "Error creating database: " . mysqli_error($conn);
// }

// $sql = "USE DATABASE Restaurnt_management_system;
//   CREATE TABLE IF NOT EXISTS `accounts` (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   `username` varchar(50) NOT NULL,
//   `Full name` varchar(50) NOT NULL,
//   `password` varchar(255) NOT NULL,
//   `phone no` int(15) NOT NULL,
//   `email` varchar(100) NOT NULL,
//   `Role` int(1) NOT NULL DEFAULT '1'
// ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

// ";
// if ($conn->query($sql) === TRUE) {
//   echo "Table \"accounts\" created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }
?>