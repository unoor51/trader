<?php session_start(); 
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
			<title> Home </title>
			
			<!--bootstrap core css-->
			<link href="assests/css/bootstrap.min.css"  rel="stylesheet"/>
			
			<!--font awesome icon-->
			<link href="assests/css/font-awesome/css/font-awesome.min"
			rel="stylesheet"/>
			
			<!--custom css-->
			<link href="assests/css/custom.css" rel="stylesheet" />
			<script src="assests/js/jquery-3.0.0.min.js"></script>
			<script type="text/javascript">
		
			</script>
			<!--google fonts-->
			<link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css' />
			<!--afont awsome-->
			<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
			
		</head>
		<body>
				<?php if(isset($_POST['Save']) && !empty($_POST['Save']) ) {
							 $invoice_id = $_POST['ino'];
							 $stock = $_POST['stok'];
							 $items	= $_POST['item'];
							 $quantity	= $_POST['quan'];
							 $price	= $_POST['price'];
							 $amount	= $_POST['amount'];
							 $Tamount = $_POST['Total'];
							 $Discount = $_POST['discount'];
							 $Balance = $_POST['balance'];
							 $date = date('Y-m-d');
							 if($Discount == ""){
							 	$Discount = 0;
							 }
							 for($i = 0; $i < count($items); $i++){
				     	     $Query = "INSERT INTO itemsentry (invoice_id,item_name,quantity,price,Amount,Tamount,discount,balance,date1) 
							 	VALUES($invoice_id,'$items[$i]',$quantity[$i],$price[$i],$amount[$i],$Tamount,$Discount,$Balance,'$date')";
							 	mysqli_query($connection,$Query);
							 	$update = "UPDATE add_items SET stock = stock - $quantity[$i] Where item_id = $stock[$i]";
							 	mysqli_query($connection,$update);
							 	}
							 }	
							$query = "SELECT * FROM add_items order by item_name";
							$result = mysqli_query($connection,$query);
				    		$row = "SELECT MAX(invoice_id) FROM itemsentry";
				    		$wcode = mysqli_fetch_row(mysqli_query($connection,$row));
							//echo $wcode[0];
							$wcode = $wcode[0] + 1;
			?>
			<div class="container-fluid" id="container">
			  	<div class="row content">
			    	<div class="col-sm-3 sidenav">
				      	<h4 style="text-align: center;color: red;font-family:tahoma;">
							M Yaseen and Abdul Rauf Son's Oil Traders
				      	</h4>
				     	<ul class="nav nav-pills nav-stacked">
					        <li class="active"><a href="home.php">Home</a></li>
					        <li><a href="add-items.php">Add Items</a></li>
					        <li><a href="new-borrower.php">Borrowers</a></li>
					        <li><a href="service_record.php">Service Record</a></li>
					        <li><a href="viewSales.php">View Sales</a></li>
					        <li><a href="ledger.php">Borrower's Ledger</a></li>
					        <li><a href="log-out.php">Log Out</a></li>
				      	</ul><br>
			      	</div>

				    <div class="col-sm-9">
				    	<form class="form-horizontal" role="form" method="post" action="">
			      			<center>
			      				<div class="col-sm-7 col-sm-offset-2">
			      					<div class="form-group">
			      						<label class="control-label col-sm-3" for="iname">Invoice No:</label>
			      						<div class="col-sm-5">
			      							<input class="form-control" disabled readonly type="text" value="<?php echo $wcode; ?>" required/>
						    				<input class="form-control" type="hidden" value="<?php echo $wcode; ?>" id="Invoice" name="ino"/>
				      					</div>	
			      					</div><!-- form - group-->
			      					<div class="form-group">
			      						<label class="control-label col-sm-3" for="iname">Select Item</label>
			      						<div class="col-sm-5">
				      						<select name="items" class="form-control" id="item">
				      							<?php while($row = mysqli_fetch_array($result)) {?>
				      							<option VALUE="<?php echo $row['item_id'] ?>"><?php echo $row['item_name'];?></option>
				      							<?php } ?>
				      						</select>
										</div><!--col-sm-5 -->
										<div id="pr" style="height: 33px;width:100px;border:1px solid black;float: right">
										 </div>
			      					</div><!-- form - group-->
			      					<div class="form-group">
			      						<label class="control-label col-sm-3" for="quantity">Quantity</label>
			      						<div class="col-sm-5">
				      						<input type="text" name="quantity" id="quan" placeholder="Enter Quantity e.g 1,2,3" required="required" class="form-control" autocomplete="off">
										</div><!--col-sm-5 -->
			      					</div><!-- form - group-->
			      					<div class="form-group">
			      						<label class="control-label col-sm-3" for="price">Price</label>
			      						<div class="col-sm-5">
				      						<input type="text" name="price" id="pri" placeholder="Enter Price" required="required" class="form-control" autocomplete="off">
										</div><!--col-sm-5 -->
			      					</div><!-- form - group-->
			      					<div class="form-group">
			      						<label class="control-label col-sm-3" for="price">Present Stock</label>
			      						<div class="col-sm-5">
				      						<input type="text" id="pstock" value="" readonly="ready" class="form-control" >
										</div><!--col-sm-5 -->
			      					</div><!-- form - group-->
			      					<input type="hidden" name="stock" id="Stock">
			      					<input type="button" name="submit" id="add" class="btn btn-primary btn-lg" value="Add">
					  			</div>	
					  		</center>	
				  		
					  		<div class="container-fluid">
						  		<table class="table table-bordered">
								    <thead>
								      <tr>
								        <th>Sr No</th>
								        <th>Item Name</th>
								        <th>Quantiy</th>
								        <th>Price</th>
								        <th>Amount</th>
								      </tr>
								    </thead>
								    <script type="text/javascript">
								    	function calcPrice(){
								    		sum = 0;
								    		$('input[name="amount[]"').each(function(){
								    			sum = sum + parseInt($(this).val());
								    		});
								    		discount = Math.abs($("#Discount").val());
								    		if(discount == "" || discount == undefined || isNaN(discount)){
								    			discount = 0;
								    		}
								    		$("#totalAmount").val(sum);
								    		$('#Balance').val(sum - discount);
								    	}
								    	$(document).ready(function(){
								    		var Total= 0;
								    		var i = 1; 
								    		$("#add").click(function(){
								    			if(isNaN($("#quan").val()) ){
													alert("Quantiy value should be a number");
													return false;
												}
												if(isNaN($("#pri").val())){
													alert("Price value should be a number");
													return false;
												}
												
												if($("#pstock").val() != '0' && parseInt($("#pstock").val()) >= parseInt($("#quan").val()) ){
													if ($("#quan").val() != "" && $("#pri").val() !="" ){
										    			$("#tbody").append("<tr class='Drow' id='sr'><td>"+ i++ +"</td><input name='stok[]' type='hidden' readonly='readonly' value='"+$("#Stock").val()+"'/><td><input name='item[]' readonly='readonly' value='"+$("#item option:selected").text()+"'/></td><td><input name='quan[]' readonly='readonly' value='"+$("#quan").val()+"'/></td><td><input name='price[]' readonly='readonly' value='"+$("#pri").val()+"'/></td><td><input name='amount[]' readonly='readonly' value='"+$("#quan").val()*$("#pri").val()+"'/></td><td><button type='button' class='btn btn-md btn-danger' id='Cancel' onclick='$(this).parent().parent().remove();calcPrice();'>Cancel</button></td></tr>");
										    				calcPrice();
										    			}else{
										    				alert("Pleasr Fill out the field for adding rows");
										    		}
									    		}else{
									    			alert("Stock not available");
									    		}
								    		});

								    		$("#Discount").keypress(function(){
								    			// var Balance = Total - $("#Discount").val();
								    			// $("#Balance").val(Balance);
								    			calcPrice();

								    		});

								    		$("#item").click(function(){
								    			$.post("item.php", {
								    				item : $("#item").val()
							                  	}, function(response){
												$('#pr').html(unescape("Price "+response));
												    $('#Stock').val($('#item').val());
							                  	});
								    		});
								    		$("#item").click(function(){
								    			$.post("stock.php", {
								    				item : $("#item").val()
							                  	}, function(response){
												document.getElementById("pstock").value = response;
							                  	});
								    		});
								    		$("#Save").click(function(){
								    			$.post("ajax.php", {
								    				ino : $("#Invoice").val(),
								    				item : $("#item").val(),
								    				quantity : $("#quan").val(),
						     						price : $("#pri").val(),
						     						total : $("#total").val(),
						     						discount : $("#discount").val(),
						     						balance : $("#balance").val()
							                  	}, function(response){
												$('#div').html(unescape("Price "+response));
							                  	});
								    		});

								    	});
								    </script>
								    <tbody id="tbody">
								    </tbody>
								</table>
							
								<div class="form-group">
									<label class="control-label" for="total">Total Amount</label>
									<input type="text" name="Total" id="totalAmount" readonly="readonly" class="form-control">
								</div>
								<div class="form-group">
									<label class="control-label" for="Discount">Discount</label>
									<input type="text" name="discount" id="Discount" class="form-control" autocomplete="off">
								</div>
								<div class="form-group">
									<label class="control-label" for="Balance">Balance</label>
									<input type="text" name="balance" id="Balance" readonly="readonly" class="form-control">
								</div>
								<input type="submit" name="Save" value="Save" class="btn btn-primary btn-md">
								<?php if(isset($_POST['Save']) AND $_POST['Save'] == "Save"): ?>
									<a href="printPage.php?id=<?php echo $invoice_id; ?>" class="btn btn-primary btn-md">Print Preview</a>
								<?php endif; ?>
								<div id="div"></div><br>
							</div>
				  		</form>
				  	</div><!--col-sm-9-->	
				</div><!--row-->
			</div>
		</body>

	<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_blog&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:05:00 GMT -->
	</html>