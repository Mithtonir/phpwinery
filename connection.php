<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$localhost = 'localhost';
 $root = 'root';
 $pass ='';
 $winery = 'wineryinz';
  
$con=mysqli_connect($localhost,$root,$pass,$winery);
if (mysqli_connect_errno()) {echo "Error connecting database";}
?>