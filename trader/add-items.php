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
			<title>Add Items</title>
			
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
				var stock = document.forms["myForm"]["Stock"].value;
				var Iname = document.forms["myForm"]["Iname"].value;
				var Cname = document.forms["myForm"]["Cname"].value;
				var rcprice = document.forms["myForm"]["rcprice"].value;
				var ncprice = document.forms["myForm"]["ncprice"].value;
				if(isNaN(stock)){
					alert("Stock value should be a number");
					return false;
				}else
				if(isNaN(rcprice)){
					alert("price should be a number");
					return false;
				}else if(isNaN(ncprice)){
					alert("price should be a number");
					return false;
				}else if(!isNaN(Iname)){
					alert("Item Name should be a Text");
					return false;	
				}else if(!isNaN(Cname)){
					alert("Company Name should be a Text");
					return false;	
				}else{
					alert("Data inserted successfully");
					return true;
				}
			}
		</script>
		<body>
			<?php 
				if(isset($_POST) & !empty($_POST) ) {
					$iid   = mysqli_escape_string($connection,$_POST['iid']);
					$iname = mysqli_escape_string($connection,$_POST['iname']);
					$cname = mysqli_escape_string($connection,$_POST['cname']);
					$stock = mysqli_escape_string($connection,$_POST['stock']);
					$rcprice = mysqli_escape_string($connection,$_POST['rcprice']);
					$ncprice = mysqli_escape_string($connection,$_POST['ncprice']);
					$query = "INSERT INTO add_items(item_id,item_name,company_name,stock,pfrcustomer,pfncustomer) VALUES('$iid','$iname','$cname','$stock','$rcprice','$ncprice')";
					$re = "SELECT count(mid) FROM medicine";
					mysqli_query($connection,$query);
					}

					$re = "SELECT count(item_id) FROM add_items";
		    		$row = "SELECT MAX(item_id) FROM add_items";
		    		$wcode = mysqli_fetch_row(mysqli_query($connection,$row));
					//echo $wcode[0];
					$wcode = $wcode[0] + 1;
		    		$total = mysqli_fetch_row(mysqli_query($connection,$re));
					//echo $total[0];
					$total =$total[0]+1;
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
					    <h1 style="text-align: center;color:">Add Items</h1>
				      	<form class="form-horizontal" role="form" method="post" name="myForm" action="" onsubmit="return validateForm()">
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="item id">Item ID:</label>
						    	<div class="col-sm-5">
						    		
						     		<input class="form-control" disabled readonly type="text" value="<?php echo $total; ?>" required placeholder="Worker Code"/>
									<input class="form-control" readonly type="hidden" value="<?php echo $wcode; ?>" name="iid"/>
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="mname">Item Name:</label>
						    	<div class="col-sm-5">
						     		<input type="text" class="form-control" id="Iname" name="iname" placeholder="Enter Item Name" autocomplete="off" required="required">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="cname">Company Name:</label>
						    	<div class="col-sm-5">
						     		<input type="text" class="form-control" id="Cname" name="cname" placeholder="Enter Company Name" autocomplete="off" required="required">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="cname">Stock:</label>
						    	<div class="col-sm-5">
						     		<input type="text" class="form-control" id="Stock" name="stock" placeholder="Enter Stock in number form" autocomplete="off" required="required">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="stock">Price For Regular Customer:</label>
						    	<div class="col-sm-5">
						     		<input id="stock" type="text" class="form-control" id="rcprice" name="rcprice" placeholder="Enter Price For regular Customer" autocomplete="off" required="required">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="stock">Price For New Customer:</label>
						    	<div class="col-sm-5">
						     		<input id="stock" type="text" class="form-control" id="ncprice" name="ncprice" placeholder="Enter Price For new Customer" autocomplete="off" required="required">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<div class="col-sm-offset-2 col-sm-10">
						      		<button type="submit" class="btn btn-info btn-md" id="click">Add Item</button>
						      		<a href="del-items.php" class="btn btn-md btn-primary"> Delete Items</a>
						      		<a href="show-items.php" class="btn btn-md btn-warning"> Show all Items</a>
						    	</div>
						  	</div>
						</form>
					  
				  	</div>
				</div>
			</div>	
		</body>

	<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_blog&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:05:00 GMT -->
	</html>
