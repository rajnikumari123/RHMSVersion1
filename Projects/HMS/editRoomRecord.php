<?php
 $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	
}
 
  $editid = $_GET['ID'];
  $query=mysqli_query($con,"select * from tblroom where id='{$editid}'") or die(mysqli_error());
  $editdata = mysqli_fetch_row($query);
  
  if($_POST){
	  $roomno=$_POST['roomno'];
	  $roomtype=$_POST['roomtype'];
	 
	  $id =$_POST['id'];
	  
	  $q=mysqli_query($con,"update tblroom set roomnumber='{$password}',roomtype='{$fname}',lname='{$lname}',
	
	  country='{$country}' where sid='{$Sid}'") or die (mysqli_error());
	if($q)
	{
		echo " <script> alert('Record updated');window.location='staffDetails.php';</script>";
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
<form name="form1" action="" method="POST">


<table align="center" cellspacing="0" style="width:30%">
<h1 align="center">Staff Form<h1>
<tr>
<td><td><input type="hidden" name="sid" placeholder="S2020N01" value="<?php echo $editdata[0]; ?>" size="22"></td></tr>
<tr>
<td>Password<td><input type="text" name="password" placeholder="********" value="<?php echo $editdata[1]; ?>" size="22"></td></tr>


<tr><td >First Name<td><input type="text" name="fname" placeholder="First Name"value="<?php echo $editdata[2]; ?>" size="22"required /></td></tr>
<tr><td>Last Name<td><input type="text" name="lname" placeholder="Last Name" value="<?php echo $editdata[3]; ?>" size="22"required /></td></tr>
<tr><td>Gender<td><input type="text" name="gender"  value="<?php echo $editdata[4]; ?> " >
			</td></tr>
 <tr><td>DOB<td> 
 <input type="date"name="dob" value="<?php echo $editdata[5]; ?>" required />
 
 </td></tr>
<td>Contact-Number<td><input type="text" name="cno" value="<?php echo $editdata[6]; ?>" size="22"required /> </td></tr>
  <tr><td>E-mail<td><input type="text" name="email" value="<?php echo $editdata[7]; ?>" size="22"  required /></td></tr>
 <tr> <td>Pincode<td><input type="text" name="pincode" value="<?php echo $editdata[8]; ?>"  size="22"required /> </td></tr>
<tr> <td>city <td> 
 <input id="select" name="city" type="text" value="<?php echo $editdata[9]; ?>" required />
	</td></tr>
<tr> <td>State<td>
 <input id="select" name="state" type="text"  value="<?php echo $editdata[10]; ?>"required />
	
 </td></tr>
<tr> <td>Country<td>
 <input id="select" name="country" type="text" value="<?php echo $editdata[11]; ?>" required />
 
 </td></tr>
 </table><br>
 <!--<td>Middle Name<td><input type="text"> </td></td>-->
 
		<table align="center">
			
				<td>
					<input type="submit"  value="Update" name="submit1" id="btn">
					
					
					
			
		</table>
	</form>
	</body>
	</html>