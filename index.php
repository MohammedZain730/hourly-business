<?php

require('include/conect.php');
session_start();
require('include/profile.php');
include('header.php');
require('include/tableUser.php');
?>
<?php


if(!isset($_SESSION['mang_name']))
{
  header('location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>حساباتي</title>
</head>
<body >

<?php
require('include/footer.php');

?>
</body>
</html>