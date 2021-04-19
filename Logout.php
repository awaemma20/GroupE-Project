<?php
include_once('includes/connection.php');
session_start();

header('Location:login.php');

session_destroy();
?>
