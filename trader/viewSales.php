<?php 
session_start(); 
if(!isset($_SESSION['uname'])){
  header("location:index.php");
}  
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
			<title>View Sales</title>
			
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
			<?php 
				if(isset($_POST) & !empty($_POST) ) {
					
					}
			?>
			<div class="container-fluid">
			  	<div class="row content">
			    	<div class="col-sm-3 sidenav">
				      	<h4 style="text-align: center;color: red;font-family:tahoma;">M Yaseen and Abdul Rauf Son's Oil Traders</h4>
				     	<ul class="nav nav-pills nav-stacked">
					        <li><a href="home.php">Home</a></li>
					        <li><a href="add-items.php">Add Items</a></li>
					        <li><a href="new-borrower.php">Borrowers</a></li>
					        <li><a href="service_record.php">Service Rocord</a></li>
					        <li class="active"><a href="viewSales.php">View Sales</a></li>
					        <li><a href="ledger.php">Borrower's Ledger</a></li>
					        <li><a href="log-out.php">Log Out</a></li>
				      	</ul><br>
			      	</div>
			      	
				    <div class="col-sm-9">  
				      	<form class="form-horizontal" role="form" method="post" name="myForm" action="" >
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="From">From:</label>
						    	<div class="col-sm-5">
						     		<input class="form-control" type="date" name="from" required="required" />
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="to">To:</label>
						    	<div class="col-sm-5">
						     		<input type="date" class="form-control"  name="to" required="required">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<div class="col-sm-offset-2 col-sm-10">
						      		<button type="submit" name="submit" class="btn btn-primary btn-md">Search</button>
						    	</div>
						  	</div>
						</form>
					  
					  	<?php 
					  	if(isset($_POST) && !empty($_POST) ) {
					  		$from =  $_POST['from'];
					  		$to =  $_POST['to'];	
					  		$query = "SELECT * From itemsentry WHERE date1 >='".$from."' AND date1 <= '".$to."' order by date1";
						  		$result	= mysqli_query($connection,$query);?>	
						  		<table class="table table-bordered">
								    <thead>
							      		<tr>
							        		<th>Item Sold</th>
							        		<th>Qunatity</th>
							        		<th>Amount</th>
							        		<th>Date</th>
							      		</tr>
							    </thead>
							    <tbody>
								    	<?php 
								    	$total = 0; $profit = 0.0; $discount = 0; 
								    	while ($row = mysqli_fetch_array($result)) {?>
								    	<tr>
								    		<?php echo "<td>".$row[2]."</td>"; ?>
								    		<?php echo "<td>".$row[3]."</td>"; ?>
								    		<?php echo "<td>".$row[5]."</td>"; $total = $total + $row[5]; ?>
								    		<?php $discount = $discount + $row[7]; ?>
								    		<?php echo "<td>".$row[9]."</td>"; ?>
								    	</tr>
								    	<?php } ?>
								    	<tr>
								    		<td></td>
								    		<td></td>
								    		<td><?php  echo "<strong>Total = </strong>".$total;?></td>
								    		<td></td>
								    	</tr>
								</tbody>
							</table>
							<?php $profit = ($total *20)/100?>
							<strong>Profit On Amounts Total = </strong><?php echo $profit;?>&nbsp;&nbsp;<label>(Formula = (Total *20/100)</label>
							<?php } ?>
				  	</div><!--col-sm-9-->
				</div><!--row-->
			</div><!--Container fluid-->	
		</body>

	<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_blog&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:05:00 GMT -->
	</html>
