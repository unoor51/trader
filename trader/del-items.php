<?php 
session_start(); 
if(!isset($_SESSION['uname'])){
  header("location:index.php");
}  
 require_once("connect.php");
 $msg = "";
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
			<title>Delete Items</title>
			
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
				var rcprice = document.forms["myForm"]["rcprice"].value;
				var ncprice = document.forms["myForm"]["ncprice"].value;
				if(isNaN(stock)){
					alert("Stock value should be a number");
					return false;
				}
				if(isNaN(rcprice)){
					alert("price should be a number");
					return false;
				}
				if(isNaN(ncprice)){
					alert("price should be a number");
					return false;
				}
				if(!isNaN(stock) & !isNaN(rcprice) & !isNaN(ncprice) ){
					alert("Data inserted successfully");
					return true;
				}

			}
		</script>
		<body>
			<?php 
				if(isset($_POST) & !empty($_POST) ) {
			}		
			$items = "SELECT DISTINCT item_name FROM add_items";
			$result = mysqli_query($connection,$items);
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
					    <h1 style="text-align: center;color:">Delete Items</h1>
				      	<form class="form-horizontal" role="form" method="post" name="myForm" action="" onsubmit="return validateForm()">
						  	<div class="form-group">
						    	<label class="control-label col-sm-2" for="stock">Select Item:</label>
						    	<div class="col-sm-5">
						     		<select class="form-control" name="items">
						     			<option>Select Items</option>
						     			<?php while($row = mysqli_fetch_array($result)){ ?>
						     			<option>
						     				<?php echo $row['item_name']; ?>	
						     			</option>
						     			<?php } ?>
						     		</select>
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<div class="col-sm-offset-2 col-sm-10">
						      		<button type="submit" class="btn btn-info btn-md" id="click">Search</button>
						    	</div>
						  	</div>
						</form>
						<?php 
							if(isset($_POST) & !empty($_POST)) {
								$items = $_POST['items'];
								if($items != "Select Items"){
									$query = "SELECT * FROM add_items WHERE item_name = '$items'";
									$queryResult = mysqli_query($connection,$query);?>
									<table class="table table-bordered">
									    <thead>
									      <tr>
									        <th>Item Id</th>
									        <th>Item Name </th>
									        <th>Company Name </th>
									        <th>Stock </th>
									        <th>Price For R.C</th>
									        <th>Price For N.C</th>
									      </tr>
									    </thead> 
								    <tbody>
								    	<?php while($row = mysqli_fetch_array($queryResult)){ ?>
								        	 <tr>
								        	 	<td><?php echo $row[1]?></td>
								        	 	<td><?php echo $row[2]?></td>
								        	 	<td><?php echo $row[3]?></td>
								        	 	<td><?php echo $row[4]?></td>
								        	 	<td><?php echo $row[5]?></td>
								        	 	<td><?php echo $row[6]?></td>
								        	 	<td><a class="btn btn-danger btn-md" href="delete.php?id=<?php echo  $row[1];?>" > Delete</a></td>
								        	 	<td><a class="btn btn-warning btn-md" href="update-items.php?id=<?php echo  $row[1];?>" > Update</a></td>
								        	</tr>
							        	<?php } ?>
							    	</tbody>
								</table>
								<?php }else{
									echo $msg .= "<h3 class='text-danger'>Please select the items</h3>";
								}
							}
						?>
				  	</div>
				</div>
			</div>	
		</body>

	<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_blog&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:05:00 GMT -->
	</html>
