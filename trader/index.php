<?php 
session_start();
if(isset($_SESSION['uname'])){
 header("location:home.php");
}
?>
<!DOCTYPE Html>
<html>
	<head>
	<title> Login Form </title>
	<link rel="stylesheet" href="assests/css/bootstrap.min.css" type="text/css"/>
	</head>
	<style>
	#form input{
		width:70%;
	}
	#form1{
		margin:200px 0 0 40px;
	}
	h1{
		color:#ccc;
		font-weight:bold;
	}
	img{
		margin-top:-25px;
	}
	body {background:#507;}


	</style>
	<body>
    	<div class="container">
			<div class="row" id="form1">
				<center><h1>Login Here</h1></center>
				<div class="col-sm-3">
					<img src="login.png" />
				</div>
				<div class="col-sm-9">
					<form method="post" action="" id="form">
						<input type="text"  class="form-control" name="uname"  maxlength="20" placeholder="Username" required="required" autocomplete="off" autocomplete="off" /><br>
						<input type="password" class="form-control" name="pass" placeholder="Password" required="required" autocomplete="off" /><br>
						<input type="submit" style="width:30%" class="btn btn-primary" name="login" value="login" />
					</form>
					<?php $msg = "<h3 class=\"bg bg-info\" style=\"color:red\">Username or Password is incorrect</h3>" ?> 
				</div>
			</div>
		</div>
	</body>
</html>
<?php 
if(isset($_POST['login']) & !empty($_POST['login']) ){
	$uname =  $_POST['uname'] ;
	$pass = $_POST['pass'] ;
	if($uname == "noor" & $pass == "123"){
		$_SESSION['uname'] = $uname;
		header("location:home.php");
	}else{
		echo $msg;
	}
}
?>