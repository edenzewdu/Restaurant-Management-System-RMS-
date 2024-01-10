<?php

session_start();
session_unset();
unset($_SESSION['isLoggedIn']);
session_destroy();

echo '<script>window.location="../login.php"</script>';

?>