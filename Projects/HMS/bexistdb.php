

<html>
<body>


<table align="center" border="5px" style="width:200px; line-height:20px;" >
<!--<form   method="POST" action="DemoSubmit.php">-->
<tr>
<th colspan="20"><h1>booking details</h1></th>
</tr>
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
  die("Connection failed: " . $conn->connect_error);
  
}
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
		<td><a href=gbookingform.php?bno=".$row["Bno"].">Edit</a></td>
		
		
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