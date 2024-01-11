
<?php 
session_start();
include_once('includes/db.php'); 
require_once 'config.php';

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  // save user data into session
  $_SESSION['isLoggedIn'] = 1;
  header("Location: index.php?login=success");
                        exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../..//resources/css/main.css">
    <link rel="stylesheet" href="../..//resources/css/media.css">
    <link rel="stylesheet" href="../..//resources/css/menu.css">
    <link rel="stylesheet" href="../..//resources/css/aboutus.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,
           400;0,600;1,200;1,600&display=swap" rel="stylesheet">
           <script src="https://kit.fontawesome.com/4a085e9b53.js" crossorigin="anonymous"></script>
           <script src="../../resources/js/main.js" async></script>
           <title>Sen'q Restaurant</title>
    <style>
    .add .signup:hover,
    .add .login:hover,
    .add .logout:hover {
        background-color: #5d99c6;
        color: #fff;
    }
</style>
</head>
<body>
<!--Header starts-->
<div class="add" style="position: relative; background-color: #3a5968; padding: 10px;">
    <div class="add-btn"></div>
    <span class="name" style="position: relative;">
    <img src="../resources/images/logo.png" alt="logo" style="width: 80px; height: auto; position: absolute; top: 0; z-index: 9999;">
</span>
    <?php if (isset($_SESSION['isLoggedIn'])) : ?>
        <form action='includes/logout.inc.php' method='post' style="display: flex; align-items: center; justify-content: flex-end;">
            <button type='submit' style='margin-left: 10px; padding: 8px 16px; background-color: #fff; color: #5d99c6; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;' class='logout' name='logout-submit'>Log out</button>
        </form>
    <?php elseif (!isset($_SESSION['isLoggedIn'])) : ?>
        <div style="display: flex; align-items: center; justify-content: flex-end;">
            <a href='sign up.php' style='text-decoration: none;'>
                <button class='signup' type='submit' name='signup-submit' style='margin-left: 10px; padding: 8px 16px; background-color: #fff; color: #5d99c6; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;'>Sign up</button>
            </a>
            <a href='login.php' style='text-decoration: none;'>
                <button class='login' type='submit' name='login-submit' style='margin-left: 10px; padding: 8px 16px; background-color: #fff; color: #5d99c6; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;'>Log in</button>
            </a>
        </div>
    <?php endif; ?>
</div>

    <header class="header">
       
        <!--Nav begins-->
        <nav>
       
           
            
            <div class="nav-links"  id="navLink">
               <i class="fa fa-times" onclick="hideMenu()"></i>
               <div class="continer">
                <!--<button onclick="window.location.href='Book.php#takeAway'" >Pick up</button>
                <button onclick="window.location.href='Book.php#delivery'" >Delivery</button>
                <button onclick="window.location.href='Book.php#bookTable'">Book</button>
                <button onclick="window.location.href='login.php'" >Order</button>-->
            </div>
               
               <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="Book.php">Book</a></li>
                    <li><a href="contactus.php">Contact us</a></li>
                    <!-- <li><a href="order.php">Order</a></li> -->
                    
                </ul>
            </div>
            <section class="food-search text-center">
            <div class="container">
                <form action="includes/food-search.php" method="POST">
                    <input type="search" name="search" placeholder="Food Name or Price" required style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <input type="submit" name="submit" value="Search" class="btn btn-primary" style="padding: 10px 20px; background-color: #333; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
                </form>
            </div>
        </section>
           
             <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="title">
            <h1>SEN'Q RESTAURANT</h1>
            <p>"When you think of food, think of Ethiopian food."</p>
            <?php echo '<a href="menu.php" class="btn hero-btn" style="padding: 10px 20px; background-color: #333; color: #fff; text-decoration: none; border-radius: 5px; cursor: pointer;">'; ?>
        ORDER NOW</a>
    <!--Nav ends-->
