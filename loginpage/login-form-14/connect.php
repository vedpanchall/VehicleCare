<?php
$con=new mysqli("localhost","root","","vehiclehealthcaredb");

if($con){
$msd = "connection is done";
}
else{
	die($con->error());
}



?>