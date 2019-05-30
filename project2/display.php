<?php
session_start();
echo "EMAIL = ". $_SESSION['email']."<br>";
echo "PASSWORD = ". $_SESSION['password']."<br>";
echo " go to<a href='logout.php'>logout page</a>";
?>