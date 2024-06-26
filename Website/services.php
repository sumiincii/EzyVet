<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif !important;
}

.navbar {
    background-color: #033626;
    color: #AD8B73;
    padding: 3rem;
    margin: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 1.5rem;
    text-decoration: none;
    color: #fff;
}

.navbar-nav {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.nav-item {
    margin-right: 1rem;
}

.nav-link {
    text-decoration: none;
    color: #fff;
    padding: 0.5rem 1rem;
    /* transition: background-color 0.3s ease; */
    font-size: 25px;
}

/* .nav-link:hover {
    background-color: #555;
} */

.active {
    background-color: #555;
    max-height: 60px;
}
.box{
    max-width: 2000px;
    background-color: #AD8B73;
    height: 38px;
    margin-top: -20px;
    /* display: flex; */
    text-align: center;
    font-size: 18px;
    line-height: 28.5px;
    letter-spacing: normal;
}
</style>
<body>
    <div class="box">
        <h1>now accepting</h1>
    </div>
<nav class="navbar">
    <div class="container">
        <a href="#" class="logo">Logo</a>
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a href="landingpage.php" class="nav-link">About Us</a>
            </li>
            <li class="nav-item active">
                <a href="services.php" class="nav-link">Services</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">Services</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>