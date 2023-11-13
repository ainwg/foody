<?php 
include ('database.php');

?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Background.css">
<style>
    
</style>
</head>
<body>


<?php   include 'template.php' ?>

<table border="1" align="center" style="background : white" border="1" align="center" margin-bottom="20px">
            <td rowspan="5" width="160px" height= "70px" >
            <table style="background : white" border="1" align="center">
		<td>DELIVERY ID</td>
		<td>RIDER ID</td>
		<td>ORDER LIST ID</td>
		<td>DELIVERY LOCATION</td>
		<td>DELIVERY STATUS</td>
	</tr>
		<tbody>
 <?php 
$count=1;
$sel_query="Select * from delivery ORDER BY delivery_id desc;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["riderid"]; ?></td>
<td align="center"><?php echo $row["orderlistid"]; ?></td>
<td align="center"><?php echo $row["delivery_location"]; ?></td>
<td align="center"><?php echo $row["delivery_status"]; ?></td>

</tr>
<?php $count++; } 
?>
</tbody>
</table>