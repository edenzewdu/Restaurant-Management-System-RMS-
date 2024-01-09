<?php
require 'Entity/NewsLetterEntity.php';

class NewsLetterModel {
    
    function InsertNewsLetters(NewsLetterEntity $news)
    {
        require 'credentials.php';
        
        $conn = mysqli_connect($host,$user,$password) or die(mysqli_error());
        mysqli_select_db($conn, $database);
        $query = sprintf("INSERT INTO newsletterlog(title,subject,news)VALUES('%s','%s','%s')",
                $news->title,
                $news->subject,
                $news->news);
        if(mysqli_query($conn, $query))
        {
            echo "<script type='text/javascript'> alert('NewsLetter has been sent')</script>";
            mysqli_close($conn);
        }
        else
        {
            echo "<script type='text/javascript'> alert('Something might not right')</script>";
        }
    }
}
