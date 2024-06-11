
<?php
require('conect.php');

if(!isset($_SESSION['mang_name']))
{
  header('location: login.php');
  exit();
}
?>


   <html dir="rtl" >
<head>
<link rel="stylesheet" href="../css/style.css">

</head>
<style>
    .menu{
        height: 100% !important;
    }
    p{
        color: whitesmoke;
        
    }
   a i{
      padding: 0%;
      margin: 0%;
      flex-grow: 2;
    }
    
</style>
<body>
<div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                <svg fill="#D5DDDF" height="50" viewBox="0 0 24 24" width="50" xmlns="http://www.w3.org/2000/svg">
    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg>
                    <!--img src="img/3.png" alt="profile"-->

                </div>
                <h2><?php
                if($_SESSION['mang_name'])
                {

                
              echo $_SESSION['mang_name'] ;  
                }
                else
                {
                    echo "Man";
                }
                ?></h2>
            </li>
            <li>
                <a class="active" href="index.php">
                    <i class="fas fa-home"></i>
                <p>dashbord</p>
                </a>
            </li>
          
            <li>
                <a href="#">
                    <i class="fas fa-user-group"></i>
                <p>favorite</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-chart-pie"></i>
                <p>charts</p>
                </a>
            </li>
            <li>
                <a href="ManagerUpdatePricHour.php">
                    <i class="fas fa-cog"></i>
                <p>settings</p>
                </a>
            </li>
            
            <li>
                <a class="logout" href="logout.php">
               
               <i class="fas fa-sign-out" ></i>

<p  >log out</p> 
                    
               
                </a>
            </li>
            
        </ul>
    </div>
    </body>
    </html> 