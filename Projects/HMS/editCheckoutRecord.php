<?php
 $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	
}
 
  $editid = $_GET['TID'];
  $query=mysqli_query($con,"select * from tblcheckout where tid='{$editid}'") or die(mysqli_error());
  $editdata = mysqli_fetch_row($query);
  
  if($_POST){
	  $coutdate=$_POST['Coutdate'];
	  $nettotal=$_POST['Nettotal'];
	  $amountpaid=$_POST['Amountpaid'];
	  $amountrefund=$_POST['Amountrefund'];
	  
	  $paymentmode=$_POST['Paymentmode'];
	  $tid =$_POST['Tid'];
	  
	  
	  $q = mysqli_query($con,"update tblcheckout set coutdate='{$coutdate}', nettotal='{$nettotal}',amountpaid='{$amountpaid}',
	  amountrefund='{$amountrefund}',paymentmode='{$paymentmode}'
	  where tid='{$tid}'") 
	  
	  or die (mysqli_error($con));
	  
	if($q)
	{
		echo " <script> alert('Record updated');window.location='checkoutDetails.php';</script>";
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
				<td>Transaction Id<td><input type="text" name="Tid" value="<?php echo $editdata[0]; ?>" size="22" readonly /></td></tr>
			
			<tr><td >Checkoutdate<td><input type="text" name="Coutdate"  value="<?php echo $editdata[1]; ?>"  size="22" /></td></tr>
			<tr><td > Net Total<td><input type="text" name="Nettotal"  value="<?php echo $editdata[2]; ?>"  size="22" /></td></tr>
			 <td>Amount Paid<td><input type="text" name="Amountpaid"  value="<?php echo $editdata[3]; ?>"  size="22" /> </td></td>
			<tr><td> Amount Refund<td><input type="text" name="Amountrefund"  value="<?php echo $editdata[4]; ?>"  size="22" /></td></tr>
			<tr><td>Payment Mode<td><input type="text" name="Paymentmode"  value="<?php echo $editdata[5]; ?> " >
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