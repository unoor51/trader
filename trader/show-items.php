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
			<title>Show Items</title>
			
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
			$i=0; 
			$query = "SELECT * FROM add_items";
			$result = mysqli_query($connection,$query);
			?>
			<div class="container-fluid">
			  	<div class="row content">
			    	<div class="col-sm-3 sidenav">
				      	<h4 style="text-align: center;color: red;font-family:tahoma;">M Yaseen and Abdul Rauf Son's Oil Traders</h4>
				     	<ul class="nav nav-pills nav-stacked">
					        <li><a href="home.php">Home</a></li>
					        <li class="active"><a href="add-items.php">Add Items</a></li>
					        <li><a href="new-borrower.php">Borrowers</a></li>
					        <li><a href="service_record.php">Service Rocord</a></li>
					        <li><a href="viewSales.php">View Sales</a></li>
					        <li><a href="ledger.php">Borrower's Ledger</a></li>
					        <li><a href="log-out.php">Log Out</a></li>
				      	</ul><br>
			      	</div>
			      	
				    <div class="col-sm-9">
					    <h1 style="text-align: center;color:">All Items</h1>
					    <table class="table table-bordered">
						    <thead>
						      <tr>
						        <th>Sr No </th>
						        <th>Item Name </th>
						        <th>Company Name</th>
						        <th>Stock</th>
						        <th>Prices </th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php while ($row = mysqli_fetch_array($result)) {?>
						    	<tr>
						    		<td><?php echo $i = $i +1; ?></td>
						    		<td><?php echo $row[2]; ?></td>
						    		<td><?php echo $row[3]; ?></td>
						    		<td><?php echo $row[4]; ?></td>
						    		<td><?php echo $row[5]."/".$row[6];?></td>
						    	</tr>
						    	<?php } ?>
						    </tbody>
						</table>
				  	</div>
				</div>
			</div>	
		</body>

	<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_blog&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:05:00 GMT -->
	</html>