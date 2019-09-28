<?php 
// session_start(); 
// if(!isset($_SESSION['uname'])){
//  header("location:index.php");
// }
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
			<title>Update Items</title>
			
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
			function validateForm(){
				var stock = document.forms["myForm"]["stock"].value;
				var price = document.forms["myForm"]["price"].value;
				if(isNaN(stock)){
					alert("Stock value should be a number");
					return false;
				}
				if(isNaN(price)){
					alert("price value should be a number");
					return false;
				}
				if(!isNaN(stock) & !isNaN(price) ){
					alert("Data updated successfully");
					return true;
				}

			}
		</script>		
		<body>
			<?php 
			$id = mysqli_escape_string($connection,$_GET['id']); 
			$query = "SELECT * FROM add_items Where item_id = '$id' ";
			$result = mysqli_query($connection,$query);
			$row = mysqli_fetch_array($result);
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
			      	<?php 
						if(isset($_POST) & !empty($_POST) ) {
							$mid   = $_POST['mid'];
							$mname = $_POST['mname'];
							$cname = $_POST['cname'];
							$stock = $_POST['stock'];
							$price = $_POST['price'];
							$nprice = $_POST['nprice'];
							$query = "UPDATE add_items SET item_name = '$mname' , company_name = '$cname', stock = '$stock', pfrcustomer='$price', pfncustomer = '$nprice'
							WHERE item_id = '$id' ";
							$re = mysqli_query($connection,$query);
						}
					?>
				    <div class="col-sm-9">
					    <form class="form-horizontal" role="form" method="post" name="myForm" action="" onsubmit="return validateForm()">
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="mid">Item ID:</label>
						    	<div class="col-sm-5">
						    		<input class="form-control" disabled readonly type="text" value="<?php echo $row[1]; ?>" required placeholder="Item Id"/>
						    		<input class="form-control" type="hidden" value="<?php echo $row[1]; ?>" name="mid"/>
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="mname">Item Name:</label>
						    	<div class="col-sm-5">
						     		<input type="text" class="form-control"  name="mname" placeholder="Item Name" value="<?php echo $row[2]; ?>" autocomplete="off" required="required">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="cname">Company Name:</label>
						    	<div class="col-sm-5">
						     		<input type="text" class="form-control" name="cname" placeholder="Company Name" autocomplete="off" required="required" value="<?php echo $row[3]; ?>">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="stock">Stock:</label>
						    	<div class="col-sm-5">
						     		<input type="text" class="form-control" name="stock" placeholder="Stock" autocomplete="off" required="required" value="<?php echo $row[4]; ?>">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="price">Price For Regular Customer:</label>
						    	<div class="col-sm-5">
						     		<input type="text" class="form-control" name="price" placeholder="price regular customer" autocomplete="off" required="required" value="<?php echo $row[5]; ?>">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="price">Price For New Customer:</label>
						    	<div class="col-sm-5">
						     		<input type="text" class="form-control" name="nprice" placeholder="price for new customer" autocomplete="off" required="required" value="<?php echo $row[6]; ?>">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<div class="col-sm-offset-2 col-sm-10">
						      		<button type="submit" class="btn btn-success">Update</button>
						      		<a href="add-items.php" class="btn btn-info">Back</a>
						    	</div>
						  	</div> 	
						</form>
				  	</div>
				</div>
			</div>	
		</body>

	<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_blog&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:05:00 GMT -->
	</html>