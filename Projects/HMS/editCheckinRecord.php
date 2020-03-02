<?php
 $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	
}
 
  $editid = $_GET['TID'];
  $query=mysqli_query($con,"select * from tblcheckin where tid='{$editid}'") or die(mysqli_error());
  $editdata = mysqli_fetch_row($query);
  
  if($_POST){
	  $bid=$_POST['Bid'];
	  $cindate=$_POST['Checkindate'];
	  $gid=$_POST['Gid'];
	  $roomno=$_POST['Roomno'];
	  
	  $model=$_POST['Model'];
	  $vehicleno=$_POST['Vehicleno'];
	  $vehicletype=$_POST['Vehicletype'];
	  $advancepayment=$_POST['Advancepayment'];
	  
	  $tid =$_POST['Tid'];
	  
	  
	  $q = mysqli_query($con,"update tblcheckin set bid='{$bid}',cindate='{$cindate}', gid='{$gid}',roomno='{$roomno}',
	  model='{$model}',
	  vehicleno='{$vehicleno}',vehicletype='{$vehicletype}',advancepayment='{$advancepayment}'
	  where tid='{$tid}'") 
	  
	  or die (mysqli_error($con));
	  
	if($q)
	{
		echo " <script> alert('Record updated');window.location='checkinDetails.php';</script>";
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
	<h1 align="center">Checkin Form<h1>
	<form name="form1" action="" method="POST">

	<!-- method="POST" action="guestsubmit.php">-->
		<table align="center" cellspacing="0" style="width:30%">

			<tr>
				<td><td><input type="hidden" name="Tid" value="<?php echo $editdata[0]; ?>" size="22" /></td></tr>
			<tr>
				<td>Guest Id<td><input type="text" name="Bid" value="<?php echo $editdata[1]; ?>" readonly  size="22" /></td></tr>

<!--<form   method="POST" action="guestsubmit.php">-->
<!--<table   align="center" cellspacing="0" style="width:100%" >-->
			<tr><td >Checkindate<td><input type="text" name="Checkindate"  value="<?php echo $editdata[2]; ?>"  size="22" /></td></tr>
			<tr><td > Gid<td><input type="text" name="Gid"  value="<?php echo $editdata[3]; ?>"  size="22" /></td></tr>
			 <td>Room-number<td><input type="text" name="Roomno"  value="<?php echo $editdata[4]; ?>"  size="22" /> </td></td>
			<tr><td> Vehicle Model<td><input type="text" name="Model"  value="<?php echo $editdata[5]; ?>"  size="22" /></td></tr>
			<tr><td>Vehicle Number<td><input type="text" name="Vehicleno"  value="<?php echo $editdata[6]; ?> " >
			</td></tr>
			
			<tr><td> Vehicle type<td><input type="text" name="Vehicletype"  value="<?php echo $editdata[7]; ?>" size="22"   /></td></tr>
			<tr> <td>Advance payment<td><input type="text" name="Advancepayment"  value="<?php echo $editdata[8]; ?>" size="22" /> </td></tr>
		
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