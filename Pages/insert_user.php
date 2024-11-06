<?php
// insert_user.php

include 'connection.php';

// User details
$email = 'ezyvetneust';
$password = 'capstoneproject';

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $hashed_password);

// Execute the statement
if ($stmt->execute()) {
    echo "New user added successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
