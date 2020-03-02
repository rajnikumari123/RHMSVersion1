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
<h3> Search Details by Checkin_Id</h3><input align="center" type="text" name="tid"><input type="submit" name="search" value="search" >
</form><br><br>
<?php
if(isset($_POST["search"]))
  {
	  $res=mysqli_query($con,"select * from tblcheckin where tid='$_POST[tid]'");
	  //"<table align="center" border="1px" style="width:400px; line-height:20px;" >";
	  echo "<table align=center; border=2px; style='width:1050px; line-height:20px; border-collapse:collapse;' >";
	  echo "<tr>";
	  echo "<th>"; echo "TID"; echo"</th>";
	  echo "<th>"; echo "BID"; echo"</th>";
	  echo "<th>"; echo ""; echo"</th>";
	  echo "<th>"; echo "Cindate"; echo"</th>";
	  echo "<th>"; echo "Gid"; echo"</th>";
	  echo "<th>"; echo "Room_number"; echo"</th>";
	  echo "<th>"; echo "Model"; echo"</th>";
	  echo "<th>"; echo "Vehicle_no"; echo"</th>";
	  echo "<th>"; echo "Vehicle_type"; echo"</th>";
	  echo "<th>"; echo "Advancepayment"; echo"</th>";
	 
	  echo "</tr>";
	  
	  while($row=mysqli_fetch_array($res))
	  {
		  echo "<tr>";
		  echo "<td>"; echo $row["tid"]; echo "</td>";
		  echo "<td>"; echo $row["bid"]; echo "</td>";
		   echo "<td> <a href ='bookingdetails.php?GID=".$row["gid"]."'>bookinginfo </a></td>";
		  echo "<td>"; echo $row["cindate"]; echo "</td>";
		  echo "<td>"; echo $row["gid"]; echo "</td>";
		  echo "<td>"; echo $row["roomno"]; echo "</td>";
		  echo "<td>"; echo $row["model"]; echo "</td>";
		  echo "<td>"; echo $row["vehicleno"]; echo "</td>";
		  echo "<td>"; echo $row["vehicletype"]; echo "</td>";
		  echo "<td>"; echo $row["advancepayment"]; echo "</td>";
		  
		  echo "<td> <a href ='editCheckinRecord.php?TID=".$row["tid"]."'> edit </a></td>";
		  echo "<td> <a href=deleteCheckinRecord.php?TID=".$row["tid"].">delete </a></td>";
		 
		//  echo "<td> <a href ='editGuestRecord.php?GID=".$row["gid"]."'> edit </a></td>";
		//echo "<td> <a href=Delete.php?GID=".$row["gid"].">delete </a></td>";
		 
		  echo "</tr>";
	  }
	 echo "</table>";
  }
  ?>
   
  </body>
  </html>