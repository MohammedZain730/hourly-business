<head>

<link rel="stylesheet" href="css/style.css">
</head>

<?php
require('include/conect.php');

if(!isset($_SESSION['mang_name']))
{
  header('location: login.php');
  exit();
}
?>

<style>
  /*  .title-action{
        display: flex;
        flex-wrap: wrap;
    }
.linksearch{
text-decoration: none;

}
.linksearch .search ,.search{
    background-color: #123;
}*/
.box a{
    background-color: #123;
    text-decoration: none;
   
}

</style>
<div class="content">
        <div class="title-info">
           
            <p>dashbord</p>
            <i class="fas fa-chart-bar"></i>
            
        </div>

        <div class="data-info">
            <div class="box">
            <a  href="index.php">
            <i class="fas fa-home"></i>
<!--svg  class="fas fa-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="51" height="51">
    <g id="_01_align_center" data-name="01 align center">
    <path d="M13.338.833a2,2,0,0,0-2.676,0L0,10.429v10.4a3.2,3.2,0,0,0,3.2,3.2H20.8a3.2,3.2,0,0,0,3.2-3.2v-10.4ZM15,22.026H9V17a3,3,0,0,1,6,0Zm7-1.2a1.2,1.2,0,0,1-1.2,1.2H17V17A5,5,0,0,0,7,17v5.026H3.2a1.2,1.2,0,0,1-1.2-1.2V11.319l10-9,10,9Z"/></g>
</svg-->

              
                <div class="data">
                    <p>  dashbord </p>
                    </a>
                    
                 </div>
          </div>
          <?php  
          $sql="select max(mang_id) from manager";
          $result=$con->prepare($sql);
          $result->execute();
          $name=$result->fetchColumn();

         

          ?>
            <div class="box">
              
                <i class="fas fa-user-group"></i>
                <div class="data">
                    <p>users</p>
                    <span><?php  echo $name; ?> </span>
                    
            </div>
            </div>
            <div class="box">
            <a href="insertUser.php"> 
                <i class="fas fa-user"></i>
                <div class="data">
                    <p>  add a customer </p>
                   
                    </a>  
            </div>
            </div>
            <div class="box">
            <a href="searchUser.php">

            <i class="fas fa-search "></i>
                <div class="data">
                
                    <p>  بحث </p>

                    </a>
                    
            </div>
            
        </div>
        
   
   
        
    </div> 
    <!--div class="title-action" style="background-color: #123;" >

       <a class="linksearch" href="searchUser.php"> <button class="search" >بحث عن حساب زبون</button></a> 
        <a class="linksearch" href="index.php">   <button class="search" >عرض الحسابات </button></a>
         <a class="linksearch"  href="insertUser.php">  <button class="search" >اضافة زبون</button></a>
        </div-->
    
    <div  class="title-info">
    
            <p></p>
            <p><?php echo " مرحبا  ".$_SESSION['mang_name']."  في تطبيق الاجارات  " ?> </p>  
            <i class="fas fa-chart-bar"></i>
        </div>
