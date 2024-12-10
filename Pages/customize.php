<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}
include 'connection.php';
include 'send_mail.php';
include 'navbar.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the values from the form
    $navbar_color = isset($_POST['navbar_color']) ? $_POST['navbar_color'] : null;
    $header_color = isset($_POST['header_color']) ? $_POST['header_color'] : null;

    // Handle file upload
    $logo_url = 'images/mainlogo.png'; // Default logo path
    if (isset($_FILES['logo_image']) && $_FILES['logo_image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["logo_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($_FILES["logo_image"]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["logo_image"]["tmp_name"], $target_file)) {
                $logo_url = $target_file; // Update logo URL
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    }

    // Update the settings in the database
    $sql = "UPDATE settings SET navbar_color=?, header_color=?, logo_url=? WHERE id=1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $navbar_color, $header_color, $logo_url);
    $stmt->execute();
}

// Fetch the current settings
$sql = "SELECT navbar_color, header_color, logo_url FROM settings WHERE id=1";
$result = $conn->query($sql);

// Initialize default values
$navbar_color = 'black'; // Default navbar color
$header_color = '#8b61c2'; // Default header color
$logo_url = 'images/mainlogo.png'; // Default logo path

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Use the settings if they exist
    if (isset($row['navbar_color'])) {
        $navbar_color = $row['navbar_color'];
    }
    if (isset($row['header_color'])) {
        $header_color = $row['header_color'];
    }
    if (isset($row['logo_url'])) {
        $logo_url = $row['logo_url'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function submitForm() {
            // Submit the form
            document.getElementById("customizeForm").submit();

            // Reload the page after a short delay (e.g., 1 second)
            setTimeout(function() {
                location.reload();
            }, 1000);

            // Prevent the default form submission behavior
            return false;
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Customize Settings</h4>
                    </div>
                    <div class="card-body">
                        <form id=" customizeForm" method="POST" action="" enctype="multipart/form-data" onsubmit="return submitForm();">
                            <div class="mb-3">
                                <label for="navbar_color" class="form-label">Navbar Color:</label>
                                <input type="color" id="navbar_color" name="navbar_color" class="form-control" value="<?php echo htmlspecialchars($navbar_color); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="header_color" class="form-label">Header Color:</label>
                                <input type="color" id="header_color" name="header_color" class="form-control" value="<?php echo htmlspecialchars($header_color); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="logo_image" class="form-label">Logo Image:</label>
                                <input type="file" id="logo_image" name="logo_image" accept="image/*" class="form-control">
                            </div>

                            <button type="submit" value="Update" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>