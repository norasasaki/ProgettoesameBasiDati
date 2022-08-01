<?php
session_start();
unset($_SESSION['password']) ;
unset($_SESSION["logged"]);
unset($_SESSION['username']);
unset($_SESSION['email']);
session_destroy();
?>