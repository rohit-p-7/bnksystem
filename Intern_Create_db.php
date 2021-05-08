<?php

// Project By - Rohit Pawar

$servername="localhost";
$username= "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password);


if(!$conn){
    die("Sorry connection was  unsuccessful".mysqli_connect_error());
}
else{
    echo "Connection was successfully done !<br> ";
}

// databse creation  

$sql = "CREATE DATABASE customers";    // creating database
$result = mysqli_query($conn , $sql);  // running query for execution.

// checking if the database creation is succesful or not.
if($result){
    echo " the db was created successfully !";
}
else {
    echo " the db was not created successfully because of this error --> ". mysqli_error($conn);
}

?>