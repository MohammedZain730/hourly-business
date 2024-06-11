<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/insertUser.css">
    <title>Update Hour</title>
</head>
<body>
<?php
session_start();
require("include/conect.php");

require('include/profile.php');
include('header.php');
if(!isset($_SESSION['mang_name']))
{
  header('location: login.php');
  exit();
}

$sql="select hour from manager where mang_id=$_SESSION[mang_id]";
$q=$con->prepare($sql);
$q->execute();
 
 $priceHour=$q->fetchColumn();


 if(isset($_POST['submit']))
 {
    global $priceHour;
 
 $newhour=$_POST['newhour'];
 $newhour=filter_var($newhour,FILTER_SANITIZE_NUMBER_FLOAT);


$sqlup="update manager set  hour=$newhour where mang_id=$_SESSION[mang_id]";
$up=$con->prepare($sqlup);
$up->execute();
echo "<script> window.location.href='index.php'; </script>";

 }
 
echo "
<form action='' method='post' enctype='multipart/form-data'>
<h2>تعديل قيمة الساعة</h2>
<p> قيمة الساعه الحالية هي $priceHour</p>


<input type='number' name='newhour' placeholder=' new price a hour...'  required  ><br>

<button class='insertUser' type='submit' name='submit'  >تعديل</button><br>

</form>  
</table>" 
;
    
 
 
 
    
   
   
?>

         
        
</body>
</html>