<?php 
require_once("connect.php");
	$id = $_GET['id'];
	$query = "DELETE FROM add_items WHERE item_id = $id ";
	$re = mysqli_query($connection,$query);
	if($re){
	header("location:del-items.php");
	 }
?>