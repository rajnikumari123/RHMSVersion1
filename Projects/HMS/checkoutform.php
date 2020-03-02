<?php
session_start();
$con =  new mysqli("localhost","rajni","rajni","RHMS");

	$tid = null;
	$bid = null;
	$gid = null;
	$fname=null;
	$mname=null;
	$lname=null;
	$gender=null;
	$dob=null;
	$cno=null;
	$email=null;
	$pincode=null;
	$country=null;
	$state=null;
	$city=null;
	$aadhar=null;
	$proname=null;
	$pos = null;
	$noofadults=null;
	$noofchild=null;
	$noofday=null;
	$cid=null;
	$roomtype=null;
	$roomnumber=null;
	$roomrate=null;
	$tax=null;
	$model=null;
	$vehicleno=null;
	$vehicletype=null;
	$advancepayment=null;
	
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

td,th {
  padding: 5px;
  
}
#labels{
	color:black;
}
#tbltable{
	background-color:green;
	width:200px;
	border-radius:25px;
}
#select{
	width:173px;
}
#cd{
	width:173px;
}

</style>
</head>
<body>
<br>

<form method="POST">

<?php
      
if(isset($_POST["search"]))
  {
	 
        
          $con =  new mysqli("localhost", "rajni", "rajni", "RHMS");	
          $tid = $_POST['Tid'];
		  
		  $sql = "Select * from tblcheckout where tid='$tid'";
		  $result = mysqli_query($con, $sql) or die ("QUERY UNSUCCESSFULL.");
		  
		  if(mysqli_num_rows($result)<=0){

			$sql =  "SELECT * from tblcheckin WHERE tid= '$tid'";
			$result = mysqli_query($con, $sql) or die ("QUERY UNSUCCESSFULL.");
			if(mysqli_num_rows($result)>0){
             while ($row = mysqli_fetch_assoc($result)){
		  $tid=$row["tid"];
	      $bid=$row["bid"];
		  $cid=$row["cindate"];
		  $gid=$row["gid"];
	      $roomnumber=$row["roomno"];
	      $model=$row["model"];
		  $vehicleno=$row["vehicleno"];
		  $vehicletype=$row["vehicletype"];
		  $advancepayment=$row["advancepayment"];
	     
			 }
		  }

          $sql =  "SELECT * from tblbooking WHERE bid= '$bid'";
          $result = mysqli_query($con, $sql) or die ("QUERY UNSUCCESSFULL.");
		  
		  if(mysqli_num_rows($result)>0){
             while ($row = mysqli_fetch_assoc($result)){
		 // $bid=$row["bid"];
		  $gid=$row["gid"];
	       
		  $pos=$row["pos"];
	      $noofadults=$row["noofadults"];
	      $noofchild=$row["noofchild"];
	      $noofday=$row["noofday"];
	      $cindate=$row["cindate"];
	      $roomtype=$row["roomtype"];
		   
	      $roomrate=$row["roomrate"];
	      $tax=$row["tax"];
	      $total=$row["total"];
		  }
		}
		$sql =  "SELECT * from tblguest WHERE gid= '$gid'";
          $result = mysqli_query($con, $sql) or die ("QUERY UNSUCCESSFULL.");
		  
		  if(mysqli_num_rows($result)>0){
             while ($row = mysqli_fetch_assoc($result)){
		  
		  $fname=$row["fname"];
	      $mname=$row["mname"];
		  $lname=$row["lname"];
		  $gender=$row["gender"];
	      $dob=$row["dob"];
	      $cno=$row["cno"];
	      $email=$row["email"];
	      $pincode=$row["pincode"];
	      $country=$row["country"];
	      $state=$row["state"];
	      $city=$row["city"];
	      $aadhar=$row["aadhar"];
		  $proname=$row["proname"];
			 }
		  }
	}
	else
	{
		echo "Customer already checked out!";
	}
  }
?>
<table ><br>
<tr>
<td>Transaction Id<td><input type="text" name="Tid"  value="<?php echo $tid; ?>" id="s1"  >
<input type="submit" name="search" value="search" ></td></td>



<td>Check in Date<td><input type="text" name="cindate"  value="<?php echo $cid; ?>" id="s1" readonly ></td></td>
<td>Check Out Date<td><input type="" name="coutdate" readonly value='<?php echo date('Y-m-d');?>'> </td></td>
</table>

<table   align="center" cellspacing="0" style="width:100%" >

