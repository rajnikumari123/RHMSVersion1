<?php
 $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
else{
	
}
?>
<html>
<head>


</head>
<body>
<body>
<br>
<form method="POST">
<h3> Search details by Booking_Id</h3><input align="center" type="text" name="bid"><input type="submit" name="search" value="search" >
</form><br><br>
<?php
if(isset($_POST["search"]))
  {
	  $res=mysqli_query($con,"select * from tblbooking where bid='$_POST[bid]'");
	 
	   echo "<table align=center; border=2px; style='width:1050px; line-height:20px; border-collapse:collapse;' >";
	  echo "<tr>";
	  echo "<th>"; echo "BID"; echo"</th>";
	  echo "<th>"; echo "GID"; echo"</th>";
	  echo "<th>"; echo ""; echo"</th>";
	  echo "<th>"; echo "Pofstay"; echo"</th>";
	  echo "<th>"; echo "Noofadults"; echo"</th>";
	  echo "<th>"; echo "Noofchildren"; echo"</th>";
	  echo "<th>"; echo "Noofdays"; echo"</th>";
	  echo "<th>"; echo "Cindate"; echo"</th>";
	  echo "<th>"; echo "Roomtype"; echo"</th>";
	  echo "<th>"; echo "Roomrate"; echo"</th>";
	  echo "<th>"; echo "Tax"; echo"</th>";
	  echo "<th>"; echo "Total"; echo"</th>";
	 
	  echo "</tr>";
	  
	  while($row=mysqli_fetch_array($res))
	  {
		  
		  echo "<tr>";
		  echo "<td>"; echo $row["bid"]; echo "</td>";
		  echo "<td>"; echo $row["gid"]; echo "</td>";
		   echo "<td> <a href ='guestdetails.php?GID=".$row["gid"]."'>Guestinfo </a></td>";
		  echo "<td>"; echo $row["pos"]; echo "</td>";
		  echo "<td>"; echo $row["noofadults"]; echo "</td>";
		  echo "<td>"; echo $row["noofchild"]; echo "</td>";
		  echo "<td>"; echo $row["noofday"]; echo "</td>";
		  echo "<td>"; echo $row["cindate"]; echo "</td>";
		  echo "<td>"; echo $row["roomtype"]; echo "</td>";
		  echo "<td>"; echo $row["roomrate"]; echo "</td>";
		  
		  echo "<td>"; echo $row["tax"]; echo "</td>";
		  echo "<td>"; echo $row["total"]; echo "</td>";
		  echo "<td> <a href ='editBookingRecord.php?BID=".$row["bid"]."'> edit </a></td>";
		  echo "<td> <a href=deleteBookingRecord.php?BID=".$row["bid"].">delete </a></td>";
		 
		  echo "</tr>";
	  }
	 echo "</table>";
  }
  ?>
   </body>
  </html>