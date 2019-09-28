<?php
require_once("connect.php");
if(isset($_POST)){ 
 $ino =$_POST["ino"];
 $item = $_POST["item"];
 $quantity = $_POST["quantity"];
 $price = $_POST["price"];
 $total = $_POST["total"];
 $discount = $_POST["discount"];
 $balnce  = $_POST["balance"];
 $date = date("m-d-Y");?>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>i No</th>
        <th>items</th>
        <th>quantity</th>
        <th>price</th>
        <th>total</th>
        <th>discount</th>
        <th>Balance</th>
      </tr>
    </thead>
    <?php echo sizeof($item); ?>
    	<?php for($i=0; $i < sizeof($item); $i++) {?>
    	<!-- <tr>
    		<td><?php echo $ino; ?></td>
    		<td><?php echo $item[$i]; ?></td>
    		<td><?php echo $quantity[$i]; ?></td>
    		<td><?php echo $price[$i]; ?></td>
    		<td><?php echo $total[$i]; ?></td>
    		<td><?php echo $discount[$i]; ?></td>
    		<td><?php echo $balnce[$i]; ?></td>
    	</tr> -->
    	<?php }?>
</table>

 <?php // $query = "INSERT INTO items_entry (item,quantity,total,date1) 
 // 		   VALUES('$item',$quantity,$total,'$date') ";
 // 		   mysqli_query($connection,$query);
 // $items = "SELECT * FROM add_items WHERE item_name = '$item'";
 // $result = mysqli_query($connection,$items);
 // $row = mysqli_fetch_array($result);
 // $quan = $row[4];
 // $qua = $quantity - $quan;
 // $updateItems = "UPDATE add_items SET stock = $qua ";
 // $re = mysqli_query($connection,$updateItems);
}
?>