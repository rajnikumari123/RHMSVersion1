<?php
 $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	
}
 
  $editid = $_GET['BID'];
  $query=mysqli_query($con,"select * from tblbooking where bid='{$editid}'") or die(mysqli_error());
  $editdata = mysqli_fetch_row($query);
  
  if($_POST){
	  $gid=$_POST['Gid'];
	  $pos=$_POST['pos'];
	  $noofadults=$_POST['noofadults'];
	  $noofchild=$_POST['noofchild'];
	  
	  $noofdays=$_POST['noofdays'];
	  $cindate=$_POST['cindate'];
	  $roomtype=$_POST['roomtype'];
	  $roomrate=$_POST['roomrate'];
	  $tax=$_POST['tax'];
	  $total=$_POST['total'];
	  
	  $bid =$_POST['Bid'];
	  
	  
	  $q = mysqli_query($con,"update tblbooking set gid='{$gid}',pos='{$pos}', noofadults='{$noofadults}',noofchild='{$noofchild}',
	  noofday='{$noofdays}',
	  cindate='{$cindate}',roomtype='{$roomtype}',roomrate='{$roomrate}',tax='{$tax}',
	  
	  total='{$total}' where bid='{$bid}'") 
	  
	  or die (mysqli_error($con));
	  
	if($q)
	{
		echo " <script> alert('Record updated');window.location='bookingdetails.php';</script>";
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
	<h1 align="center">Booking Form<h1>
	<form name="form1" action="" method="POST">

	<!-- method="POST" action="guestsubmit.php">-->
		<table align="center" cellspacing="0" style="width:30%">

			<tr>
				<td><td><input type="hidden" name="Bid" value="<?php echo $editdata[0]; ?>" size="22" /></td></tr>
			<tr>
				<td>Guest Id<td><input type="text" name="Gid" value="<?php echo $editdata[1]; ?>" readonly  size="22" /></td></tr>

<!--<form   method="POST" action="guestsubmit.php">-->
<!--<table   align="center" cellspacing="0" style="width:100%" >-->
			<tr><td >Purpose of Stay<td><input type="text" name="pos"  value="<?php echo $editdata[2]; ?>"  size="22" /></td></tr>
			<tr><td >No of adults<td><input type="text" name="noofadults"  value="<?php echo $editdata[3]; ?>"  size="22" /></td></tr>
			<tr><td>No of children<td><input type="text" name="noofchild"  value="<?php echo $editdata[4]; ?>"  size="22" /></td></tr>
			<tr><td>No of days<td><input type="text" name="noofdays"  value="<?php echo $editdata[5]; ?> " >
			</td></tr>
			
			<tr><td> Check in date<td><input type="text" name="cindate"  value="<?php echo $editdata[6]; ?>" size="22"   /></td></tr>
			<tr> <td>Room type<td><input type="text" name="roomtype"  value="<?php echo $editdata[7]; ?>" size="22" /> </td></tr>
			
			
			
			<tr> <td>Room rate <td> <input id="select" name="roomrate"  value="<?php echo $editdata[8]; ?>" />
			</td></tr>
			<tr> <td>Tax<td> <input id="select" name="tax"  value="<?php echo $editdata[9]; ?>" />
			</td></tr>
			<tr> <td>Total<td> <input id="select" name="total"  value="<?php echo $editdata[10]; ?>" />
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