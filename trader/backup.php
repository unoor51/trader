<?php 
require_once("connect.php");
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "noor.sql";
$backup_file = "oil_trader" . date("Y-m-d-H-i-s") . '.gz';

  echo $command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ". "oil_trader | gzip > $backup_file";
   
   system($command);
?>