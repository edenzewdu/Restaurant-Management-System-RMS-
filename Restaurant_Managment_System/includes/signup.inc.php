<?php

if(isset($_POST['signup-submit'])){
//mysqli_report(MYSQLI_REPORT_ERROER | MYSQLI_REPORT_STRICT);
    require 'db.php';

    $username = $_POST['uid'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phoneno = $_POST['p-no'];
    $password = $_POST['psw'];
    $passwordRepeat = $_POST['psw-repeat'];

    $checkSQL = "SELECT * FROM `accounts` WHERE email = '$email';";
    $checkresult = $conn->query($checkSQL);
    
    
    if(empty($username) || empty($fullname) || empty($email) || empty($phoneno) || empty($password) || empty($passwordRepeat)){
        echo '<script>alert("Required fields cannot be empty")</script>';
        header("location: ../sign up.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if ($checkresult->num_rows > 0) {
        echo '<script>alert("This Email Already Exit.")</script>';
        header("location: ../sign up.php?error=emailexist&uid=".$username."&mail=".$email);
        exit();
    }
    elseif(!filter_var($email , FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/" , $username) ){
        header("location: ../sign up.php?error=invalidmailuid");
        exit();
    }
    elseif(!filter_var($email , FILTER_VALIDATE_EMAIL) ){
        header("location: ../sign up.php?error=invalidmail&uid=".$username);
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/" , $username) ){
        header("location: ../sign up.php?error=invalidmailuid&mail=".$email);
        exit();
    }
    else if ($password !== $passwordRepeat){
        header("location: ../sign up.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else{

        $sql = "SELECT username FROM accounts WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){

            header("location: ../sign up.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if($resultcheck > 0){
                header("location: ../sign up.php?error=usertakenemail=".$email);
                exit(); 
            }
            else{

                $sql = "INSERT INTO accounts(username, Full_name, email, phone_no, password) VALUES(?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){

                    header("location: ../sign up.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


                    // $iquery="INSERT INTO `accounts`(`username`, `Full name`,`email`, `phone no`, `password`) 
			        // 		VALUES ('$username','$fullname','$email','$phoneno','$hashedPwd');";
			        	
                    
                    mysqli_stmt_bind_param($stmt, "sssss", $username,$fullname,$email,$phoneno,$hashedPwd);
                    
                    if (mysqli_stmt_execute($stmt)) {
                        echo '<script Type="text/javascript">alert("You successfully signed up"); </script>';

                    header("location: ../login.php?signup=success");
                    exit();
                }
            }
        }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else{
    header("location: ../sign up.php");
    exit();

}


