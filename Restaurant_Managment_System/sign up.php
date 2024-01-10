 <?php 
 session_start();
 //include_once "../create_database.php";
 //include_once "includes/create_table_users.php";
 include "includes/db.php";
 include "includes/header.php" ?>
        
       <div class="signin">
       <h1>Sign Up</h1>
          <form  action="includes/signup.inc.php" method = "post" id="form" name="yourform" >
          <div class="checker">
              <label for="text">User Name</label>
              <input type="text" placeholder="Enter your username" name="uid"  id="username">
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              
            </div>
            
            <div class="checker">
              <label for="text">Full Name</label>
              <input type="text" placeholder="Enter Full name" name="fullname"  id="fullname">
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              
            </div>
            <div class="checker">
              <label for="email">Email</label>
              <input type="email" id="email" placeholder="Enter Email" name="email" >
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              
            </div>
            <div class="checker">
              <label for="text">Phone Number</label>
              <input type="text" placeholder="Phone Number" name="p-no" id="phone">
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              
            </div>
            
             <div class="checker">
              <label for="psw">Password</label>
              <input type="password" id="password1" placeholder="Enter Password" minlength="8" name="psw" >
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>

            </div>
            <div class="checker">
              <label for="psw-repeat"><b>Confirm Password</b></label>
              <input type="password" id="password2"  
               placeholder="Repeat Password" name="psw-repeat" id="confirmPassword" minlength="8"> 
               <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                
            </div>
              <div class="sign-in-link">
                <p>Aleardy have an account<a href="login.php"> Log In</a></p> 
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>                                                                                                                   
            </div> 
            <input type="reset"value="Reset">
             <button type="submit" value="submit" name="signup-submit"> Sign up </button>
          </form>
          </div>
 

<!--footer section starts-->
  
<!--footer section starts-->
<script src="../../../resources/js/signup1.js"  ></script>

</body>
</html>



