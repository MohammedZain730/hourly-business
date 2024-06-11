

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/insertUser.css">
    <title>Update user </title>
</head>
<STyle>
table{
    display: flex;
   flex-direction: column;
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
</STyle>
<body>
<?php
session_start();
require("conect.php");

require('profile.php');
//include('../header.php');
if(!isset($_SESSION['mang_name']))
{
  header('location: login.php');
  exit();
}



            $sql="select * from  admin where id=:x";
            $q=$con->prepare($sql);
            $q->execute(array("x"=>$_SESSION['GetID']));
             if($q->rowcount()==1){
    
               
            $row=$q->fetch();
           

?>
<?php
 if(isset($_POST['submit']))
 {
 $user=$_POST['user'];
 $hour= filter_var( $_POST['hour'],FILTER_SANITIZE_NUMBER_FLOAT);


 $reminingamounts=filter_var( $_POST['ReceiptMoney'],FILTER_SANITIZE_NUMBER_INT);
 
 $date=$_POST['date'];
 $sql="select hour from manager where mang_id=$_SESSION[mang_id]";
$q=$con->prepare($sql);
$q->execute();
$priceHour=$q->fetchColumn();
echo $priceHour."<br>";
$llprice=$hour*$priceHour;
$continuedamount=$llprice-$reminingamounts;
echo $llprice."<br>";
echo $continuedamount."<br>";
echo $reminingamounts."<br>";
$sqlup="update admin set nname='$user' , hours=$hour, llprice='$llprice', reminingamounts='$reminingamounts' , continuedamount='$continuedamount' ,ddate='$date' where id=$_SESSION[GetID] ";
$up=$con->prepare($sqlup);
$up->execute();

echo "<script> window.location.href='../index.php'; </script>";

 }
echo "
<form action='' method='post' enctype='multipart/form-data'>
<h2>تعديل حساب العميل</h2>
<input type='text' name='user' value='$row[nname] '  required ><br>
<input type='text' name='hour' value='  $row[hours]  '  required ><br>
<input type='text' name='ReceiptMoney' value='  $row[reminingamounts]'  ><br>
<input type='date' value='$row[ddate]' name='date' ><br>
<button class='insertUser' type='submit' name='submit'  >تعديل</button><br>

</form>  
</table>";
      
 
 

    }
   
   
?>

         
        
</body>
</html>

