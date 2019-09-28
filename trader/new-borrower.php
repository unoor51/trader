<?php session_start(); 
if(!isset($_SESSION['uname'])){
  header("location:index.php");
}
require_once("connect.php"); ?>
<!DOCTYPE Html>
	<html>
		<head>
			<meta http-equiv="Content-type" conten="text/html; 
			charset=UTF-8">
			<meta charset="UTF-8">
		
			<meta name="viewport" content="width=device-width,initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
			<link rel="icon" href="assests/img/favicon.ico" />
			<title>Add Borrowers</title>
			
			<!--bootstrap core css-->
			<link href="assests/css/bootstrap.min.css"  rel="stylesheet"/>
			
			<!--font awesome icon-->
			<link href="assests/css/font-awesome/css/font-awesome.min"
			rel="stylesheet"/>
			
			<!--custom css-->
			<link href="assests/css/custom.css" rel="stylesheet" />
			<script src="assests/js/jquery-3.0.0.min.js"></script>
			
			<!--google fonts-->
			<link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css' />
			<!--afont awsome-->
			<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
			
		</head>
		<script type="text/javascript">
		$(document).ready(function(){
			$("#submit").click(function(){
				if(!isNaN($("#name").val()) ){
					alert("Customer Name Should be text");
					return false;
				}
				if(isNaN($("#debut").val())){
					alert("Debit Price Should be a Number");
					return false;	
				}
					if(isNaN($("#cr").val())){
					alert("Credit Should be a Number");
					return false;	
				}
			});
		});
		</script>
		<body>
			<?php 
				if(isset($_POST) & !empty($_POST) ) {
					$cname = mysqli_real_escape_string($connection,$_POST['cname']);
					$vno = mysqli_real_escape_string($connection,$_POST['vno']);
					$narration = mysqli_real_escape_string($connection,$_POST['narration']);
					$de = mysqli_real_escape_string($connection,$_POST['de']);
					$cr = mysqli_real_escape_string($connection,$_POST['credit']);
					$borrower = "INSERT INTO accounts (cname,vno,narration,de,cr) 
								VALUES('$cname','$vno','$narration',$de,$cr)";
					$bResult = mysqli_query($connection,$borrower);
					if($bResult){?>
					<script type="text/javascript">alert("Data Inserted");</script>
				<?php }
				}
			?>
			<div class="container-fluid">
			  	<div class="row content">
			    	<div class="col-sm-3 sidenav">
				      	<h4 style="text-align: center;color: red;font-family:tahoma;">
				      		M Yaseen and Abdul Rauf Son's Oil Traders
				      	</h4>
				     	<ul class="nav nav-pills nav-stacked">
					        <li><a href="home.php">Home</a></li>
					        <li><a href="add-items.php">Add Items</a></li>
					        <li class="active"><a href="new-borrower.php">Borrowers</a></li>
					        <li><a href="service_record.php">Service Record</a></li>
					        <li><a href="viewSales.php">View Sales</a></li>
					        <li><a href="ledger.php">Borrower's Ledger</a></li>
					        <li><a href="log-out.php">Log Out</a></li>
				      	</ul><br>
			      	</div><!-- col-sm-3-->
		      		<form class="form-horizontal" name="form" method="post" action="" >
		      			<center>
		      				<h1 style="color:#d6d6d6;">Add Borrower</h1><br>
		      				<div class="col-sm-7 col-sm-offset-2">
		      					<div class="form-group">
		      						<label class="control-label col-sm-3" for="cname">Customer Name</label>
		      						<div class="col-sm-5">
			      						<input type="text" name="cname" id="name" placeholder="Enter Customer Name" required="required" class="form-control" autocomplete="off" style="text-transform: capitalize;">
									</div><!--col-sm-5 -->
		      					</div><!-- form - group-->
		      					<div class="form-group">
		      						<label class="control-label col-sm-3" for="cname">Vehicle No</label>
		      						<div class="col-sm-5">
			      						<input type="text" name="vno" placeholder="Enter Vehicle No" required="required" class="form-control" autocomplete="off" style="text-transform: uppercase;">
									</div><!--col-sm-5 -->
		      					</div><!-- form - group-->
		      					<div class="form-group">
		      						<label class="control-label col-sm-3" for="narration">Narration</label>
		      						<div class="col-sm-5">
		      							<input type="text" name="narration" required="required" class="form-control">
									</div><!--col-sm-5 -->
		      					</div><!-- form - group-->
		      					<div class="form-group">
		      						<label class="control-label col-sm-3" for="De">De.</label>
		      						<div class="col-sm-5">
			      						<input type="text" name="de" id="debut" placeholder="Enter Debut Amount" required="required" class="form-control" autocomplete="off">
									</div><!--col-sm-5 -->
		      					</div><!-- form - group-->
		      					<div class="form-group">
		      						<label class="control-label col-sm-3" for="Cr">Cr.</label>
		      						<div class="col-sm-5">
			      						<input type="text" name="credit" placeholder="Enter Credit Amount" id="cr" required="required" class="form-control" autocomplete="off">
									</div><!--col-sm-5 -->
		      					</div><!-- form - group-->
		      					<input type="submit" class="btn btn-md btn-info" name="save" id="submit" value="Save">
		      					<!-- <a href="search_borrower.php" class="btn btn-md btn-primary">Old Borrower</a> -->

		      				</div><!--col-sm-7-->
		      			</center>
		      		</form><!--form-->		
			    </div><!--row-->
			</div><!--Container fluid-->
		</body>
	</html>