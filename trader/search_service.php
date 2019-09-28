<?php 
require_once("connect.php");
?>
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
			<title>Search Service Record</title>
			
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
	      			<div class="col-sm-9">
	      				<form method="post" action="">
	      					<div class="form-group col-sm-5" style="margin-top: 20px;">
	      						<label>Vehicle No:&nbsp;</label>
	      						<input type="tex" name="vno" class="form-control" placeholder="e.g leb 4545" required="required" autocomplete="off"><br>
	      						<input type="submit" name="submit" value="Show Service Record" class="btn btn-md btn-primary">
	      					</div>
	      					<div class="container-fluid">
	      						<?php 
								if(isset($_POST['submit']) && !empty($_POST['submit'])) {
								$vno 	 = mysqli_real_escape_string($connection,$_POST['vno']);
								$query = "SELECT DISTINCT vno,Dfilter,Dfdue,date1,things FROM service_record WHERE vno = '$vno' ";
								$result = mysqli_query($connection,$query);?>
						  		<table class="table table-bordered">
								    <thead>
								      <tr>
								        <th>Vehicle No</th>
								        <th>Dissel Filter</th>
								        <th>Dissel FIlter Due</th>
								        <th>Date</th>
								        <th>Things Changed</th>
								      </tr>
								    </thead>
								    <tbody>
									    	<?php 
									    	while ($row = mysqli_fetch_array($result)) {?>
									    	<tr>
									    		<?php echo "<td>".$row['vno']."</td>"; ?>
									    		<?php echo "<td>".$row['Dfilter']."</td>"; ?>
									    		<?php echo "<td>".$row['Dfdue']."</td>"; ?>
									    		<?php echo "<td>".$row['date1']."</td>"; ?>
									    		<?php echo "<td>".$row['things']."</td>"; ?>
									    	</tr>
									    	<?php } ?>
									</tbody>
								</table>
								<?php } ?>
		      			</form>
		      		</div><!--col-sm-9-->	
			    </div><!--row-->
			</div><!--Container fluid-->
		</body>
	</html>