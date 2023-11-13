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
        padding: 20px;
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
                <!-- content of view user --> 
                <div class="center"> 
                <ol>
        <?php
        include("server.php");

        $query = "SELECT * FROM userprofile";
        $result = mysqli_query($link,$query);

        if (mysqli_num_rows($result) > 0){
            // output data of each row
            while($row = mysqli_fetch_assoc($result)){
            $id = $row["id"];
            $name = $row["name"];
            $email = $row["email"];
            $date = $row["date"];
            $time = $row["time"];
            $address = $row["address"];
            $contactNum = $row["contactNum"];
            ?>
            <li>
            Name : <?php echo $name; ?><br>
            Email : <?php echo $email; ?><br>
            Date / Time : <?php echo "$date / $time"; ?><br>
            Address : <?php echo $address; ?><br>
            Contact Number : <?php echo $contactNum; ?><br>
            Action : <a href="updateuser.php?id=<?php echo $id; ?>">Update</a> /  <a href="deleteUser.php?id=<?php echo $id; ?>">Delete</a><br>
            </li> <br>
            <?php
            }
        } else {
            echo "0 results";

        }
        ?>
        </ol>
        <div align="center">[ <a href="adminHome.php">Homepage</a> |
        <a href="createUser.php">Add</a> ] </div>

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