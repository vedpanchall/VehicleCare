<?php
require_once "connect.php";
if(isset ($_GET['City_ID'])){

    $city_id = $_GET['City_ID'];
}
if(empty($city_id))
{
	$state_id = $_GET["State_ID"];

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
	
		$result12 = mysqli_query($con,"SELECT * FROM state where City_ID	= $city_id");
	?>
	
	<?php
	
	while($row = mysqli_fetch_array($result12)) {
	?>
	
	<?php
	}
}
?>

