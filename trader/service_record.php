<?php session_start(); 
if(!isset($_SESSION['uname'])){
  header("location:index.php");
}
 require_once("connect.php");?>
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
			<title>Add Service Record</title>
			
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
		<body>
			<div class="container-fluid">
			  	<div class="row content">
			    	<div class="col-sm-3 sidenav">
				      	<h4 style="text-align: center;color: red;font-family:tahoma;">
				      		M Yaseen and Abdul Rauf Son's Oil Traders
				      	</h4>
				     	<ul class="nav nav-pills nav-stacked">
					        <li><a href="home.php">Home</a></li>
					        <li><a href="add-items.php">Add items</a></li>
					        <li><a href="new-borrower.php">Borrowers</a></li>
					        <li class="active"><a href="service_record.php">Service Record</a></li>
					        <li><a href="viewSales.php">View Sales</a></li>
					        <li><a href="ledger.php">Borrower's Ledger</a></li>
					        <li><a href="log-out.php">Log Out</a></li>
					    </ul><br>
			      	</div><!-- col-sm-3-->
		      		<form method="post" action="">
		      			<center><h1 style="color:#d6d6d6;">SERVICE CARD</h1><br></center>
	      				<div class="col-sm-4 col-sm-offset-1">
	      					<div class="form-group" style="margin-top: 20px;">
	      						<label>Vehicle No:&nbsp;</label>
	      						<input type="tex" name="vno" class="form-control" placeholder="e.g leb 4545" required="required" autocomplete="off">
	      					</div>
		      				<div class="form-group">
		      					<label class="control-label">Date: </label>
		      					<input type="Date" name="Date" class="form-control" autocomplete="off" required="required">
		      				</div>
		      				<div class="form-group">
		      					<label>Select Things</label>
		      					<div class="checkbox">
    								<label><input type="checkbox" id="moil" name="check_list[]" value="Mobil Oil"> Mobil Oil</label>&nbsp;&nbsp;&nbsp;
    								<label><input type="checkbox" name="check_list[]" value="Coolant"> Coolant</label><br>
    								<label><input type="checkbox" name="check_list[]" value="Oil Filter"> Oil FIlter</label>&nbsp;&nbsp;&nbsp;
    								<label><input type="checkbox" name="check_list[]" value="Battery Water"> Battery Water</label><br>
    								<label><input type="checkbox" name="check_list[]" value="Air Filter"> Air FIlter</label>&nbsp;&nbsp;&nbsp;
    								<label><input type="checkbox" name="check_list[]" value="Gear Oil"> Gear Oil</label><br>
    								<label><input type="checkbox" name="check_list[]" value="A/C FIlter"> A/C Filter</label><br>
 								 </div>
		      				</div>
		      				<input type="submit" class="btn btn-md btn-primary" name="submit" value="Add Service Record">
		      				<a class="btn btn-md btn-info" href="search_service.php" >Search Service Record</a>
		      			</div>
		      			<div class="col-sm-4">
		      				<div class="form-group" style="margin-top: 20px;">
		      					<label class="control-label">Dissel Filter:</label>
		      					<input type="text" name="Dfilter" class="form-control" autocomplete="off" >
		      				</div>
		      				<div class="form-group">
		      					<label class="control-label">Dissel Filter Due:</label>
		      					<input type="text" name="Dfilterd" class="form-control" autocomplete="off" required="required">
		      				</div>
		      			</div>
		      		</form>		
			    </div><!--row-->
			</div><!--Container fluid-->
		</body>
	</html>
	<?php 
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {
		$vno 	 = mysqli_real_escape_string($connection,$_POST['vno']);
		$Dfilter = mysqli_real_escape_string($connection,$_POST['Dfilter']);
		$Dfilterd = mysqli_real_escape_string($connection,$_POST['Dfilterd']);
		$Date = mysqli_real_escape_string($connection,$_POST['Date']);
		$selected = "";	
			if(!empty($_POST['check_list'])){
				foreach ($_POST['check_list'] as $selected => $value) {
					# code...
				$query = "INSERT INTO service_record (vno,Dfilter,Dfdue,date1,things) 
				VALUES ('$vno','$Dfilter','$Dfilterd','$Date','$value')";
				mysqli_query($connection,$query);
				}

			}else {echo "Please Select atleast one option from Things";}
		}
	?>