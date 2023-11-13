
<!DOCTYPE html>
<?php 
   //make connection
$conn = mysqli_connect("localhost","root","","foody");

//check connection
if(!$conn){
    die('Connection Failed'. mysqli_connect_error());
}
session_start();
  mysqli_select_db($conn, "foody") or die(mysqli_connect_error());
    
    
  "CREATE TABLE menu (
    menuid VARCHAR(100) PRIMARY KEY,
    menuname VARCHAR(100) NOT NULL,
    menuprice float,
    menucategory VARCHAR(100) NOT NULL,
    menudesc VARCHAR(100) NOT NULL,
    menustatus VARCHAR(100) NOT NULL,
    menuphoto TEXT NOT NULL,
    );";

  "CREATE TABLE list (
      orderlistid INT PRIMARY KEY,
      orderquantity INT NOT NULL,
      menuid VARCHAR(100) NOT NULL,
      orderlistdate DATE NOT NULL,
      orderstate VARCHAR(100) NOT NULL,
      FOREIGN KEY (menuid) REFERENCES menu(menuid)
      );";
      
      "CREATE TABLE restaurant (
        restid VARCHAR(100) PRIMARY KEY,
        restname VARCHAR(100) NOT NULL,     
        restlocation VARCHAR(100) NOT NULL,
        restoperation VARCHAR(100) NOT NULL,
        restphone VARCHAR(100) NOT NULL,
        );";

  $is= "INSERT INTO 'restaurant'('restid', 'restname', 'restlocation', 'restoperation', 'restphone') VALUES ('RS001','Foody Restaurant','Universiti Malaysia Pahang, Lebuhraya Tun Razak, 26300 Kuantan, Pahang ','Operation time: 11.00a.m to 10p.m ','012-3456789')";
  mysqli_query($conn, $is);
  
  echo "New records created successfully";
    $id =['MN001','MN002','MN003','MN004','MN005','MN006','MN007','MN008','MN009','MN010'];
    $name =['Hawaii Chicken','Fried Chicken(1pcs)','Beef Steak','Filet U Fish','Ice Lemon Tea','Iced Coffee','Matcha','Macaron(3pcs)','Chocalate Cake','Swiss Roll(2pcs)'];
    $pr =['6','3.5','15','5','2','2.50','3.5','5','5','4'];
    $ct =['Food','Food','Food','Food','Drink','Drink','Drink','Dessert','Dessert','Dessert'];
    $ds =['Pizza with pineapple, chicken','Fried Chicken that fry with special recipe','Recommendation from Chef','Similar with MCD but not~','Lemon Tea that make with real lemon','Fresh~','Matcha with milk','Sweet dessert','Cake with chocalate with cream','Swiss Roll with any flavour'];
    $st =['Available','Available','Available','Available','Available','Available','Available','Available','Available','Available'];
    $img = ['a.jpg','b.jpg','c.jpg','d.jpg','e.jpg','f.jpg','g.jpg','h.jpg','i.jpg','j.jpg'];


    for($a=0;$a <10;$a++){
        
        $sqlimage = "INSERT INTO menu(menuid, menuname, menuprice, menucategory, menudesc, menustatus, menuphoto) 
				        VALUES('$id[$a]','$name[$a]','$pr[$a]','$ct[$a]','$ds[$a]','$st[$a]','$img[$a]')";
				mysqli_query($conn, $sqlimage);
                
		
    }

    $ordt = ['2022-6-13','2022-6-13','2022-6-13','2022-6-14','2022-6-14','2022-6-14','2022-6-15','2022-6-15','2022-6-15','2022-6-15'];
    $orderid = ['MN001','MN005','MN008','MN002','MN006','MN009','MN003','MN004','MN007','MN010'];
    $qty = ['2','5','6','2','3','2','3','1','2','3'];
    $orderstate =['Delivered','Delivered','Delivered','Delivered','Delivered','Delivered','Delivered','Delivered','Delivered','Delivered'];

    for($a=0;$a <10;$a++){
      $dateorder=date('Y-m-d', strtotime($ordt[$a]));

      $sqliinsert = "INSERT INTO list(list_date, list_quantity, menuid, list_state) 
				        VALUES('$dateorder','$qty[$a]','$orderid[$a]','$orderstate[$a]')";
	    mysqli_query($conn, $sqliinsert);
    }
    ?>
    
	
	
	
			
			

			

				
				
			

?>