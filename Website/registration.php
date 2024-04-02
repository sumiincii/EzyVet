<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REgistration</title>
</head>

<body>
    <h1>REGISTRATION</h1>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">
        <input type="text" name="fullname" placeholder="fullname">
        <input type="submit" name="submit" placeholder="register">
    </form>

    <a href="loginPage.php">Registration </a><br />
    <?php
    if (isset($_POST['submit'])) {
        $password = $_POST['password'];
        $salt = "sumiii";
        $hashedPassword = sha1($password . $salt);

        $username = $_POST["username"];
        $fullname = $_POST["fullname"];
        $con = mysqli_connect("localhost", "ezyvet", "yasbaba", "vincent");
        if (!$con) {
            die('Could not connect: ');
        }
        $result = mysqli_query($con, "INSERT INTO account (hashedPassword ) VALUES ( '$hashedPassword')");

        if (!$result) {
            die('unable to register');
        } else {
            echo "success <br>";
            echo $hashedPassword;
        }
    }

    ?>
</body>

</html>