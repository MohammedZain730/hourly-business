<!--footer-->
<?php 

require('conect.php');

?>
<html dir="rtl" >
<head>
<link rel="stylesheet" href="../css/insertUser.css">

</head>
<style>
  *{
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }
.footer{
 
  padding: 0;
  margin: 0;
    display: flex;
    width: 100%;
   height: 50%;
    background-color: #123;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-around;
    gap: 1px;
    overflow: hidden;
}
.container{
    display: flex; 
    flex-direction: column;
    width: 60%;
    flex-grow: 1;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-around;
    gap: 5px;
}
.address{
 display: flex;
 flex-direction: column;
 gap: 1ch;
 flex-grow: 1;
}

.footer-middle{
    display: flex; 
    width: 40%;
    flex-grow: 1;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-around;
    gap: 5px;
    overflow: hidden;
  
}

.address p{
  padding: 7px;
  margin: 2px;
}
.address p:hover{
background-color:darkolivegreen;
border: 2px solid #124;
}
.copyright-left{
 flex: 0;
 order: 2;
 width: 30ch ;
 padding: 2ch;
 background-color: darkgreen;
 border-radius: 1ch;
}
</style>

<div class="footer">
  <?php require('souchal.php'); ?>
   
    <div class="container">
     
      
       
      
      <div class="col-md-3 footer-middle">
       

           


               
               <div class="address">
                   <h5>Eng.Mohammed-Zain-Al-homri
</h5>
      
        <div class="address">
          <h5> Address: Yemen-Al Dhale: Damt city
</h5>
        </div>
        <div class="address">
          <h5>Phone-1: 730184604</h5>
        </div>
        <div class="address">
          <h5>Phone-2: 773447061</h5>
              </div>
      </div>
     
    
    
    <!-- //container -->
  </div>
<!--/footer-->
<!--copy-rights-->
<div class="copyright">
    <!-- container -->
    <div class="container">
     
      <!--div class="clearfix"> </div--><br>
      <div class="copyright-left">
      <p>© <?php echo date('Y');?> Rents System </p>
      </div>
    </div>
   



  </div>

  </html>