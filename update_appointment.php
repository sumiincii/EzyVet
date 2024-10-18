<?php
include 'connection.php';

if (isset($_POST['id']) && isset($_POST['action'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];

    switch ($action) {
        case 'accept':
            $sql = "UPDATE appointments SET status = 'accepted' WHERE id = $id";
            break;
        case 'decline':
            $sql = "UPDATE appointments SET status = 'declined' WHERE id = $id";
            break;
        case 'archive':
            $sql = "UPDATE appointments SET status = 'archived' WHERE id = $id";
            break;
    }

    $conn->query($sql);
}