<th id="labels">Booking-info</th><br>
<tr>
<td>Booking Id<td><input type="text" name="bid" readonly value="<?php echo $bid; ?>" size="22" /></td></td>
 <td>Guest Id<td><input type="text" name="gid" readonly value="<?php echo $gid; ?>" size="22" /></td></td>
 </tr>
 <tr>
 <td>First Name<td><input type="text" name="fName" readonly placeholder="First Name"  value="<?php echo $fname; ?>" size="22" /></td></td>
 <td>Middle Name<td><input type="text" name="mName" readonly placeholder="Middle Name" size="22"  value="<?php echo $mname; ?>" /></td></td>
 <td>Last Name<td><input type="text" name="lName" readonly placeholder="Last Name" size="22"  value="<?php echo $lname; ?>"> </td></td>
 </tr>
 <tr>
 <td>Gender<td>
 
 <select id="select" name="gender" readonly />
  <option><?php echo $gender; ?></option>
  <?php
  $res=mysqli_query($con,"select * from tblinfo");
				     while($row=mysqli_fetch_array($res))
					 {
					?>
					<option> <?php echo $row["gender"]; ?></option>
					<?php
					 }
					 ?>
   </select>
			
 <td>DOB<td> 
 
 <input type="date" name="dob"  value="<?php echo $dob; ?>" readonly  />
 
 
 </td></td>
 <td>Contact-Number<td><input type="text" name="cNo" readonly value="<?php echo $cno; ?>" size="22" /> </td></td>
 </tr>

<tr>
 <td>E-mail<td><input type="text" name="Email" size="22" readonly  value="<?php echo $email; ?>"   /></td></td>
 <td>Pincode<td><input type="text" name="pincode"  size="22" readonly  value="<?php echo $pincode; ?>" /> </td></td>
 


  <td>Country<td>
 <select id="select" name="Country" readonly value="<?php echo $country; ?>" />
  <option><?php echo $country; ?></option>
  <?php
  $res=mysqli_query($con,"select * from tblcountry");
				     while($row=mysqli_fetch_array($res))
					 {
					?>
					<option> <?php echo $row["name"]; ?></option>
					<?php
					 }
					 ?>
   </select>
   </td></td>
   </tr>
  <td>State<td>
				<select id="select" name="State" readonly  value="<?php echo $state; ?>" />
					
					<option><?php echo $state; ?></option>
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
				</td>
	<td>city <td> 
         <select id="select" name="City" readonly value="<?php echo $city; ?>"/>
	<option> <?php echo $city; ?> </option>
    <?php
					$res=mysqli_query($con,"select * from tblcity");
				     while($row=mysqli_fetch_array($res))
					 {
					?>
					<option> <?php echo $row["name"]; ?></option>
					<?php
					 }
					 ?>
 </select></td></td>
 
 <td>Aadhar-Number<td><input type="text" name="aadharNo" readonly value="<?php echo $aadhar; ?>" size="22" /></td></td>
 </tr>
 <tr>
 <td>Professional-Name<td>
<select id = "select" name="proname"  readonly value="<?php echo $proname; ?>" />
    <option value=""><option>
    <option value="student"> Student</option>
    <option value="business-man"> Business-man</option>
 </td></td> 
 </tr>
 <th id="labels"> Room-info</th>
 <tr>
  <td>Purpose-of-stay<td><input type="text" name="pos" readonly value="<?php echo $pos; ?>"size="22" /> </td></td>
  <td>Number-of-adults<td>
 <select id="select" name="noofadults"  value="<?php echo $noofadults; ?>" readonly />
 
  <option><?php echo $noofadults; ?> </option>
  <?php
  $res=mysqli_query($con,"select * from tblinfo");
				     while($row=mysqli_fetch_array($res))
					 {
					?>
					<option> <?php echo $row["noofadult"]; ?></option>
					<?php
					 }
					 ?>
  </select>
 <td>Number-of-childrens<td>
<select id = "select" name="noofchildren"  value="<?php echo $noofchild; ?>" readonly />
 <option><?php echo $noofchild; ?> </option>
  <?php
  $res=mysqli_query($con,"select * from tblinfo");
  
				     while($row=mysqli_fetch_array($res))
					 {
					?>
					<option> <?php echo $row["noofchild"]; ?></option>
					<?php
					 }
					 ?>
  </select>
 </tr>
 <tr>
 
<td>Number-of-days<td>
 <select id="select" name="noofday"  value="<?php echo $noofday; ?>" readonly />
  <option> <?php echo $noofday; ?></option>
  <?php
  $res=mysqli_query($con,"select * from tblinfo");
  
				     while($row=mysqli_fetch_array($res))
					 {
					?>
					<option> <?php echo $row["noofday"]; ?></option>
					<?php
					 }
					 ?>
</select>
 </td></td>
 </td></td>
 
  <td>Room-Type<td>
<select id="select" name="roomtype" readonly  />
   <option><?php echo $roomtype ?> </option>
  <?php
  $res=mysqli_query($con,"select * from tblroom");
  
				     while($row=mysqli_fetch_array($res))
					 {
					?>
					<option> <?php echo $row["roomtype"]; ?></option>
					<?php
					 }
					 ?>
