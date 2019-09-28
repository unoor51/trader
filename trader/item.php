<?php 
session_start(); 
if(!isset($_SESSION['uname'])){
  header("location:index.php");
}
require_once("connect.php");
$item = $_POST['item'];
if($item != ""){
$query = "SELECT * FROM add_items WHERE item_id = $item ";
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_array($result);
echo $row[5]."/".$row[6];
}
?>