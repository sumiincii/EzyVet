<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  nav {
  width: 80%;
  margin: 0 auto;
  background: #fff;
}

nav ul {
  list-style: none;
  padding: 0;
  text-align: center;
}

nav li {
  display: inline-block;
  padding: 20px;
}

nav a {
  text-decoration: none;
  color: #333;
  font-size: 18px;
  position: relative;
}

.cool-link::after {
  content: '';
  display: block;
  width: 0;
  height: 2px;
  background: #333;
  transition: width.3s;
}

.cool-link:hover::after {
  width: 100%;
  transition: width.3s;
}
</style>
</head>
<body>
<nav>
  <ul>
    <li class="cool-link"><a href="#">Home</a></li>
    <li class="cool-link"><a href="#">About</a></li>
    <li class="cool-link"><a href="#">Contact</a></li>
  </ul>
</nav>
</body>
</html>