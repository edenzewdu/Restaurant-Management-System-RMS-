<?php

require 'credentials.php';
        
$conn = mysqli_connect($host,$user,$password) or die(mysqli_error());
        mysqli_select_db($conn, $database);
        
        $id = $_GET["eid"];
        $query = sprintf("DELETE FROM login WHERE id = $id");
        if(mysqli_query($conn, $query))
        {
            echo' <script language="javascript" type="text/javascript"> alert("Deleted") </script>';
            mysqli_close($conn);
        }
        echo '<meta http-equiv="refresh" content="1; URL=usersettings.php" />';
?>

