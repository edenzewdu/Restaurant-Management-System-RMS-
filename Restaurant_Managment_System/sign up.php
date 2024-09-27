<?php
session_start();
include "includes/db.php";
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

        .signin {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 6px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .signin h1 {
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
        .checker input[type="password"],
        .checker input[type="email"] {
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
<div class="signin">
    <h1>Sign Up</h1>
    <form action="includes/signup.inc.php" method="post" id="form" name="yourform">
        <div class="checker">
            <label for="username">User Name</label>
            <input type="text" placeholder="Enter your username" name="uid" id="username">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
        </div>

        <div class="checker">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter Email" name="email">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
        </div>

        <div class="checker">
            <label for="phone">Phone Number</label>
            <input type="text" placeholder="Phone Number" name="p-no" id="phone">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
        </div>

        <div class="checker">
            <label for="password1">Password</label>
            <input type="password" id="password1" placeholder="Enter Password" minlength="8" name="psw">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
        </div>

        <div class="checker">
            <label for="password2"><b>Confirm Password</b></label>
            <input type="password" id="password2" placeholder="Repeat Password" name="psw-repeat" minlength="8">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
        </div>

        <div class="sign-in-link">
            <p>Already have an account? <a href="login.php">Log In</a></p>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        </div>

        <input type="reset" value="Reset" style="width: 100%; padding: 10px; margin-top: 10px; background-color: #ccc; border: none; border-radius: 5px; cursor: pointer;">
        <button type="submit" value="submit" name="signup-submit" style="width: 100%; padding: 10px; margin-top: 10px; background-color: #3a5968; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Sign up</button>
    </form>
</div>

<!--footer section starts-->
  
<!--footer section starts-->
<script src="../../../resources/js/signup1.js"></script>
