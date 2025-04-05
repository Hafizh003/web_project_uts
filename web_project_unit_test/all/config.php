<?php

$host ="localhost";
$user ="root";
$password ="";
$database="web_project_unit_test";

$conn = new mysqli($host, $user, $password, $database);

if($conn ->connect_error){
    die("Connection failed: ". $conn->connect_error);
}


?>