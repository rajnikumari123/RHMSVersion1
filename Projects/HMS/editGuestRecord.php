<?php
 $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	
}
 
  $editid = $_GET['GID'];
  $query=mysqli_query($con,"select * from tblguest where gid='{$editid}'") or die(mysqli_error());
  $editdata = mysqli_fetch_row($query);
  
  if($_POST){
	  
	  $fname=$_POST['Fname'];
	  $mname=$_POST['Mname'];
	  $lname=$_POST['Lname'];
	  
	  $gender=$_POST['R1'];
	  $dob=$_POST['dob'];
	  $cno=$_POST['Cno'];
	  $email=$_POST['Email'];
	  $pincode=$_POST['Pincode'];
	  $country=$_POST['Country'];
	  $state=$_POST['State'];
	  $city=$_POST['City'];
	  $aadhar=$_POST['Aadhar'];
	  $proname=$_POST['Proname'];
	  $gid =$_POST['Gid'];
	  
	  
	  $q = mysqli_query($con,"update tblguest set fname='{$fname}', mname='{$mname}',lname='{$lname}',
	  gender='{$gender}',
	  dob='{$dob}',cno='{$cno}',email='{$email}',pincode='{$pincode}',
	  
	  country='{$country}',state='{$state}',city='{$city}',aadhar='{$aadhar}',proname='{$proname}' where gid='{$gid}'") 
	  or die (mysqli_error($con));
	if($q)
	{
		echo " <script> alert('Record updated');window.location='guestdetails.php';</script>";
	}
}
?> 
<html>
<head>
<style>
body
{
	background-color:white;
   
   
}
table{
	color:black;
	background-color:rgba(0,0,0,0.2);
	border-radius:25px;
}
#btn{
	<!--background-color:rgba(0,0,0,0.5);;-->
	color:black;
	height:25px;
	width:70px;
	border-radius:25px;
}

<!--td,th {
  padding: 5px;
  
}-->
<!--#labels{
	color:black;
}-->
<!--#tbltable{
	background-color:green;
	width:100px;
	border-radius:25px;
}-->
<!--#select{
	width:173px;
}
#cd{
	width:173px;
}-->
</style>
</head>
<body>
	<h1 align="center">Guest Form<h1>
	<form name="form1" action="" method="POST">

	<!-- method="POST" action="guestsubmit.php">-->
		<table align="center" cellspacing="0" style="width:30%">

			<tr>
				<td><td><input type="hidden" name="Gid" value="<?php echo $editdata[0]; ?>"  placeholder="G2020N01" size="22" /></td></tr>

<!--<form   method="POST" action="guestsubmit.php">-->
<!--<table   align="center" cellspacing="0" style="width:100%" >-->
			<tr><td >First Name<td><input type="text" name="Fname"  value="<?php echo $editdata[1]; ?>" placeholder="First Name" size="22" /></td></tr>
			<tr><td >Middle Name<td><input type="text" name="Mname"  value="<?php echo $editdata[2]; ?>" placeholder="First Name" size="22" /></td></tr>
			<tr><td>Last Name<td><input type="text" name="Lname"  value="<?php echo $editdata[3]; ?>" placeholder="Middle Name" size="22" /></td></tr>
			<tr><td>Gender<td><input type="text" name="R1"  value="<?php echo $editdata[4]; ?> " >
			</td></tr>
			<tr><td>DOB<td> 
				
				<input type="date" name="dob"  value="<?php echo $editdata[5]; ?>"/>
				
			</tr>
			<tr><td>Contact-Number<td><input type="text" name="Cno"   value="<?php echo $editdata[6]; ?>" size="22" /> </td></tr>
			<tr><td>E-mail<td><input type="text" name="Email"  value="<?php echo $editdata[7]; ?>" size="22"   /></td></tr>
			<tr> <td>Pincode<td><input type="text" name="Pincode"  value="<?php echo $editdata[8]; ?>" size="22" /> </td></tr>
			
			
			<tr> <td>Country<td><input id="select" name="Country"  value="<?php echo $editdata[9]; ?>" />
					
				 </tr>  </td>
			
			<tr> <td>State<td><input id="select" name="State"  value="<?php echo $editdata[10]; ?>" />
					
			</td></tr>
			<tr> <td>city <td> <input id="select" name="City"  value="<?php echo $editdata[11]; ?>" />
			</td></tr>
			<tr> <td>Aadhar No <td> <input id="select" name="Aadhar"  value="<?php echo $editdata[12]; ?>" />
			</td></tr>
			<tr> <td>Profession name<td> <input id="select" name="Proname"  value="<?php echo $editdata[13]; ?>" />
			</td></tr>
		</table>
		<br>
 <!--<td>Middle Name<td><input type="text"> </td></td>-->
 
		<table align="center">
			
				<td>
					<input type="submit"  value="Update" name="submit1" id="btn">
					
					
					
			
		</table>
	</form>
	</body>
	</html>