<?php 
session_start(); 
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
			<title>Print Preview</title>
			
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
			<style type="text/css" media="print">
			    @page 
			    {
			    size: 0;
  				margin: 0;   
			    }

			    html
			    {
			        background-color: #FFFFFF; 
			        margin: 0px;  /* this affects the margin on the html before sending to printer */
			        border: 1px solid black;
			    }

			    body
			    {
			        margin: 0mm; /* margin you want for the content */
			    }
		    </style>
		    <style type="text/css">
		    	.copyright{
		    		text-align: center;
		    	}
		    </style>
		</head>
		<body>
			<?php 
			$id = mysqli_escape_string($connection,$_GET['id']);
			$query = "SELECT * FROM itemsentry WHere invoice_id = $id";
			$result = mysqli_query($connection,$query);
			$query1 = "SELECT * FROM itemsentry WHere invoice_id = $id";
			$result1 = mysqli_query($connection,$query);
			$useResult = mysqli_fetch_array($result1);
			$bill = "SELECT DISTINCT invoice_id FROM itemsentry WHere invoice_id = $id";
			$bill_result = mysqli_query($connection,$bill);
			$bill_row = mysqli_fetch_array($bill_result);
			?>
			<div class="container">
				<div class="row">
					<h4 style="text-align: center;color: red;font-family:tahoma;">
				      		M Yaseen and Abdul Rauf Son's Oil Traders
				    </h4>
				    <div class="col-sm-4 col-sm-offset-2">
				    	<h5>Date : <?php echo date("d-m-Y");?></h5>
				    </div>
				    <div class="col-sm-6">
				    	<h5>Time : <?php echo date("h:i:sa");?></h5>
				    </div>
				</div>
			  	<div class="row">
			  		<div class="col-sm-10 col-sm-offset-2">
			  			<table class="table table-bordered">
						    <thead>
						      <tr>
						        <th>Bill No</th>
						        <th>Items </th>
						        <th>Quantity</th>
						        <th>Price</th>
						        <th>Amount</th>
						        <th>Discount</th>
						        <th>Balance</th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php while($row = mysqli_fetch_array($result)){ ?>
						        	<tr>
						        	<td><?php echo $bill_row['invoice_id'];?></td>
						        	 	<td><?php echo $row[2];?></td>
						        	 	<td><?php echo $row[3];?></td>
						        	 	<td><?php echo $row[4];?></td>
						        	 	<td><?php echo $row[5];?></td>
						        	 	<td><?php echo $row[6];?></td>
						        	 	<td><?php echo $row[7];?></td>
						      
						        	</tr>
					        	<?php } ?>
					        	
						    </tbody>
						</table> 
						<h3 style="color:#eee;text-align:center; ">Thank You For Visiting Us</h3>
						<div class="copyright">
							<kbd>Software Developer: Noor Ullah Usmani</kbd><br>
							<kbd>Contact: +923477701070</kbd>
						</div>
						<input type ="submit" class="btn btn-primary printbtn" style="margin-left: 25px" onclick="myFunction()" value="Print">
						<script type="text/javascript"> 
							function myFunction() { 
					    	window.open("home.php", "_self");
					    	window.print();
					    	}</script>
		      		</div><!--col-sm-10-->	
			    </div><!--row-->
			</div><!--Container fluid-->
		</body>
	</html>