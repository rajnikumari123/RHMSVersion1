<?php
 $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
else{
	
}
?>

<html>
<body>
<br>
<form method="POST">
<h3> Search details by Checkin_Details</h3><input align="center" type="text" name="tid"><input type="submit" name="search" value="search" >
</form><br><br>
<?php
if(isset($_POST["search"]))
  {
	  $res=mysqli_query($con,"select * from tblcheckout where tid='$_POST[tid]'");
	  echo "<table align=center; border=2px; style='width:1050px; line-height:20px; border-collapse:collapse;' >";
	  echo "<tr>";
	  echo "<th>"; echo "TID"; echo"</th>";
	   echo "<th>"; echo ""; echo"</th>";
	  echo "<th>"; echo "Coutdate"; echo"</th>";
	 
	  echo "<th>"; echo "Nettotal"; echo"</th>";
	  echo "<th>"; echo "Amountpaid"; echo"</th>";
	  echo "<th>"; echo "paymentmode"; echo"</th>";
	  
	  echo "</tr>";
	  
	  while($row=mysqli_fetch_array($res))
	  {
		  echo "<tr>";
		  echo "<td>"; echo $row["tid"]; echo "</td>";
		   echo "<td> <a href ='checkinDetails.php?TID=".$row["tid"]."'>Checkininfo </a></td>";
		  echo "<td>"; echo $row["coutdate"]; echo "</td>";
		  
		  echo "<td>"; echo $row["nettotal"]; echo "</td>";
		  echo "<td>"; echo $row["amountpaid"]; echo "</td>";
		  echo "<td>"; echo $row["amountrefund"]; echo "</td>";
		  echo "<td>"; echo $row["paymentmode"]; echo "</td>";
		  
		  echo "<td> <a href ='editCheckoutRecord.php?TID=".$row["tid"]."'> edit </a></td>";
		  echo "<td> <a href=deleteCheckoutDetails.php?TID=".$row["tid"].">delete </a></td>";
		 
		 
		  echo "</tr>";
	  }
	 echo "</table>";
  }
  ?>
  </body>
  </html>