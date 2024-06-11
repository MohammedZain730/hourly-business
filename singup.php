<?php
require('include/conect.php');
session_start();

?>

<head>

<link rel="stylesheet" href="css/insertUser.css">
<!--link rel="stylesheet" href="css/style.css"-->
</head>
<style>
	*{
		padding: 0;
		margin: 0;
	}

	.form-signin-heading{
background-color: #123;
border-radius: 8px;
box-shadow: 5px 7px black ;
border: 1px solid whitesmoke;


	}
input{
	margin: 5px;
	font-size: 30px;
	height: 8%;
}
button{

	height:25vh ;
}
.title-info{
	display: flex;
	align-items: center;
	justify-content: center;
	flex-grow: 0;
	height: 28vh;
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


</style>
<?php
  $sql = "SELECT MAX(mang_id)  FROM manager";
  $q=$con->prepare($sql);
  $q->execute();
  $max_id=$q->fetchColumn();
 
  $next_id=$max_id+1;


if(isset($_POST['login'])){



	$username=filter_var( $_POST['mang_name'],FILTER_SANITIZE_STRING);

	$email=filter_var( $_POST['mang_email'],FILTER_VALIDATE_EMAIL);
	$password=md5($_POST['password']);
	$hour=filter_var( $_POST['hour'],FILTER_VALIDATE_FLOAT);
	htmlspecialchars($username);
	htmlspecialchars($email);
	htmlspecialchars($password);
	htmlspecialchars($hour);
	
	if($email==false){
		$errorE="<h4>ادخل EMAIL بشكل صحيح</h4>";
	}elseif($hour==false){
		$errorH="<h4>ادخل قيمة الساعة بشكل صحيح</h4>";
	}else {
		
	
	$sql="select mang_email , password from manager";
	$q=$con->prepare($sql);
	$q->execute();
	$row=$q->fetchAll();
	$checkMangPhone;
	$checkMangPassword;
	foreach($row as $rows)
	{
		$checkMangPhone=$rows['mang_email'];
		$checkMangPassword=$rows['password'];
if($checkMangPassword==$password)
{
echo "<h3> كلمة السر خاطئة ادخل كلمة مرور اخرى</h3>";

exit();
}
	if($checkMangPhone==$email)	
	{

	
echo"<h3> الايميل  هذا تم تسجيل دخول به من قبل</h3>";
exit();

	}
	}


	if(empty($username) || empty($password)){
		$error= "<span class='error'>please enter Name or password </span>";
	}else{

	
	
	$sql="insert into manager(mang_id,mang_name,password,mang_email,hour) values(:mang_id,:mang_name,:password,:mang_email,:hour)";
	$q=$con->prepare($sql);
	$q->execute(array("mang_id"=>$next_id,"mang_name"=>$username,"password"=>$password,"mang_email"=>$email,"hour"=>$hour));
	if($q->rowcount()) {

		$_SESSION['mang_id']=$next_id;
		$_SESSION['mang_name']=$username;
		$_SESSION['mang_email']=$email;
		echo "<h3 >one manager inserted</h3>";
		echo "<script type='text/javascript'> document.location ='index.php'; </script>";
	}
  }
	}
	}
?>
<body>
<div class="wrapper">
	
    <form class="form-signin" method="post" enctype="multipart/form-data" >       
      <h2 class="form-signin-heading">انشاء حساب</h2>
	  <input type="text" class="form-control" name="mang_name" placeholder="name " autofocus="" required />
      <input type="email" class="form-control" name="mang_email" placeholder="Email " autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required /> 
	  
	  <input type="number" class="form-control" name="hour" placeholder="سعر الساعة" require/> 
	  <br> 
	  <?php if(isset($error)) echo "<p class='error'>" .$error."</p>" ?>  <br>   
	  <a class="linkHome" href="index.php"  >  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button> </a>
	  <a href="login.php" class="auth-link text-black"> هل لديك حساب اضغط هنا</a>	<br>
    </form>
	
  </div>
</body>