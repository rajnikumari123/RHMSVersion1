
<html>
<body>

<table align="center" border="5px" style="width:200px; line-height:20px;" >
<!--<form   method="POST" action="DemoSubmit.php">-->
<tr>
<th colspan="20"><h1>booking details</h1></th>
</tr>
<tr>
<input type="text" size="32px" name="id" placeholder="search" />
&nbsp; &nbsp; &nbsp;<input type="submit"name="search"value="search data"/>
</tr><br><br>
<tr>
 <th>BNo</th>
 <th>FName</th>
 <th>MName</th>
 <th>LName</th>
 <th>Gender</th>
 <th>DOB</th> 
 <th>CN0</th>
  <th>Email</th>
 <th>Pincode</th>
 <th>city </th> 
 <th>State</th>
 <th>Country</th>
 <th>AadharNo</th>
 <th>ProName</th>
 <th>purposeofstay</th>
  <th>Noofadults</th>
 <th>Noofchild</th>
 <th>Noofdays</th>
 <th>Roomtype</th>
 <th>Roomrate</th>
 
 </tr>
 
 <?php

$con = new mysqli("localhost","rajni","rajni","gbookingform");

if ($con -> connect_errno) {
  die("Connection failed: " . $con->connect_error);
  
}
if(isset($_POST["search"]))
  {
	  $res=mysqli_query($con,"select * from tblguestform where bno='$_POST[BookNo]'");
	  echo "<table border=1>";
	  echo "<tr>";
	  echo "<th>"; echo "BNo"; echo"</th>";
	   echo "<th>"; echo "FName"; echo"</th>";
echo "<th>"; echo "MName"; echo"</th>";
echo "<th>"; echo "LName"; echo"</th>";
echo "<th>"; echo "Gender"; echo"</th>";
echo "<th>"; echo "DOB"; echo"</th>";
echo "<th>"; echo "CNO"; echo"</th>";
echo "<th>"; echo "Email"; echo"</th>";
echo "<th>"; echo "Pincode"; echo"</th>";
echo "<th>"; echo "city"; echo"</th>";
echo "<th>"; echo "State"; echo"</th>";
echo "<th>"; echo "Country"; echo"</th>";
echo "<th>"; echo "AadharNo"; echo"</th>";
echo "<th>"; echo "ProName"; echo"</th>";
echo "<th>"; echo "purposeofstay"; echo"</th>";
echo "<th>"; echo "Noofadults"; echo"</th>";
echo "<th>"; echo "Noofchild"; echo"</th>";
echo "<th>"; echo "Noofdays"; echo"</th>";
echo "<th>"; echo "Roomtype"; echo"</th>";
echo "<th>"; echo "Roomrate"; echo"</th>";	   
	  echo "</tr>";
	  
	  while($row=mysqli_fetch_array($res))
	  {
		  echo "<tr>";
		  echo "<td>"; echo $row["Bno"]; echo "</td>";
		  echo "<td>"; echo $row["fname"]; echo "</td>";
		  echo "<td>"; echo $row["mname"]; echo "</td>";
		  echo "<td>"; echo $row["lname"]; echo "</td>";
		  echo "<td>"; echo $row["gender"]; echo "</td>";
		  echo "<td>"; echo $row["dob"]; echo "</td>";
		   echo "<td>"; echo $row["cno"]; echo "</td>";
		  echo "<td>"; echo $row["email"]; echo "</td>";
		  echo "<td>"; echo $row["pincode"]; echo "</td>";
		   echo "<td>"; echo $row["city"]; echo "</td>";
		  echo "<td>"; echo $row["state"]; echo "</td>";
		  echo "<td>"; echo $row["country"]; echo "</td>";
		  echo "<td>"; echo $row["Aadharno"]; echo "</td>";
		  echo "<td>"; echo $row["proname"]; echo "</td>";
		  echo "<td>"; echo $row["pofstay"]; echo "</td>";
		  echo "<td>"; echo $row["noofadults"]; echo "</td>";
		  echo "<td>"; echo $row["noofdays"]; echo "</td>";
		  echo "<td>"; echo $row["noofchild"]; echo "</td>";
		  echo "<td>"; echo $row["roomtype"]; echo "</td>";
		  echo "<td>"; echo $row["roomrate"]; echo "</td>";
		  
		  echo "</tr>";
	  }
	  echo "</table>";
  }
  ?>
	
	
}
<?php
$sql="select * from tblguestinfo";
$result=$con-> query ($sql);
if($result->num_rows > 0){
	while($row =$result->fetch_assoc()){
		echo"<tr>
		
		<td>".$row["Bno"]."</td>
		<td>".$row["fname"]."</td>
		<td>".$row["mname"]."</td>
		<td>".$row["lname"]."</td>
		<td>".$row["gender"]."</td>
		<td>".$row["dob"]."</td>
		<td>".$row["cno"]."</td>
		<td>".$row["email"]."</td>
		<td>".$row["pincode"]."</td>
		<td>".$row["city"]."</td>
		<td>".$row["state"]."</td>
		<td>".$row["country"]."</td>
		<td>".$row["Aadharno"]."</td>
		<td>".$row["proname"]."</td>
		<td>".$row["pofstay"]."</td>
		<td>".$row["noofadults"]."</td>
		<td>".$row["noofdays"]."</td>
		<td>".$row["noofchild"]."</td>
		<td>".$row["roomtype"]."</td>
		<td>".$row["roomrate"]."</td>
		<td> <a href=gbookingform.php?bno=".$row["Bno"]." >Edit</a></td>
		
		
		</tr>";
	}
 echo"</table>";
}
else{
	echo"0 result";
}
$con-> close();
?>
 
 </body>
 </table>
</html>