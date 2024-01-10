<!-- 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../..//resources/css/main.css">
    <link rel="stylesheet" href="../../..//resources/css/menu.css">
    <link rel="stylesheet" href="../../..//resources/css/media.css">
    <link rel="stylesheet" href="../../..//resources/css/aboutus.css">
    <link rel="stylesheet" href="../../..//resources/css/contactus.css">
    <link rel="stylesheet" href="../../..//resources/css/book.css">
    <link rel="stylesheet" href="../../..//resources/css/cart.css">
    <link rel="stylesheet" href="../../..//resources/css/signlog.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,
           400;0,600;1,200;1,600&display=swap" rel="stylesheet">
           <script src="https://kit.fontawesome.com/4a085e9b53.js" crossorigin="anonymous"></script>
            <script src="../../../resources/js/main.js" async  ></script>
           <title>Sen'q Restaurant</title>
</head>
<body> -->
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../..//resources/css/contactus.css">
    <link rel="stylesheet" href="../../..//resources/css/book.css">
    <link rel="stylesheet" href="../..//resources/css/main.css">
    <link rel="stylesheet" href="../..//resources/css/media.css">
    <link rel="stylesheet" href="../..//resources/css/menu.css">
    <link rel="stylesheet" href="../..//resources/css/aboutus.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,
           400;0,600;1,200;1,600&display=swap" rel="stylesheet">
           <script src="https://kit.fontawesome.com/4a085e9b53.js" crossorigin="anonymous"></script>
           <script src="../../resources/js/main.js" async></script>
           <title>Sen'q Restaurant</title>
</head>
<body>


    <!--Header starts-->
    



<div class="add">      
                <div class="add-btn">
                    
                </div> 
                   
                   <?php 
                        
                        if(isset($_SESSION['isLoggedIn'])){ 
                        echo "<form action='includes/logout.inc.php' method='post'>
                        <input type='submit' name='logout-submit' value='Log out'>
                        </form>";
                        }
                        
                        elseif (!isset($_SESSION['isLoggedIn'])) { 
                        echo"<a href='sign up.php'><input type='submit' name='signup-submit' value='Sign up'></a>
                            <a href='login.php'><input type='submit' name='login-submit' value='Log in'></a>" ;
                        
                        } ?>
                  
                
              
    </div>
    <header class="header-Others">
       
        <!--Nav begins-->
        <nav>
            <span class="name">SEN'Q
                <img src="../..//resources/images/snk2.jpg" alt="logo"> 
            </span>
           
            
            <div class="nav-links"  id="navLink">
               <i class="fa fa-times" onclick="hideMenu()"></i>
               <div class="continer">
                <!--<button onclick="window.location.href='Book.php#takeAway'" >Pick up</button>
                <button onclick="window.location.href='Book.php#delivery'" >Delivery</button>
                <button onclick="window.location.href='Book.php#bookTable'">Book</button>
                <button onclick="window.location.href='login.php'" >Order</button>-->
                
                <button onclick="window.location.href='Book.php#bookTable'">Book</button>
            
            </div>
               
               <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    
                    <li><a href="contactus.php">Contact us</a></li>
                    <!-- <li><a href="order.php">Order</a></li> -->
                    
                </ul>
            </div>
            <section class="food-search text-center">
                <div class="container">
                
                    <form action="includes/food-search.php" method="POST">
                        <input type="search" name="search" placeholder="Food Name or Price" required>
                        <input type="submit" name="submit" value="Search" class="btn btn-primary">
                    </form>

                </div>
            </section>
           
             <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        
    <!--Nav ends-->
</header>
    
<!--Header ends-->