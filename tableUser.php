<?php

require('conect.php');
require('contral.php');

if(!isset($_SESSION['mang_name']))
{
  header('location: login.php');
  exit();
}
?>
<?php

if(isset($_GET['action'],$_GET['id'])){
   
  switch ($_GET['action']) {


                    case 'edit':
                      $_SESSION['GetID']=$_GET['id'];
echo "<script> window.location.href='include/ubdateuserinfo.php'; </script>";
                     
      
                       break;
                   case 'delete':
                   
               $sql="delete from admin where id=:x";
                  $q=$con->prepare($sql);
                $q->execute(array("x"=>$_GET['id']));
                if($q->rowcount()==1){
                  
                 echo "<h3 class='alert alert-success'>تم الحذف بنجاح</h3>";
               }
                  break;

                default:
                  echo "no action";
                break;
            }
          }
   
     

?>
<head>
<link rel="stylesheet" href="../css/style.css">
</head>
<style>

   a{
    padding: 7px;
    margin: 6px;
    border-radius: 8px;
    list-style: none ;
    text-decoration: none;
   } 
   .edit{
    background-color:darkblue;

   }
   .delete{
background-color: brown;
padding: 10px;
   }
.search{

  background-color: #123;
  padding: 9px; 
  border-radius: 8px;
  box-shadow: 5px 6px  #123  ;
  margin: 0; 
}
.search:hover{
    background-color: darkgreen;
}
table{
  /*display: flex;
  flex-direction: column;
  flex-grow: 1;
  flex-wrap: wrap;
  */
}
</style>


<table>
   
       


  <thead>
        <tr>
            <th>الاسم</th>
            <th>الساعات</th>
            <th>المبلغ الكلي</th>
            <th   >واصل</th>
            <th  > المتبقي</th>
      <?php if(contrul()==true) { echo"    <th colspan='1' > Manager Name</th>"; 
          echo " <th  >Date</th>"; };  ?>

            <th colspan="2" >الاجراء</th>
        </tr>
    </thead>
    <tbody>

<?php 
 if(contrul()==true)
 {
   $sql="select * from admin";
   $result=$con->prepare($sql);
   $result->execute();
   $rowC=$result->fetchAll();
   foreach($rowC as $rows)
{
  
 
    $id=$rows['id'];
    $name=$rows['nname'];
    $ahour=$rows['hours'];
    $llprice=$rows['llprice'];
    $reminingamounts=$rows['reminingamounts'];
   $continuedamount=$rows['continuedamount'];
  $keyManager=$rows['keyManager'];
$ddate=$rows['ddate'];
  
$sql="select mang_name from manager where mang_id=$keyManager";
$results=$con->prepare($sql);
$results->execute();
$manger_name=$results->fetchColumn();
  
  
echo "
        <tr>
        <td>$name</td>
        <td><span class='ahour' >$ahour</span> </td>
        <td> <span class='price'>$llprice</span> </td>
        <td> <span class='beforprice'>$reminingamounts</span> </td>
        <td> <span style='color:black' class='afterprice'>$continuedamount</span> </td>
        
         <td> <span style='color:black' class='afterprice'>$manger_name</span> </td>
        <td> <span style='color:black' class='afterprice'>$ddate</span> </td>
      <td> 
        <a class='edit' href='?action=edit&id=$id'> Edit </a> 
         
         
        
        </td>
        <td> <a class='delete' href='?action=delete&id=$id'> Delete</a></td>
        </tr>";
}
function sumALL(){
  global $con,$inter;
$sql="select * from admin";
$q=$con->prepare($sql);
$q->execute();
$sumAllUser=$q->fetchAll();
$sumHour=0;
$sumPrice=0;
$sumRemining=0;
$sumContinued=0;
foreach($sumAllUser as $sumAllUsers){


$ahour=$sumAllUsers['hours'];
$sumHour+=$ahour;
$llprice=$sumAllUsers['llprice'];
$sumPrice+=$llprice;

$reminingamounts=$sumAllUsers['reminingamounts'];
$sumRemining+=$reminingamounts;
$continuedamount=$sumAllUsers['continuedamount'];
$sumContinued+=$continuedamount;

}

echo"
<tr>
  <td>Total</td>
  <td><span class='ahour' >$sumHour</span> </td>
      <td> <span class='price'>$sumPrice</span> </td>
      <td> <span class='beforprice'>$sumRemining</span> </td>
      <td> <span style='color:black' class='afterprice'>$sumContinued</span> </td>
</tr>";
}

echo sumALL();
 }else{
  
 

  $sql="select * from admin where keyManager=$_SESSION[mang_id]";
  $result=$con->prepare($sql);
  $result->execute();
  $row=$result->fetchAll();
  foreach($row as $rows)
  {
  
   
      $id=$rows['id'];
      $name=$rows['nname'];
      $ahour=$rows['hours'];
      $llprice=$rows['llprice'];
      $reminingamounts=$rows['reminingamounts'];
     $continuedamount=$rows['continuedamount'];
    $keyManager=$rows['keyManager'];
  $ddate=$rows['ddate'];
  
  
  
  
  echo "
          <tr>
          <td>$name</td>
          <td><span class='ahour' >$ahour</span> </td>
          <td> <span class='price'>$llprice</span> </td>
          <td> <span class='beforprice'>$reminingamounts</span> </td>
          <td> <span style='color:black' class='afterprice'>$continuedamount</span> </td>
          
         <td> 
          <a class='edit' href='?action=edit&id=$id'> Edit </a> 
           
           
          
          </td>
          <td> <a class='delete' href='?action=delete&id=$id'> Delete</a></td>
          </tr>";
  }
        ?>
          <?php 
  function sum(){
      global $con,$inter;
  $sql="select * from admin where keyManager=$_SESSION[mang_id]";
  $q=$con->prepare($sql);
  $q->execute();
  $sumAllUser=$q->fetchAll();
  $sumHour=0;
  $sumPrice=0;
  $sumRemining=0;
  $sumContinued=0;
  foreach($sumAllUser as $sumAllUsers){
  
  
  $ahour=$sumAllUsers['hours'];
  $sumHour+=$ahour;
  $llprice=$sumAllUsers['llprice'];
  $sumPrice+=$llprice;
  
  $reminingamounts=$sumAllUsers['reminingamounts'];
  $sumRemining+=$reminingamounts;
  $continuedamount=$sumAllUsers['continuedamount'];
  $sumContinued+=$continuedamount;
  
  }
  
  echo"
  <tr>
      <td>Total</td>
      <td><span class='ahour' >$sumHour</span> </td>
          <td> <span class='price'>$sumPrice</span> </td>
          <td> <span class='beforprice'>$sumRemining</span> </td>
          <td> <span style='color:black' class='afterprice'>$sumContinued</span> </td>
  </tr>";
  }
  
  echo sum();
 }
?>
    </tbody>
</table>




   
  
