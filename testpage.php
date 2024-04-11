<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
</head>
<style>
    body{
        background-color: #ffffff;
        font-family: 'Montserrat'  , sans-serif !important;
    }
    [class*="col"]{
        padding: 0;
        background-color: #ffffff;
        border: 2px solid #fff;
        
    }
    
    [class*="container"]{
        /* color: #fff; */
    }
    #wc{
        background-color: #c1cad3;
        padding: 7px;
        color: #3e444b;
    }
    nav a::before{
        content: '';
        position: absolute;
        top:100%;
        left: 0;
        width: 0;
        height: 2.5px;
        background: #c1cad3;
        transition: .3s;
    }
    nav a:hover::before {
        width: 100%;

    }
    nav{
        margin-top: 10px;
        background: #fff;
        
}
.logo{
    padding: 2px 0 0 90px;
    width: 150px;
    height: auto;
}
nav ul{
    padding: 0;
    margin: 0;
    float: right;
    margin-right: 102px;
    
}
nav ul li{
    background: #fff;
    position: relative;
    list-style: none;
    display: inline-block;  
}
nav ul li a{
    
    display: block;
    padding: 0 25px;
    color: #3e444b;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    line-height: 60px;
    letter-spacing: 2px;
    
    
}

.hober a:hover{
    background: rgb(150, 150, 150);
}
nav ul ul{
    position: absolute;
    top: 65px;
    display: none;
    
}
nav ul li:hover > ul{
    display: block;
    box-shadow: 0 7px 14px rgba(0, 0, 0, 1);
    border: 1px solid #3e444b; 
    
}
nav ul ul li{
    width: 159px;
    float: none;
    display: list-item;
    position: relative;
}
nav ul ul ul li{
    position: relative;
}

</style>
<body>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col" id="wc">Welcome to <b>Dr. Ron Veterinary Clinic</b> , your trusted partner in providing top-notch veterinary care for your beloved pets.</div>
        </div>
    </div>

    <div class="container-fluid text-center"> 
        <div class="dropdown">
        <nav>
            <img class="logo" src="images/logo.png">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT</a>
                    <ul>
                        <li class="hober"><a href="#">asd</a></li>
                        <li class="hober"><a href="#">asd</a></li>
                        
                    </ul>
                </li>
                <li><a href="#">SERVICES</a>
                    <ul>
                        <li class="hober"><a href="#">asd</a></li>
                        
                        <li class="hober"><a href="#">asd</a>
                            
                        </li>
                    </ul>
                </li>
                <li><a href="contact_form.html">CONTACT US</a></li>
            </ul>
        </nav>
    </div>
    </div>

    <div class="container-fluid">

    
    </div>

    



<script src="_assets/bootstrap.min.js"></script>
<script src="_assets/jquery.min.js"></script>
</body>
</html>