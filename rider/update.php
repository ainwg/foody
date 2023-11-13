<?php
include 'database.php';
$id = $_GET['delivery_id'];
$sql = "SELECT * FROM `delivery` WHERE delivery_id='$id'";
$result = mysqli_query($conn, $sql) or die (mysqli_error());
$row = mysqli_fetch_array($result);

$riderid = $row['riderid'];
$orderlistid = $row['orderlistid'];
$delivery_location = $row['delivery_location'];
$delivery_status = $row['delivery_status'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foody</title>
    <style>
      tr {
        line-height: 40px;
      }
    </style>
  </head>
  <body>
    <form action="updatedbb.php?delivery_id=<?php echo $id; ?>" method="post">
      <table>
        <tr>
          <td>Rider Id:</td>
          <td><input type="text" name="riderid" value="<?php echo $riderid; ?>"/></td>
        </tr>
        <tr>
		<td>Orderlist id:</td>
		<td><input type="text" name="orderlistid" value="<?php echo $orderlistid; ?>"/></td>
        </tr>
        <tr>
		<td>Delivery location:</td>
		<td><input type="text" name="delivery_location" value="<?php echo $delivery_location; ?>"/></td>
        </tr>
        <tr>
		<td>Delivery Status:</td>
		<td><input type="text" name="delivery_status" value="<?php echo $delivery_status; ?>"/></td>
        </tr>
          
      </table>
        <input type="submit" value="Submit" />
    </form>
  </body>
</html>