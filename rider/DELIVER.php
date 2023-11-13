<?php 
include ('database.php');

?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Background.css">

</head>
<body>
      <div>
      <table border="1" align="center">
        <tr>
	 <?php include 'template.php' ?>
       <table border="1" align="center" style="background : white" border="1" align="center">
            <td rowspan="5" style="width: 160px;height: 100px;">
            <table style="background : white" border="1" align="center">
		<td>DELIVERY ID</td>
		<td>RIDER ID</td>
		<td>ORDER LIST ID</td>
		<td>DELIVERY LOCATION</td>
		<td>DELIVERY STATUS</td>
    <td>OPERATION</td>
    <td>OPERATION</td>

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
<td align="center"><a href="update.php?delivery_id=<?php echo $row["delivery_id"]; ?>">Update</a></td> 
<td align="center"><a href="delete.php?delivery_id=<?php echo $row["delivery_id"]; ?>" onClick="alert('Order Cancelled &#9989')">Cancel Order</a></td> 

</tr>
<?php $count++; } 
?>

</table>
<center><a href="QRCode.php"><button type="button" onClick="alert('Press button OK &#9989')">Pickup Order</button></a>
</center>

                  </tbody>
</div>
	  	      <div class="footer">
      <p>Copyright &copy; 2022 UMP FOODY. All rights reserved.</p>
    </div>
</body>
</html>