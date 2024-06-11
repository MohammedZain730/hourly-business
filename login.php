<?php
require('include/conect.php');
session_start();

?>
<head>
	<link rel="stylesheet" href="css/insertUser.css">
</head>
<style>

h3{
	color: whitesmoke;
}

.form-signin-heading{
	background-color: #123;
border-radius: 8px;
box-shadow: 5px 7px black ;
border: 1px solid whitesmoke;

}

.linkHome button{
	
	background-color: #123;
    padding: 20px;
	height: 12vh;
	flex-basis: 160px;
    border-radius: 8px;
	font-size: large;
}
 a{
   color: whitesmoke;
	text-decoration: none;
	padding: 10px;
	
}
input {
font-size:30px;
height: 7%;
caret-color: darkgreen;
}
button{
	
}
</style>
<?php
$pp=md5("2255");
$pm=md5("2255");

if(isset($_POST['login'])){


	$email=filter_var( $_POST['email'],FILTER_VALIDATE_EMAIL);
	$pass=md5($_POST['password']);
	if($email==false)
	{
		$errorEE= "<span class='error'>please agin email </span>";
	}else{


	if(empty($email) || empty($pass)){
		$error= "<span class='error'>please enter email or password </span>";
	}

	

	   else{

	   


		$sql="select * from manager where   password=:password and mang_email=:mang_email";
		$q=$con->prepare($sql);
		$q->execute(array("password"=>$pass,"mang_email"=>$email));

		
		if($q->rowCount())
	{

		$row=$q->fetch();
		if(!empty($_POST["remember"])) {
			//COOKIES for username
			setcookie ("username",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
			setcookie ("email_login",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
			//COOKIES for password
			setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
			if(isset($_COOKIE["email_login"])) {
			setcookie ("email_login","");
			if(isset($_COOKIE["userpassword"])) {
			setcookie ("userpassword","");
					}
				}}
		
		if($row['active']==1){
				 $_SESSION['mang_name']=$row['mang_name'];
				 $_SESSION['mang_id']=$row['mang_id'];
				
				
				header("location: index.php");
		}
		else{
			
		header("location: singup.php");
		}

	/*
	 
	*/
	
	
		}else{
	echo "<script>alert('Invalid Details');</script>";
	}
	}

	

	}
}

		
		
?>
<body>
<div class="wrapper">
    <form class="form-signin" method="post">       
      <h2 class="form-signin-heading">Please login</h2>
	  
      <input type="email" class="form-control" name="email" placeholder="email Address" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password"/>  
	  <br> 
	   
	  <?php if(isset($error)) echo "<h3>$error </h3>" ; ?>  <br>
	  <?php if(isset($error1)) echo "<h3>$error1 </h3>" ; ?>  <br>
	  <label class="form-check-label text-muted">
                        <input type="checkbox" id="remember" class="form-check-input" name="remember" <?php if(isset($_COOKIE["email_login"])) { ?> checked <?php } ?> /> Keep me signed in </label>
					
     <a class="linkHome" href="index.php"><button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button></a> 
	 <a href="singup.php" class="auth-link text-black">حساب جديد</a>	<br>
	</form>
  </div>
</body>