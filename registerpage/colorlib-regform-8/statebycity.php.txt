<?php
require_once "connect.php";

$city_id = $_GET['city_id'];
if(empty($city_id))
{
	$state_id = $_GET["state_id"];

	   $result = mysqli_query($con,"SELECT * FROM city where State_ID	= $state_id");
	?>
	<option value="">Select city</option>
	<?php
	while($row = mysqli_fetch_array($result)) {
	?>
	<option value="<?php echo $row["City_ID"];?>"><?php echo $row["City_Name"];?></option>
	<?php
	}
}
else
{
	
		$result12 = mysqli_query($con,"SELECT * FROM vaccination_centre where Area_ID	= $city_id");
	?>
	<option value="">Select area </option>
	<?php
	
	while($row = mysqli_fetch_array($result12)) {
	?>
	<option value="<?php echo $row["ID"];?>"><?php echo $row["Centre_Name"];?></option>
	<?php
	}
}
?>

