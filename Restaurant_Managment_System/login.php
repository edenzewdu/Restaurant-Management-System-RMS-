<?php
session_start();
include "includes/header.php";
include "config.php";
require_once 'vendor/autoload.php';
?>

        <div class="login">
          <h1>Log in</h1>
             <form  action="includes/login.inc.php " id ="form" method="post" >
               <div class="checker">
              <label for="uname">Email Or Username</label>
               <input type="text" id="email" name="uname">
               <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              
               <br><br>
               </div>
               <div class="checker">
               <label for="psw">Password</label> 
               <input type="password"  name="psw" id="password"  minlength="8"  required>
               <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              
            </div>


               <span class="psw">Forgot <a href="#">password?</a></span> <br>
               <input type="submit"value="Login" name="login-submit" onclick="return check()">
             <div class="sign-in-link">
             <a href="<?php echo $client->createAuthUrl(); ?>">
      <img src="../resources/images/google.png" width="40px" height="40px"> Login with Google
    </a>
                <p>Don't have an account?<a href="sign up.php"> Signin now</a></p>                                                                                                                    
            </div>
            </form>
            

              
        </div>
        <script src="../../../resources/js/signup.js"  ></script>

   
</body>
</html>
