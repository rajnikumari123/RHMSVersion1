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
<table bgcolor="grey" align="center">
	<tr>
		<td>
			<input type="radio" name="criteria" /> <input type="date" /> 
			<input type="radio" name="criteria" /> 
			<select>
				<option>Active</option>
				<option>Consumed</option>
			</select>
			<button>Filter</button>
		</td>
	</tr>
</table>

<br /><br />

<table align="center" border="2px" style="width:400px; line-height:20px; border-collapse: collapse;"  >
<!--<form   method="POST" action="DemoSubmit.php">-->
<tr>
<th colspan="30" id="design"><h3>Booking Details</h3></th>
</tr>
<tr>
 <th>BID</th>
 <th>GID</th>
 <th>Pos</th>
 <th>NoOfAdults</th>
 <th>NoOfChildren</th>
 <th>NoOfDay</th> 
 <th>Cindate</th>
 <th>Roomtype</th>
 <th>Roomrate</th>
 <th>Tax</th>
 <th>Total</th>
 </tr>
 <?php
 
  $sql="select * from tblbooking";
  $result=$con-> query ($sql);
  if($result->num_rows > 0){
	while($row =$result->fetch_assoc())
	  //while($row=mysqli_fetch_array($result))
	  {
		
		  echo "<tr>";
		   echo "<td>"; echo $row["bid"]; echo "</td>";
		  echo "<td>"; echo $row["gid"]; echo "</td>";
		 
		  echo "<td>"; echo $row["pos"]; echo "</td>";
		  echo "<td>"; echo $row["noofadults"]; echo "</td>";
		  echo "<td>"; echo $row["noofchild"]; echo "</td>";
		  echo "<td>"; echo $row["noofday"]; echo "</td>";
		  echo "<td>"; echo $row["cindate"]; echo "</td>";
		  echo "<td>"; echo $row["roomtype"]; echo "</td>";
		  echo "<td>"; echo $row["roomrate"]; echo "</td>";
		  echo "<td>"; echo $row["tax"]; echo "</td>";
		  echo "<td>"; echo $row["total"]; echo "</td>";
		  
		  echo "</tr>";
	  }
	  echo "</table>";
  }
?>
</body>
</html>