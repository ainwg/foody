<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="Background.css">


</head>
<style>

</style>

<body>
<?php include 'template.php' ?>
<br><br>
<table border="1" align="center">
<table border="1" align="center" style="background : white" border="1" align="center">
            <td rowspan="5" style="width: 160px;height: 100px;">
            <table style="background : white" border="1" align="center">
                <form align="center">
  <tr>  Hour : <input type="text" 
    id="hour" /><br></tr>
   <tr> Pay: <input type="text"
    id="pay" /><br></tr>
   <center> <input type="button" onClick="multiplyBy()" 
    Value="Multiply" /><br></center>
    <p>The Commission is : <br>
   <span id = "result"></span>
   <td align="center">Insert the data again</a></td> 
  </p>
  </form>
  
  
  <script>
    function multiplyBy()
    {
      num1 = document.getElementById(
        "hour").value;
      num2 = document.getElementById(
        "pay").value;
      document.getElementById(
        "result").innerHTML = num1 * num2;
    }
  </script>
    <form action="insertreport.php" method="post">
      <table>
          <td>day:</td>
          <td><input type="text" name="day" /></td>
        </tr>
        <tr>
          <td>result:</td>
          <td><input type="text" name="result" /></td>
        </tr>
      </table>
       <center> <input type="submit" value="Submit" onClick="alert('successfully submit')"/></center>
    </form>
    <div align="centre">
  
  </table>
</body>

</html>