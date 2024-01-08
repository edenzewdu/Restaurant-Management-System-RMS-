<?php
require 'credentials.php';
ob_start();
mysql_connect($host,$user,$password) or die(mysql_error());
mysql_select_db($database);

$id = $_GET["eid"];
if($id == "")
{
    echo '<script>alert("Something might be wrong") </script>' ;
    //header('Location: messages.php');
    echo '<meta http-equiv="refresh" content="1; URL=messages.php" />';
}
else
{
    $querydel="DELETE FROM `contact` WHERE id ='$id' ";
    if(mysql_query($querydel))
    {
	echo '<script>alert("Subscriber Remove") </script>' ;
        //header('Location: messages.php');
        echo '<meta http-equiv="refresh" content="1; URL=messages.php" />';
    }
}
ob_end_flush();
?>

