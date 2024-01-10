 <?php
 session_start();
  //include "includes/contact.inc.php"; 
  //require 'db.php';
include("includes/ideasforall.php");
  // include'db_connection';

  ?>
  <!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../../..//resources/css/contactus.css">
  </head>
<body>
<!--Header ends-->
         <!--Bar ends-->
         <section class="contactus">
            <h1>contact us</h1>
             <div class="row">
                 <div class="contact-col">
                     <div>
                        <i class="fas fa-home"></i>
                        <span>
                            <h4>Ethiopia,Addis Ababa,Kasaches</h4>
                        </span>
                     </div>
                     <div>
                        <i class="fas fa-phone"></i>
                        <span>
                            <h4>+251953897976</h4>
                            <p>Monday-Suday </p>
                        </span>
                     </div>
                     <div>
                        <i class="fas fa-paper-plane"></i>
                        <span>
                            <h4>sen'qRestaurant@gmail.com</h4>
                            <p>Email us your query </p>
                        </span>
                     </div>
                    
                 </div>
            
                 <div class="form-contact"> 
                      <form action="includes/store-contact-us.php" method="POST">
                        
                              Full Name:<input name="name" type="text"  placeholder="Your name"><br>
                              Email:<input name="email" type="email"  placeholder="Your email"><br>
                              Message:<br><textarea name="message" cols="30" rows="10" placeholder="Message"></textarea><br>
                              <input type="submit"  name="submit" value="Send Message" size="50">
                          
    
                      </form>
                    
        </div>
        </div> 
         </section>
         


         <?php include "includes/footer1.php" ?>
         </body>
                    </html>