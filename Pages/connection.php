<?php
$servername = "localhost";
$user_name = "Ezyvet";
$password = "capstoneproject";
$dbname = "ezyvet";

$conn = new mysqli($servername, $user_name, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
