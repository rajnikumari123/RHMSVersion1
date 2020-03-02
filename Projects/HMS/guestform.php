<?php

	session_start();
	$con =  new mysqli("localhost","rajni","rajni","RHMS");

	// --------------- Generating Guestid -------------------
	
	$sql = "Select gid from tblguest";
	 
	$result = $con->query($sql);
	
	if($result -> num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			$gid = $row["gid"];
		}
		$gid = substr($gid,1,7);
		$gid = $gid + 1;
		$gid = "G" . $gid;
	}
	else
	{
		$gid = "G" . date("Y") . "001"; 
	}
	
	//----------------------------------------------------------

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
	<form name="form1" action="" method="POST" >

	<!-- method="POST" action="guestsubmit.php">-->
		<table align="center" cellspacing="0" style="width:30%">

			<tr>
				<td>Guest Id<td><input type="text" name="Gid" value="<?php echo $gid;?>" size="22" readonly /></td></tr>

<!--<form   method="POST" action="guestsubmit.php">-->
<!--<table   align="center" cellspacing="0" style="width:100%" >-->
			<tr><td >First Name<td><input type="text" name="Fname" placeholder="First Name" size="22" /></td></tr>
			<tr><td >Middle Name<td><input type="text" name="Mname" placeholder="Middle Name" size="22" /></td></tr>
			<tr><td>Last Name<td><input type="text" name="Lname" placeholder="Last Name" size="22" /></td></tr>
			<tr><td>Gender<td><input type="radio" name="R1" value="Male" checked="checked">Male
			<input type="radio" name="R1" value="Female">Female</td></tr>
			<tr><td>DOB<td> 
				
				<input type="date" name="dob" />
				
			</tr>
			<tr><td>Contact-Number<td><input type="text" name="Cno" size="22" /> </td></tr>
			<tr><td>E-mail<td><input type="text" name="Email" size="22"   /></td></tr>
			<tr> <td>Pincode<td><input type="text" name="Pincode"  size="22" /> </td></tr>
			<tr> <td>Country<td>
				<select id="select" name="Country"  />
					<option value=""></option>
					<option value="india">india</option>
				</select>
				</td>
			</tr>
			<tr> <td>State<td>
				<select id="select" name="State" />
					<option>select</option>
					<?php
					$res=mysqli_query($con,"select * from state");
				     while($row=mysqli_fetch_array($res))
					 {
					?>
					<option> <?php echo $row["name"]; ?></option>
					<?php
					 }
					 ?>
				</select>
				</td></tr>
				
			<tr> <td>city <td> 
				<select id="select" name="City"  />
					<option value="1">  </option>
					<option value="muzaffarpur">Muzaffarpur</option>
					<option value="bhagalpur">Bhagalpur</option>
				</select></td></tr>
			
			
			<tr><td >Aadhar No<td><input type="text" name="Aadhar" placeholder="" size="22" /></td></tr>
			<tr>
               <td>Profession-Name<td>
               <select id = "select" name="Proname"   />
               <option value=""><option>
               <option value="student"> Student</option>
               <option value="business-man"> Business-man</option>
                </td></td>
 
             </tr>
			
		</table>
		<br>
 <!--<td>Middle Name<td><input type="text"> </td></td>-->
 
		<table align="center">
			
				<td>
				<?php
    if($_SESSION["role"]=="admin")
		echo "<input type=button value=Home id=btn onclick=window.location.href='http://localhost:85/adminDashboard.php'>";
	else
		echo "<input type=button value=Home id=btn onclick=window.location.href='http://localhost:85/receptionistdashboard.php'>";
	?>
					<input type="submit"  value="insert" name="submit1" id="btn">
					<input type="reset"  value="Reset"id="btn">
					<!--<input type="submit" value="delete" name="delete"id="btn">-->
					<!--<input type="submit" name="search" value="search" id="btn">
					<!--<input type="submit" name="update" value="update" id="btn">
 <!--<input type="submit"  value="submit"id="btn">-->
					<!--<input type="buton" value="display" id="btn" 
					onclick="window.location.href = 'http://localhost:85/guestdetails.php'"></td></td>-->
			
		</table>
	</form>
<?php
  if(isset($_POST["submit1"]))
  { 
	  if(mysqli_query($con,"insert into tblguest values('$_POST[Gid]','$_POST[Fname]','$_POST[Mname]','$_POST[Lname]',
	  '$_POST[R1]',
	  '$_POST[dob]','$_POST[Cno]','$_POST[Email]','$_POST[Pincode]','$_POST[Country]','$_POST[State]','$_POST[City]'
	  ,'$_POST[Aadhar]','$_POST[Proname]' )"))
	  {
		  
		  echo "Records inserted successfully";
		  //echo alert(" record inserted successfuly");
		  //header("Location: http://localhost:85/guestdetails.php");
      } 
     else {
          echo "Error: " . $sql . "<br>" . $con->error;
          } 
  }  
	  
  ?>
</body>
</html>
