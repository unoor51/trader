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
			<title>Borrowers Ledger</title>
			
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
					alert("Name Should be text");
					return false;
				}
			});
		});
		</script>
		<body>
			<div class="container-fluid">
			  	<div class="row content">
			    	<div class="col-sm-3 sidenav">
				      	<h4 style="text-align: center;color: red;font-family:tahoma;">
				      		M Yaseen and Abdul Rauf Son's Oil Traders
				      	</h4>
				     	<ul class="nav nav-pills nav-stacked">
					        <li><a href="home.php">Home</a></li>
					        <li><a href="add-items.php">Add Items</a></li>
					        <li><a href="new-borrower.php">Borrowers</a></li>
					        <li><a href="service_record.php">Service Record</a></li>
					        <li><a href="viewSales.php">View Sales</a></li>
					        <li class="active"><a href="ledger.php">Borrower's Ledger</a></li>
					        <li><a href="log-out.php">Log Out</a></li>
				      	</ul><br>
			      	</div><!-- col-sm-3-->
		      		<div class="col-sm-9 ">
		      			<center>
		      				<h1 style="color:#d6d6d6;">Ledger</h1><br>
		      				<form class="form-horizontal" name="form" method="post" action="" >
		      					<div class="form-group">
		      						<label class="control-label col-sm-3" for="cname">Customer Name</label>
		      						<div class="col-sm-5">
			      						<input type="text" name="cname" id="name" placeholder="Enter Customer Name in small letters" required="required" class="form-control" autocomplete="off">
									</div><!--col-sm-5 -->
		      					</div><!-- form - group-->
		      					<div class="form-group">
		      						<label class="control-label col-sm-3" for="cname">Vehicle No</label>
		      						<div class="col-sm-5">
			      						<input type="text" name="vno" placeholder="Enter Vehicle No" required="required" class="form-control" autocomplete="off">
									</div><!--col-sm-5 -->
		      					</div><!-- form - group-->
		      					<input type="submit" class="btn btn-md btn-info" name="save" id="submit" value="Search">
		      				</form><!--form-->
		      			</center>
		      					<?php 
								if(isset($_POST) & !empty($_POST) ) {
								$cname = mysqli_real_escape_string($connection,$_POST['cname']);
								$vno = mysqli_real_escape_string($connection,$_POST['vno']);

								$borrower = "SELECT * FROM accounts WHERE vno = '$vno' ";
								$bResult = mysqli_query($connection,$borrower);
								if($bResult){?>
								<br>
								<table class="table table-bordered">
							    	<thead>
								    	<tr>
								      		<th>Sr No</th>
								        	<th>Customer Name </th>
								        	<th>Vehicle No </th>
								        	<th>Narration</th>
								        	<th>Debut </th>
								        	<th>Credit </th>
								      	</tr>
							    	</thead> 
							    	<tbody>
						    			<?php
						    			$i = 1; $Tde = 0; $Tcr = 0;
						    			while ($row = mysqli_fetch_array($bResult)) {?>
						    				<tr>
						    					<td><?php echo $i++; ?></td>
						    					<td><?php echo $row[1]; ?></td>
						    					<td><?php echo $row[2]; ?></td>
						    					<td><?php echo $row[3]; ?></td>
						    					<td><?php echo $row[4]; ?></td>
						    					<td><?php echo $row[5]; ?></td>
						    					<?php 
						    						$Tde  = $Tde + $row[4];
						    						$Tcr = $Tcr + $row[5];
						    					 ?>
						    				</tr>	
						    			<?php }
						    			?>
						    			<tr>
					    					<td></td>
					    					<td></td>
					    					<td></td>
					    					<td></td>
					    					<td><?php echo "<strong>Total Debut = </strong> ".$Tde; ?></td>
					    					<td><?php echo "<strong>Total Credit = </strong> ".$Tcr; ?></td>
					    				</tr>
							    	</tbody>	
								</table>
								<?php }
							}?>	
		      		</div><!--col-sm-9-->		
			    </div><!--row-->
			</div><!--Container fluid-->
		</body>
	</html>