</select>
 </td></td>
 <td>Room-number<td>
<select id="select" name="roomnumber" readonly />
   <option><?php echo $roomnumber; ?></option>
  <?php
  $res=mysqli_query($con,"select * from tblroom");
  
				     while($row=mysqli_fetch_array($res))
					 {
					?>
					<option> <?php echo $row["roomnumber"]; ?></option>
					<?php
					 }
					 ?>
</select>
 </td></td>
 </tr>
 <th id="labels"> Vehicle info</th>
 <tr>

 <td>Model<td><input type="text" name="model" size="22"  value="<?php echo $model; ?>" /></td></td>
 <td>Vehicle Number<td><input type="text" name="vnumber" size="22"  value="<?php echo $vehicleno;?>" /> </td></td>
 <td>Vehicle Type<td><input type="text" name="vtype"  value="<?php echo $vehicletype;?>" size="22"> </td></td>
 </td></td>
 </tr>
 <th id="labels"> Payment</th>
 <tr>
 <td>Room-rate<td><input type="text" name="roomrate"  value="<?php echo $roomrate;?>" size="22" readonly /></td></td>
 <td>Tax<td><input type="text" name="tax" size="22"  value="<?php echo $tax;?>" readonly /> </td></td>
 <td>Advance payment<td><input type="text" name="advancepayment" size="22"  value="<?php echo $advancepayment;?>" readonly /></td></td>
 </tr>
 <tr>
 <td> Net Total<td><input type="text" name="nettotal" size="22"> </td></td>
 <td> Amount Paid<td><input type="text" name="amountpaid" size="22"> </td></td>
 <td> Amount Refund<td><input type="text" name="amountrefund" size="22"> </td></td>
 </tr>
 <tr>
 <td> payment Mode<td>
 <select id="select" name="paymentmode"   />
   <option value=""></option>
   <option value="">cash</option>
   <option value="">card</option>
</select>
 </td></td>
 </tr>
 </table><br>
 <table align="center">
<tr><td>
  <td>
  <?php
    if($_SESSION["role"]=="admin")
		echo "<input type=button value=Home id=btn onclick=window.location.href='http://localhost:85/adminDashboard.php'>";
	else
		echo "<input type=button value=Home id=btn onclick=window.location.href='http://localhost:85/receptionistdashboard.php'>";
	?>
  <input type="reset"  value="Reset"id="btn">
 <input type="submit"  value="Print"id="btn">
 <input type="submit" name="submit1" id="btn"></td></td>
</tr>
</table>
</form>
<?php
if(isset($_POST["submit1"]))
  { 

		//echo $_POST['r2'];
		$tid=$_POST['Tid'];
        $bid=$_POST['bid'];
		$cid=$_POST['cindate'];
		$cod=$_POST['coutdate'];
	    $gid=$_POST['gid'];
	    $fname=$_POST['fName'];
	    $mname=$_POST['mName'];
	    $lname=$_POST['lName'];
	    $gender=$_POST['gender'];
	    $dob=$_POST['dob'];
	    $cno=$_POST['cNo'];
	    $email=$_POST['Email'];
	    $pincode=$_POST['pincode'];
	    $country=$_POST['Country'];
		$state=$_POST['State'];
		$city=$_POST['City'];
	    $aadhar=$_POST['aadharNo'];
	    $proname=$_POST['proname'];
        $pofstay=$_POST['pos'];
	    $noofadults=$_POST['noofadults'];
	    $noofchild=$_POST['noofchildren'];
	    $noofday=$_POST['noofday'];
	    $roomtype=$_POST['roomtype'];
		$roomnumber=$_POST['roomnumber'];
	    $roomrate=$_POST['roomrate'];
	    $tax=$_POST['tax'];
		
	    $model=$_POST['model'];
		$vehicleno=$_POST['vnumber'];
		$vehicletype=$_POST['vtype'];
		$nettotal=$_POST['advancepayment'];
		$amountpaid=$_POST['advancepayment'];
		$amountrefund=$_POST['advancepayment'];
		$paymentmode=$_POST['advancepayment'];
		
		
     
		//$q=1;
		
		{
			
	       $qu = 1;
		
		// echo $q;
		 
		if($qu==1)
		 {
	        $insert = "insert into tblcheckout(tid,coutdate,nettotal,amountpaid,amountrefund,paymentmode)values('$tid','$cod','$nettotal',
			'$amountpaid','$amountrefund','$paymentmode')";
			 
			 //echo $insert;
	  
	        $query = mysqli_query($con,$insert) or die(mysqli_error($con));
		 
	   
		     if($query==1)
		  {
			 echo "Records inserted successfully";
		  }
		 
		}
		
	     else
		 {
			 echo "unsuccessfully";
		 }
		}
	   
  }
  
?>
</body>
</html>