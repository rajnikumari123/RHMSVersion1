<?php  
    session_start();
	$con =  new mysqli("localhost","rajni","rajni","RHMS");

	// --------------- Generating Checkinid -------------------
	
	$sql = "Select tid from tblcheckin order by tid asc";
	 
	$result = $con->query($sql);
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
	$cindate=null;
	$roomtype=null;
	
	$roomrate=null;
	$tax=null;
	$total=null;
	
	if($result -> num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			$tid = $row["tid"];
			
			
		}
		$tid = substr($tid,1,7);
		$tid = $tid + 1;
		$tid = "T" . $tid;
	}
	else
	{
		$tid = "T" . date("Y") . "001"; 
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

<form method="POST" >
<?php
 	      
if(isset($_POST["search"]))
  {
	      $con =  new mysqli("localhost", "rajni", "rajni", "RHMS");	
          $bid = $_POST['Bid'];
	       
		   $sql = "Select * from tblcheckin where bid='$bid'";
		  $result = mysqli_query($con, $sql) or die ("QUERY UNSUCCESSFULL.");
		  
          if(mysqli_num_rows($result)<=0){
          $sql =  "SELECT * from tblbooking WHERE bid= '$bid'";
          $result = mysqli_query($con, $sql) or die ("QUERY UNSUCCESSFULL.");
		  
		  if(mysqli_num_rows($result)>0){
             while ($row = mysqli_fetch_assoc($result)){
		  $bid=$row["bid"];
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
		echo "this booking_id already checked in!";
	}
  }
?>

<table><br>
<tr>
<td>Transaction Id<td><input type="text" name="Tid" id="s1" value="<?php echo $tid;?>" readonly ></td></td>
<td>Booking Id<td><input type="text"  value="<?php echo $bid;?>" name="Bid" id="s1" >
<input type="submit" name="search" id="search" value="search" ></td></td>
<td>Check In Date<td><input type="" name="cindate" value='<?php echo date('Y-m-d');?>' readonly ></td></td>
</table>

<!--<form   method="POST" action="guestsubmit.php">-->
<table   align="center" cellspacing="0" style="width:100%" >

<th id="labels">Guest-info</th><br>
<tr>

 <td>Guest Id<td><input type="text" name="Gid" value="<?php echo $gid; ?> "size="22" readonly required />
 </td></td>
</tr>
 <tr>
 <td>First Name<td><input type="text" name="fName" value="<?php echo $fname; ?>" placeholder="First Name" readonly size="22" /></td></td>
 <td>Middle Name<td><input type="text" name="mName" placeholder="Middle Name" value="<?php echo $mname;?>" readonly size="22" /></td></td>
 <td>Last Name<td><input type="text" name="lName" placeholder="Last Name" value="<?php echo $lname; ?>" readonly size="22" > </td></td>
 
 
</tr>
 
<tr>
 
 <td>Gender<td>
 
 <select id="select" name="gender" readonly />
  <option><?php echo $gender ?></option>
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
 
 <input type="date" name="dob" value="<?php echo $dob; ?>" readonly />
 
 
 </td></td>
 <td>Contact-Number<td><input type="text" name="cNo" value="<?php echo $cno;?>" readonly size="22" /> </td></td>
 </tr>

<tr>
 <td>E-mail<td><input type="text" name="Email" size="22"  value="<?php echo $email; ?>" readonly /></td></td>
 <td>Pincode<td><input type="text" name="pincode" value="<?php echo $pincode; ?>" size="22" readonly /> </td></td>
   <td>Country<td>
 <select id="select" name="Country" readonly />
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
 </tr>
<td>State<td>
				<select id="select" name="State" readonly />
					
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
 </td></td>
 <td>city <td> 
 <select id="select" name="City" readonly />
	<option><?php echo $city; ?> </option>
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




 <!--<td>Middle Name<td><input type="text"> </td></td>-->
  <td>Aadhar-Number<td><input type="text" name="aadharNo" value="<?php echo $aadhar;?>" readonly size="22"  /></td></td>
 
 </tr>
 <tr>

 <td>Profession-Name<td>
<input type="text" id = "select" name="proname" value="<?php echo $proname;?>" readonly />
    
 
 </tr>
 
 <th id="labels"> Room-info</th>
 <tr>
<td>Purpose-of-stay<td><input type="text" name="Pos" value="<?php echo $pos;?>" size="22" readonly /> </td></td>
 
 
 
 <td>Number-of-adults<td>
 <select id="select" name="noofadults" readonly />
 
  <option><?php echo $noofadults ?> </option>
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
<select id = "select" name="noofchildren" readonly />
 <option><?php echo $noofchild ?> </option>
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
 <select id="select" name="noofday" readonly  />
  <option><?php echo $noofday ?> </option>
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
 
 <select id="select" name="roomnumber"  />
  <option value=""> <option>
  <option value="2"> 101 </option>
  <option value="3"> 102 </option>
  <option value="4"> 103 </option>
  <option value="5"> 104 </option>
  <option value="5"> 105 </option>
  <option value="5"> 106 </option>
  <option value="5"> 107 </option>
  <option value="5"> 108 </option>
  <option value="5"> 109 </option>
   <option value="5"> 110 </option>
</select>
 </td></td>
 </td></td>
 </tr>
 
 </tr>
 <tr>
 <td>Room-rate<td><input type="text" name="roomrate" size="22" value="<?php echo $roomrate;?>" readonly /></td></td>
 <td>Tax<td><input type="text" name="tax" size="22" value="<?php echo $tax; ?>" readonly /> </td></td>
 <td>Total<td><input type="text" name="total" readonly size="22" value="<?php echo $total; ?>">  </td></td>
 </tr>
  <th id="labels"> Vehicle info</th>
 <tr>

 <td>Model<td><input type="text" name="model" size="22"  /></td></td>
 <td>Vehicle Number<td><input type="text" name="vnumber" size="22"  /> </td></td>
 <td>Vehicle Type<td><input type="text" name="vtype" size="22"> </td></td>
 </td></td>
 </tr>
 
 <th id="labels"> Payment</th>
 <tr>

 <td>Advance payment<td><input type="text" name="advancepayment" size="22"  /></td></td>
 </tr>
 </table><br>
 <table align="center">
 <tr><td>
 <?php
    if($_SESSION["role"]=="admin")
		echo "<input type=button value=Home id=btn onclick=window.location.href='http://localhost:85/adminDashboard.php'>";
	else
		echo "<input type=button value=Home id=btn onclick=window.location.href='http://localhost:85/receptionistdashboard.php'>";
	?>
  
  <input type="reset"  value="Reset"id="btn">
 <input type="submit" value="Print"id="btn">
 <input type="submit" name="submit1" id="btn">
 </td></td>
</tr>
</table>
</form>

<?php
	//echo $_POST['r2'];
if(isset($_POST["submit1"]))
  { 

		//echo $_POST['r2'];
		$tid=$_POST['Tid'];
        $bid=$_POST['Bid'];
		$cindate=$_POST['cindate'];
	    $gid=$_POST['Gid'];
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
        $pofstay=$_POST['Pos'];
	    $noofadults=$_POST['noofadults'];
	    $noofchild=$_POST['noofchildren'];
	    $noofday=$_POST['noofday'];
	    $roomtype=$_POST['roomtype'];
		$roomnumber=$_POST['roomnumber'];
	    $roomrate=$_POST['roomrate'];
	    $tax=$_POST['tax'];
		 $tax=$_POST['total'];
	    $model=$_POST['model'];
		$vehicleno=$_POST['vnumber'];
		$vehicletype=$_POST['vtype'];
		$advancepayment=$_POST['advancepayment'];
		
     
		//$q=1;
		
		{
			
	      $qu = 1;
		
		// echo $q;
		 
		if($qu==1)
		 {
	        $insert = "insert into tblcheckin(tid,bid,cindate,gid,roomno,model,vehicleno,vehicletype,advancepayment) values('$tid','$bid','$cindate','$gid',
	          '$roomnumber','$model','$vehicleno','$vehicletype','$advancepayment')";
			 
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