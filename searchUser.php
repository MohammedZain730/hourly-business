<?php
session_start();
require('include/conect.php');

include('header.php');


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
    <title>SearchUser</title>
</head>
<style>
    .colspan{
     
     
    }
.alafter{
  
   padding: 3px;
   margin-left:89px ; 
   
}
 .albefor{
    padding: 3px;
   margin-left: 1px; 
   margin-right:81px ;

 } 

.price{

    }
    .beforprice{
       background-color: #123;
    }
    .afterprice{
        background-color: #123 !important;
    }
    .sumbefor{
        background-color: darkgreen;
    }

.search{

background-color: #123;
padding: 9px; 
border-radius: 8px;
box-shadow: 5px 6px  #123  ;
margin: 0; 
}
.b:hover{
  background-color: darkgreen;
}
.date{
    background-color: darkgreen;
    padding: 7px;
    border-radius: 8px;
}

.after{
    padding: 9px 25px 9px 25px;
  
    border-radius: 8px;
   background-color: darkred; 
   color: whitesmoke ;
}
.backSolar button{
    background-color: #123;
    padding: 8px;
    border-radius: 8px;
}
</style>
<body>
<table>
    <thead>
        <tr>
            <th>الاسم</th>
            <th>الساعات</th>
            <th>المبلغ</th>
            <th >واصل </th>
            <th >المتبقي </th>
            <th colspan="1" >التاريخ</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if(isset($_POST['submit']))

    {
$user=$_POST['SearchUser'];

    }
function sumUser(){
    global $con,$user;
$sql="select * from admin where keyManager=$_SESSION[mang_id] and nname='$user';  ";
$q=$con->prepare($sql);
$q->execute();
$sumAllUser=$q->fetchAll();
$sumHour=0;
$sumPrice=0;
$sumRemining=0;
$sumContinued=0;
foreach($sumAllUser as $sumAllUsers){

$nameUser=$sumAllUsers['nname'];
$ahour=$sumAllUsers['hours'];
$sumHour+=$ahour;
$llprice=$sumAllUsers['llprice'];
$sumPrice+=$llprice;

$reminingamounts=$sumAllUsers['reminingamounts'];
$sumRemining+=$reminingamounts;
$continuedamount=$sumAllUsers['continuedamount'];
$sumContinued+=$continuedamount;
$date=$sumAllUsers['ddate'];
echo"
<tr>
    
    <td><span class='user' >$nameUser</span> </td>
        <td> <span class='hour'>$ahour</span> </td>
        <td> <span class='allprice'>$llprice</span> </td>
        <td> <span  class='beforprice'>$reminingamounts</span> </td>
        <td> <span  class='afterprice after'>$continuedamount</span> </td>
        <td> <span  class='date'>$date</span> </td>
        </tr>";
}

echo"
<tr>
    <td>المجموع</td>
    <td><span class='ahour' >$sumHour</span> </td>
        <td> <span class='price'>$sumPrice</span> </td>
        <td> <span class='beforprice sumbefor'>$sumRemining</span> </td>
        <td> <span  class='after'>$sumContinued</span> </td>
</tr>";
}

echo sumUser();
?>
    </tbody>
</table>
<div class="title-info">
<form action="" method="post" >
    <input class="search" type="text" name="SearchUser" placeholder="اسم الزبون" required>
    <button class="search b" type="submit" name="submit" >ابحث</button>

</form>
 <a href="index.php" class="backSolar" > <button>رجوع الى الصفحة الرئيسية</button></a>
        </div>
    </div>

</body>
</html>

