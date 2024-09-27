<?php
//require Configuration File
require_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .add {
            position: relative;
            background-color: #3a5968;
            padding: 10px;
        }

        .add-btn {
          width: 50px;
          align: center;
        }

        .login {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 6px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login h1 {
            color: #3a5968;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .checker {
            position: relative;
            margin-bottom: 20px;
        }

        .checker label {
            color: #3a5968;
            font-size: 16px;
        }

        .checker input[type="text"],
        .checker input[type="password"] {
            width: 90%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .psw {
            color: #3a5968;
            font-size: 14px;
            text-align: right;
            margin-bottom: 20px;
        }

        .psw a {
            color: #3a5968;
            text-decoration: none;
        }

        input[type="submit"] {
            background-color: #3a5968;
            color: #fff;
            margin:10px 0 10px 10px;
            width: 370px;
            border: none;
            border-radius: 4px;
            padding: 10px 50px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #5d99c6;
        }

        .sign-in-link {
            text-align: center;
        }

        .sign-in-link a {
            color: #3a5968;
            text-decoration: none;
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="add">
    <div class="add-btn"></div>
    <span class="name" style="position: relative;">
    <img src="../resources/images/logo.png" alt="logo" style="width: 80px; height: auto; position: absolute; top: 0; z-index: 9999;">
</span>
<div class="nav-links" id="navLink" style="text-align: right;">
    <i class="fa fa-times" onclick="hideMenu()" style="color: white;"></i>
    <div class="container"></div>
    <ul style="position: relative; width: 100%; list-style: none; margin: 0; padding: 0;">
        <li style="display: inline-block; margin-left: 10px;">
            <a href="index.php" style="text-decoration: none; color: white;">Home</a>
        </li>
        <!-- Add more navigation links here -->
    </ul>
</div>
      </div>

<div class="login">
    <h1>Log in</h1>
    <form action="includes/login.inc.php" id="form" method="post">
        <div class="checker">
            <label for="uname">Email Or Username</label>
            <input type="text" id="email" name="uname">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="checker">
            <label for="psw">Password</label>
            <input type="password" name="psw" id="password" minlength="8" required>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <span class="psw">Forgot <a href="#">password?</a></span> <br>
        <input type="submit" value="Login" name="login-submit" onclick="return check()">
    </form>

    <div class="sign-in-link">
        <?php
        if (isset($_SESSION['user_token'])) {
            header("Location: index.php");
        } else {
          echo "<a href='" . $google_client->createAuthUrl() . "' style='display: inline-block; text-decoration: none; text-align: center; border: 1px solid black; border-radius: 5px; padding: 20px 0 0 0; width: 375px; height: 40px;'>
          <img src='../resources/images/google.png' alt='Google' style='width: 20px; height: 20px; vertical-align: middle; margin-right: 10px;'>
          <span style='vertical-align: middle;'>Google Login</span>
      </a>";}
        ?>
        <p>Don't have an account?<a href="sign up.php"> Signin now</a></p>
    </div>
</div>

<script src="../../../resources/js/signup.js"></script>
</body>
</html>