<?php
$servername = "localhost";
$user_name = "root";
$password = "";
$dbname = "ezyvet";

$conn = new mysqli($servername, $user_name, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
