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
.con1, .con2, .con3{
    border: 1px solid;
}
.container {
  display: flex; /* Using Flexbox */
  flex-direction: row; /* Stacking vertically */
  height: auto;

}
.container2 {
    display: flex;
    flex-direction: column;
    width: 2200px;
}
.con1{
  width: 2500px;
}
.con1 img{
  /* width: 10%; */
  max-width: 20%;
  /* position: relative; */
}
.con2{
  display: flex;
  flex-direction: row;
  height: 60px;
  align-items: center;
  padding: 0;
  

}
.contactheader {
position: relative;

left: 350px;
background-color: aqua;
width: fit-content;
text-align: center;
}
.appointment{
  position: relative;

left: 370px;
background-color: aqua;
width:  fit-content;
margin: 0;
}
.contactheader,.appointment{
  padding: 10px;
}

</style>
</head>
<body>

<div class="container">


<!-- logo -->
<div class="con1" >
    <img src="logo.jpg" alt="">
</div>
<!-- contacts -->

<div class="container2">
<div class="con2">
  <div class="contactheader">
  <a href="#">0912317263718236</a>
  </div>
    <div class="appointment">
    <a href="#">appointment</a>
    </div>
    
</div>

<!-- nav -->
<div class="con3">
<nav>
  <ul>
    <li class="cool-link"><a href="#">ABOUT US</a></li>
    <li class="cool-link"><a href="#">SERVICES</a></li>
    <li class="cool-link"><a href="#">CLIENT</a></li>
  </ul>
</nav>
</div>
</div>
</div>

</body>
</html>