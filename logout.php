<?php
/* Logout.php kill all sessions and redirect to login page
*/

session_start();
$_SESSION['username'] = null;
session_destroy();
header('Location: login.php');
?>