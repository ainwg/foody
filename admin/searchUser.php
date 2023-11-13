<?php include('server.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\bootstrap.css">
    <title>UMP FOODY</title>
    <a href="logOut.php" style="float:right">Log out</a>
  </head>
  <body>

  <style>
    .style1 {font-family: Verdana, Arial, Helvetica, sans-serif}

    .style3
    {font-family:Verdana, Arial, Helvetica, sans-serif;
      font-size: 12px;
        font-weight: bold;
    }

    .center
    {
        margin:auto;
        width: 500px;
        padding: 10px;
    }

    li
    {
        background-color: #3B9C9C; 
        padding: 12px; 
        border-radius: 10px;
        width: 120%;
        border-style: dotted;
        border-color: white;
    }
  </style>

  <header></header>

  <div id="main">

    <!-- content -->
    <article>
    <div class="center"> 
                <ol>
    <?php
// set the default time zone to use in Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');
?>
<div class="center">

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="searchName">
  <input type="submit">
</form> <br>

    <?php
        include("server.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nameSearch = htmlspecialchars($_REQUEST['searchName']);
        }
       
        $query_search = "SELECT * FROM userprofile WHERE name like '%$nameSearch%'";
        $result_search = mysqli_query($link,$query_search);
       
        
        if (mysqli_num_rows($result_search) > 0){
            while($row = mysqli_fetch_assoc($result_search)){
                $id = $row["id"];
                $name = $row["name"];
                $email = $row["email"];
                $address = $row["address"];
                $contactNum = $row["contactNum"];
            }
        } else {
            echo "0 results";
        
        }


    ?>
    <li>
    Name : <?php echo $name; ?><br>
	Email : <?php echo $email; ?><br>
    Address : <?php echo $address; ?><br>
	Contact Number : <?php echo $contactNum; ?><br>
    </li>
    </ol>
</div>
    </article>

<!-- sidebar -->
<nav class="sidebar">
  <img src="asset\foodylogo.png" width="125px"><br><br>
  <b><a href="adminhome.php">HOME</a></b><br>
  <b><a href="listuser.php">QR CODE</a></b><br>
  <b><a href="report.php">REPORT</a></b>
</nav>

</div>

<!-- <footer>Copyright &copy; 2022 UMP FOODY. All rights reserved</footer> -->

</body>
</html>