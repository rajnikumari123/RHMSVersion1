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
<br><br>
<table align="center" border="2px" style="width:900px; line-height:20px; border-collapse: collapse;"  >

<tr>
<th colspan="30" id="design"><h3>Checkin Details</h3></th>
</tr>
<tr>
 <th>TID</th>
 <th>Bid</th>
 <th>Check_in_date</th>
 <th>Gid</th>
 <th>Roomno</th>
 <th>Vehicle_model</th> 
 <th>Vehicle-number</th>
 <th>Vehicle_Type</th>
 <th>Advance_Payment</th>
 
 </tr>
 <?php
 
  $sql="select * from tblcheckin";
  $result=$con-> query ($sql);
  if($result->num_rows > 0){
	while($row =$result->fetch_assoc())
	  //while($row=mysqli_fetch_array($result))
	  {
		
		  echo "<tr>";
		   echo "<td>"; echo $row["tid"]; echo "</td>";
		  echo "<td>"; echo $row["bid"]; echo "</td>";
		 
		  echo "<td>"; echo $row["cindate"]; echo "</td>";
		  echo "<td>"; echo $row["gid"]; echo "</td>";
		  echo "<td>"; echo $row["roomno"]; echo "</td>";
		  echo "<td>"; echo $row["model"]; echo "</td>";
		  echo "<td>"; echo $row["vehicleno"]; echo "</td>";
		  echo "<td>"; echo $row["vehicletype"]; echo "</td>";
		  echo "<td>"; echo $row["advancepayment"]; echo "</td>";
		  echo "</tr>";
	  }
	  echo "</table>";
  }
?>
</body>
</html>