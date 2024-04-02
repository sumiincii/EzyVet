<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    
</style>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">
        <input type="submit" name="submit" placeholder="login">
    </form>
    <a href="registration.php">GO TO LOGIN</a><br/>

    <?php 
    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $salt = "sumiii";
        $hashedPassword = sha1($password. $salt);
        $username = $_POST["username"];
        $fullname = $_POST["fullname"];

        $con = mysqli_connect("localhost", "ezyvet", "yasbaba", "vincent");
    if (!$con) {
        die('Could not connect: ');
    }
    $result = mysqli_query($con, "SELECT * FROM account WHERE hashedPassword = '$hashedPassword'");
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        header('location:lab3.php');
        
    } else {
        echo "invalid credentials <br>";
    }
    }
    ?>
</body>
</html>