<?php
session_start();
require('include/conect.php');


require('include/profile.php');
include('header.php');


?>

<?php

if(!isset($_SESSION['mang_name'] ) && !isset( $_SESSION['mang_id']))
{
  header('location: login.php');
  exit();
}
if(isset($_POST['submit']))
{
$user=$_POST['user'];
$hour=$_POST['hour'];
$reminingamounts=$_POST['ReceiptMoney'];
$date=$_POST['date'];
if(empty($user) || empty($hour))
{
  $error= "<span class='error'>عذرا حقل الاسم او عدد الساعات خالي</span>";

}else{
  if(empty($date))
  {
    $error1= "<span class='error'>عذرا لم تقوم باخال التاريخ</span>";
  }else{
   
  
htmlspecialchars($user);
htmlspecialchars($hour);
htmlspecialchars($reminingamounts);
htmlspecialchars($date);
$hours=filter_var($hour,FILTER_VALIDATE_FLOAT);

if($hours==false)
{
  $error2="<h4>ادخل عدد الساعات بشكل صحيح </h4>";
}else{




$sql="select hour from manager where mang_id=$_SESSION[mang_id]";
$q=$con->prepare($sql);
$q->execute();
$priceHour=$q->fetchColumn();
echo $priceHour;
$llprice=$hour*$priceHour;
$continuedamount=$llprice-$reminingamounts;

$sql="select mang_id from manager where mang_id=$_SESSION[mang_id]";
$q=$con->prepare($sql);
$q->execute();
$key=$q->fetchColumn();

$sql="insert into admin(nname,hours,llprice,reminingamounts,continuedamount,ddate,keyManager) values(:nname,:hours,:llprice,:reminingamounts,:continuedamount,:ddate,:keyManager)";
$q=$con->prepare($sql);
$q->execute(array("nname"=>$user,"hours"=>$hour,"llprice"=>$llprice,"reminingamounts"=>$reminingamounts,"continuedamount"=>$continuedamount,"ddate"=>$date,"keyManager"=>$key));
if($q->rowcount()) {
  htmlspecialchars($user);
  htmlspecialchars($hour);
  htmlspecialchars($llprice);
  htmlspecialchars($reminingamounts);
  htmlspecialchars($continuedamount);
  htmlspecialchars($date);
  htmlspecialchars($key);

  echo "<script> window.location.href='index.php'; </script>";


}else{


 echo "<h3> حدث خطا في الادخال حاول مرة اخرى </h3>"; 
}

}
  }
}
}

?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/insertUser.css">
  <link rel="stylesheet" href="css/style.css">
  <title>insertUser</title>
</head>
<STyle>
  label{
    display: flex;
  } 
input{
  color: black;
  font-size: large;
  
}
.insertUser{
  background-color: #123;
  padding:20px ;
 
}
.insertUser .backSolarr{
  text-decoration: none;
    padding: 20px;
   width: 100%;
    border-radius: 8px;
}
h4{
  display: flex;
  align-items: center;
  color: crimson;
}
</STyle>
<body>
  <form action="" method="post" enctype="multipart/form-data" >
    <h2>ادخال حساب العميل</h2>
  <label for="">الاسم :</label><input type="text" name="user" placeholder="Name..." required ><br>
    <?php  echo "<h5> .50   يمكنك ادخال نص ساعة بهذه الطريقة</h5>";?>
   <label for="">عدد الساعات :  </label><input type="text" name="hour" placeholder="2.50 or 3.25 " required ><br>
    <?php if(isset($error2)) echo "$error2"; ?>
   <label for="">الواصل: </label><input type="text" name="ReceiptMoney" placeholder="المبلغ الواصل" ><br>
    <input type="date" name="date" ><br>
    <button class="insertUser" type="submit" name="submit"  >اضافة</button><br>
   
  </form>

</body>
</html>