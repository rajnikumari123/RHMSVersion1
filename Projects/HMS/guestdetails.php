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
<h3> Search details by Guest_Id</h3><input align="center" type="text" name="gid"><input type="submit" name="search" value="search" >
</form><br><br>
<?php
if(isset($_POST["search"]))
  {
	  $res=mysqli_query($con,"select * from tblguest where gid='$_POST[gid]'");
	  //"<table align="center" border="1px" style="width:400px; line-height:20px;" >";
	   echo "<table align=center; border=2px; style='width:1050px; line-height:20px; border-collapse:collapse;' >";
	  echo "<tr>";
	  echo "<th>"; echo "GID"; echo"</th>";
	  echo "<th>"; echo "FName"; echo"</th>";
	  echo "<th>"; echo "MName"; echo"</th>";
	  echo "<th>"; echo "LName"; echo"</th>";
	  echo "<th>"; echo "Gender"; echo"</th>";
	  echo "<th>"; echo "Dob"; echo"</th>";
	  echo "<th>"; echo "Cno"; echo"</th>";
	  echo "<th>"; echo "Email"; echo"</th>";
	  echo "<th>"; echo "Pincode"; echo"</th>";
	  echo "<th>"; echo "Country"; echo"</th>";
	  echo "<th>"; echo "State"; echo"</th>";
	  echo "<th>"; echo "City"; echo"</th>";
	  echo "<th>"; echo "Aadhar"; echo"</th>";
	  echo "<th>"; echo "Proname"; echo"</th>";
	  echo "</tr>";
	  
	  while($row=mysqli_fetch_array($res))
	  {
		  echo "<tr>";
		  echo "<td>"; echo $row["gid"]; echo "</td>";
		  echo "<td>"; echo $row["fname"]; echo "</td>";
		  echo "<td>"; echo $row["mname"]; echo "</td>";
		  echo "<td>"; echo $row["lname"]; echo "</td>";
		  echo "<td>"; echo $row["gender"]; echo "</td>";
		  echo "<td>"; echo $row["dob"]; echo "</td>";
		  echo "<td>"; echo $row["cno"]; echo "</td>";
		  echo "<td>"; echo $row["email"]; echo "</td>";
		  echo "<td>"; echo $row["pincode"]; echo "</td>";
		  
		  echo "<td>"; echo $row["country"]; echo "</td>";
		  echo "<td>"; echo $row["state"]; echo "</td>";
		  echo "<td>"; echo $row["city"]; echo "</td>";
		  echo "<td>"; echo $row["aadhar"]; echo "</td>";
		  echo "<td>"; echo $row["proname"]; echo "</td>";
		  echo "<td> <a href ='editGuestRecord.php?GID=".$row["gid"]."'> edit </a></td>";
		echo "<td> <a href=Delete.php?GID=".$row["gid"].">delete </a></td>";
		 
		  echo "</tr>";
	  }
	 echo "</table>";
  }
  ?>
  </body>
  </html>