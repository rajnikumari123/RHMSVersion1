<?php
session_start();
$con =  new mysqli("localhost","rajni","rajni","RHMS");
	
	$sql = "Select sid from tblstaff";
	 
	$result = $con->query($sql);
	
	if($result -> num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			$sid = $row["sid"];
		}
		$sid = substr($sid,1,7);
		$sid = $sid + 1;
		$sid = "S" . $sid;
	}
	else
	{
		$sid = "S" . date("Y") . "001"; 
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
<form name="form1" action="" method="POST">

<!-- method="POST" action="guestsubmit.php">-->
<table align="center" cellspacing="0" style="width:30%">
<h1 align="center">Staff Form<h1>
<tr>
<td>Staff Id<td><input type="text" value="<?php echo $sid;?>" name="sid" placeholder="S2020N01" size="22"></td></tr>
<tr>
<td>Password<td><input type="text" name="password" placeholder="********" size="22"></td></tr>

<!--<form   method="POST" action="guestsubmit.php">-->
<!--<table   align="center" cellspacing="0" style="width:100%" >-->
<tr><td >First Name<td><input type="text" name="fname" placeholder="Fname" size="22" /></td></tr>
<tr><td>Last Name<td><input type="text" name="lname" placeholder="Lname" size="22" /></td></tr>
<tr><td>Gender<td><input type="radio" name="gender" value="Male" checked="checked">Male
			<input type="radio" name="gender" value="Female">Female</td></tr>
 <tr><td>DOB<td> 
 <input type="date"name="dob"  />
 
 </td></tr>
 <tr><td>Contact-Number<td><input type="text" name="cno" size="22" /> </td></tr>
  <tr><td>E-mail<td><input type="text" name="email" size="22"   /></td></tr>
 <tr> <td>Pincode<td><input type="text" name="pincode"  size="22" /> </td></tr>
<tr> <td>city <td> 
 <select id="select" name="city"  />
	<option value="1">  </option>
   <option value="muzaffarpur">Muzaffarpur</option>
   <option value="bhagalpur">Bhagalpur</option>
 </select></td></tr>
<tr> <td>State<td>
 <select id="select" name="state" />
	<option value=""> </option>
   <option value="bihar">Bihar</option>
   </select>
 </td></tr>
<tr> <td>Country<td>
 <select id="select" name="country"   />
  <option value=""></option>
  <option value="india">india</option>
 </select>
 </td></tr>
 </table><br>
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
 </td></td>

</table>
</form>
<?php
  if(isset($_POST["submit1"]))
  {
	  
	 
	  //$dob = $_POST["Year"] . "-" .$_POST["month"]. "-".$_POST["day"];
	  
	  if(mysqli_query($con,"insert into tblstaff values('$_POST[sid]','$_POST[password]','$_POST[fname]',
	  '$_POST[lname]','$_POST[gender]',
	  '$_POST[dob]','$_POST[cno]','$_POST[email]','$_POST[pincode]','$_POST[city]','$_POST[state]',
	  '$_POST[country]')"))
	  {
		  
  
		  echo "Records inserted successfully";
		  
		  //header("Location: http://localhost:85/staffDetails.php");
      } 
     else {
           echo "Error: ", "<br>" . $con->error;
          } 
  }  
 ?>
</body>
</html>
