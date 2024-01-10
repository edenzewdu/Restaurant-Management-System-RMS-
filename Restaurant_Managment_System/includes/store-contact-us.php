<?php

include 'db.php';

if(isset($_POST['submit']))
{    

     $name = $_POST['name'];
     $message = $_POST['message'];
     $email = $_POST['email'];


     $sql = "INSERT INTO contact_us (name, email, message)
     VALUES (?, ?, ?)";  

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../contactus.php?error1=error");
          exit();
        }
        else {
            
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
            
              if (mysqli_stmt_execute($stmt)) {
                echo"<script>alert('Your contact information is saved successfully')</script>";
                header ("Location: thank-you.php");
              }
              else{
                echo"<script>alert('error sending message.try again')</script>";
                header("Location: ../contactus.php?error1=error");
              }
     mysqli_stmt_close($stmt);
     mysqli_close($conn);
}
}
 // header ("Location: thank-you.php");

?>


