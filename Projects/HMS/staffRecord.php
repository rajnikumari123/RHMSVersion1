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
<table align="center" border="2px" style="width:400px; line-height:20px; border-collapse: collapse;"  >

<tr>
<th colspan="30" id="design"><h3>Staff Details</h3></th>
</tr>
<tr>
 <th>SID</th>
 <th>Pass</th>
 <th>fname</th>
 <th>Lname</th>
 <th>Gender</th>
 <th>Dob</th> 
 <th>Cno</th>
 <th>Email</th>
 <th>Pincode</th>
 <th>City</th>
 <th>State</th>
 <th>Country</th>
 
 </tr>
 <?php
 
  $sql="select * from tblstaff";
  $result=$con-> query ($sql);
  if($result->num_rows > 0){
	while($row =$result->fetch_assoc())
	  //while($row=mysqli_fetch_array($result))
	  {
		
		  echo "<tr>";
		   echo "<td>"; echo $row["sid"]; echo "</td>";
		  echo "<td>"; echo $row["pass"]; echo "</td>";
		 
		  echo "<td>"; echo $row["fname"]; echo "</td>";
		  echo "<td>"; echo $row["lname"]; echo "</td>";
		  echo "<td>"; echo $row["gender"]; echo "</td>";
		  echo "<td>"; echo $row["dob"]; echo "</td>";
		  echo "<td>"; echo $row["cno"]; echo "</td>";
		  echo "<td>"; echo $row["email"]; echo "</td>";
		  echo "<td>"; echo $row["pincode"]; echo "</td>";
		  echo "<td>"; echo $row["city"]; echo "</td>";
		  echo "<td>"; echo $row["state"]; echo "</td>";
		  echo "<td>"; echo $row["country"]; echo "</td>";
		 
		  
		  echo "</tr>";
	  }
	  echo "</table>";
  }
?>
</body>
</html>