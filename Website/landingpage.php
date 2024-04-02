<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
}

.navbar {
    background-color: #333;
    color: #fff;
    padding: 1rem;
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
    transition: background-color 0.3s ease;
}

.nav-link:hover {
    background-color: #555;
}

.active {
    background-color: #555;
}
</style>
<body>
<nav class="navbar">
    <div class="container">
        <a href="#" class="logo">Logo</a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Services</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>