</header>
<!--Header ends-->
<!--Menu starts-->
<section class="menu">
    <div class="menu-sec" id="menuSec">
        <div class="card">
            <img src="../..//resources/images/shiro.jpg" alt="food" loading="lazy"> 
            <h4>Shiro</h4>
        </div>
        <div class="card">
            <img src="../..//resources\images\aynet.png" alt="food" loading="lazy"> 
            <h4>Aynet</h4>
        </div>
        <div class="card">
            <img src="../..//resources\images\tibs.jpg" alt="food" loading="lazy"> 
            <h4>Tibs</h4>
        </div>
        <div class="card">
            <img src="../..//resources\images\tej.jpg" alt="Ethiopian Drink" loading="lazy"> 
            <h4>Tej</h4>
        </div>
        <div class="card">
            <img src="../..//resources\images\chororsaa.jpg" alt="food" loading="lazy"> 
            <h4>Chororsaa</h4>
        </div>
        <div class="card">
            <img src="../..//resources/images/ambasha.jpg" alt="food" loading="lazy"> 
            <h4>Ambasha</h4>
        </div>
        <div class="card">
            <img src="../..//resources/images/chuko.png" alt="food" loading="lazy"> 
            <h4>Chuko</h4>
        </div>
        <div class="card">
            <img src="../..//resources/images/anchote.png" alt="food" loading="lazy"> 
            <h4>Anchote</h4>
        </div>
        <div class="card">
            <img src="../..//resources/images/gored gored.jpg" alt="food" loading="lazy"> 
            <h4>GoredGored</h4>
        </div>
        <div class="card">
            <img src="../..//resources/images/ambasha.jpg" alt="food" loading="lazy"> 
            <h4>Ambasha</h4>
        </div>
        
    </div>
    <img src="../..//resources/images/arrow.png" class="icon-left" id="left-arrow" alt="left arrow">
    <img  src="../..//resources/images/arrow.png" class="icon-right" id="right-arrow" alt="right arrow ">
    <?php
        echo  '<a href="menu.php" >';
    ?>
    <h2>MENU</h2>
    </a>
    
</section>
<!--Menu ends-->
<!--About us starts-->
<section class="about-us sec-padding" id="about" style="background-color: #3a5968">
    <div class="row">
        <div class="about-title" style="background-color: #202e43">
            <h2 data-title="our story">About us</h2>
        </div>
    </div>
    <div class="row">
        <div class="about-text">
           <h3>Welcome to Sen'q Restaurant</h3>
           <p>The word SEN'Q is a collection of food put in a special container called AGELGIL.It mainly practice 
               in the rural area of Ethiopia to deliver food <br>for farmers specifically who work in a team for crop gathering,
                at time of lunch their wives come with food inside Ageligl which is called SEN'Q and also with a traditional drink called Tela. 
                Not only for farmers it is also used for 
                a person who will travel longway by foot, when he gets tired he 
               will rest and eat his Sinq whose mother or wive made it.</p>
               
        </div>
        <div class="about-img">
           <div class="img-box">
               <h3>Delicious Foods</h3>
                <img src="../..//resources/images/delicious.jpeg" alt="Ethiopian food">
           </div>   
        </div>
    </div>

</section>
<!--About us ends-->
<!--service starts-->
<section class="service">
    <h2>OUR SERVICES</h2>
    <p>Come and Enjoy with us or Take it home </p>
    <div class="row">
        <div class="service-col">
            <img id="book"src="../..//resources/images/firstrotatedimg.jpeg" alt="table with food">
            <div class="layer">
            <?php
               echo  '<a href="Book.php" class="btn hero-btn">';
            ?>
                <h3>Book Your Table</h3>
                    </a>
            </div>
            
        </div>
       
        <div class="service-col">
            <img id="take" src="../..//resources/images/mirt sebseb.jpg" alt="take away">
            <div class="layer">
            <?php
               echo  '<a href="menu.php" class="btn hero-btn">';
            ?>
                <h3>Pick up </h3>
                    </a>
            </div>
            
        </div>
        
        <div class="service-col">
            <img id="pick"src="../..//resources/images/habesham.jpg" alt="Pick up">
            <div class="layer">
            <?php
               echo  '<a href="menu.php" class="btn hero-btn">';
            ?>
                <h3>Delivery</h3>
                    </a>
            </div>  
             
        </div>
        
    </div>
    

</section>
<!--service ends-->

<!--footer section starts-->
<footer class="footer">
    <div class="row">
       <div class="footer-col">
           <h4>Our loction</h4>
           <p>Ethiopia,Addis Ababa,<br>Kasaches
        </p>
       </div>
       <div class="footer-col">
        <h4>Opening hours</h4>
        <p>Monday to Sunday<br>7:00 AM - 9:00 PM</p>
    </div>
    <div class="footer-col">
        <h4>Quick links</h4>
        
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="menu.php">Menu</a></li>
            
            <li><a href="#">Privay</a></li>
            <li><a href="#">Terms of use</a></li>
            <?php
               echo  '<li><a href="contactus.php" >';
            ?>
        <h4>Contact us</h4>
                    </a></li>

                    </ul>
        </ul>
    </div>
    <div class="footer-col">
        
        <div class="social-icons">
            <a href="https://www.facebook.com/iftu.tesfaye.505"><i class="fab fa-facebook"></i></a>
            <a href="https://t.me/Hggs12"><i class="fab fa-telegram"></i></a>
            <a href="https://www.instagram.com/edlghana"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="copyright">
            <small>&copy Sen'q restaurant,All right are reserved.</small>
        </div>
    </div>
</footer>
<!--footer section starts-->

</body>
</html>
