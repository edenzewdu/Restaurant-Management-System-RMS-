<?php


if(isset($_POST['login-submit'])){

    require 'db.php';

    $mailuid = $_POST['uname'];
    $password = $_POST['psw'];
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    if(empty($mailuid) || empty($password)){
        header("location: ../login.php?error=emptyfields");
        exit();
        }
    else{
        $emailSQL = "SELECT * FROM accounts WHERE username = '$mailuid'or email = '$mailuid';";

        $passwordSQL = "SELECT * FROM accounts WHERE  email = '$mailuid' And password = $hashedPwd;";

        $emailResult = $conn->query($emailSQL);

        $passwordResult = $conn->query($passwordSQL);

        $sql = "SELECT username FROM accounts WHERE username = ? or email = ?";
        $stmt = mysqli_stmt_init($conn);

        if ($emailResult->num_rows <= 0) {
            echo '<script>alert("This User Does Not Exist.")</script>';
            header("location: ../sign up.php?error=noSuchUser");
            exit();
        }else if ($passwordResult->num_rows <= 0) {
            echo '<script>alert("The Password is Incorrect.")</script>';
            header("location: ../login.php?error=pwderror");
            exit();
        }
         else if(!mysqli_stmt_prepare($stmt,$sql)){

            header("location: ../login.php?error=sqlerror");
            exit();
        }
        else {
            $SQL = "SELECT * FROM accounts WHERE (username = '$mailuid' or email = '$mailuid') And password = '$hashedPwd'";
            $result = $conn->query($SQL);

            foreach ($result as $r) {
                $_SESSION['name'] = $r['username'];   
                $_SESSION['phone'] = $r['phone_no'];
                $_SESSION['email'] = $r['email'];
                $_SESSION['password'] = $r['password'];
                $_SESSION['role'] = $r['role'];
            }

            if ($_SESSION['role'] == 2) {
                $_SESSION['adminLoggedIn'] = $r['id'];
                header("location: ../admin/food_list.php?login=success");
                exit();
            }elseif ($_SESSION['role'] == 1) {
                $_SESSION['isLoggedIn'] = $r['id'];
                header("location: ../index.php?login=success");
                exit();
            } 
            

            
            }

        }

}else{

    header("location: ../login.php");
    exit();
}