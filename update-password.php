<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = '$hashed_password' WHERE id = '$user_id'";
        if ($conn->query($query)) {
            // Delete the used token
            $delete_query = "DELETE FROM password_recovery WHERE user_id = '$user_id'";
            $conn->query($delete_query);
            echo "Password updated successfully. <a href='login.php'>Login here</a>";
        } else {
            echo "Error updating password.";
        }
    } else {
        echo "Passwords do not match.";
    }
}
