
  <?php  
    session_start();
	$con =  new mysqli("localhost","rajni","rajni","RHMS");

	// --------------- Generating Guestid -------------------
	
	$sql = "Select bid from tblbooking order by bid asc";
	 
	$result = $con->query($sql);
	
	$bid = null;
	$gid = null;
	
	if($result -> num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			$bid = $row["bid"];
			//echo $bid;
			
		}
		$bid = substr($bid,1,7);
		$bid = $bid + 1;
		$bid = "B" . $bid;
	}
	else
	{
		$bid = "B" . date("Y") . "001"; 
	}
	
	//----------------------------------------------------------

	//------------------GUEST ID GENERATION----------------------------------------
	$sql = "Select gid from tblguest order by gid asc";
	 
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
	
	//------------------------ ------------------------------
	$fname = null;
	$mname = null;
	$lname = null;
	$gender = null;
	$dob = null;
	$cno = null;
	$email = null;
	$pincode = null;
	$country = null;
	$state = null;
	$city = null;
	$aadhar = null;
	$proname = null;
	
	if(isset($_POST['search']))
	{
		$gid = $_POST['Gid'];
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
	background-color:lightgreen;
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
<form   method="POST" action="">

<table id="tbltable">

<td><td><input type="radio" value="new" name="r2"  checked="checked" onchange="hide_button()" onclick="show()" />NewGuest
<input type="radio" name="r2" value="existing"  onchange="show_button()" onclick="hide()" />Existing  
</td></td>
</table>
<!--<td><td><input type="radio" name="r1" checked="checked">NewGuest
<input type="radio" name="r1" onclick="window.location.href = 'http://localhost:85/bexistdb.php'">Existing</td></td>
</table>-->
<table ><br>
<td>Booking Id<td><input type="text" name="Bid" value="<?php echo $bid;?>"  readonly></td></td>
</table>
<br>
<table>
<td>Guest Id<td><input type="text" id="gid" name="Gid" value="<?php echo $gid;?>" readonly />
 <input type="submit" name="search" id="search" value="search" style="display:none" ></td></td>
</table>
<?php
 $con =  new mysqli("localhost", "rajni", "rajni", "RHMS");	      
if(isset($_POST["search"]))
  {
	 
        
          $con =  new mysqli("localhost", "rajni", "rajni", "RHMS");	
          $gid = $_POST['Gid'];

          $sql =  "SELECT * from tblguest WHERE gid= '$gid'";
          $result = mysqli_query($con, $sql) or die ("QUERY UNSUCCESSFULL.");
		  
		  if(mysqli_num_rows($result)>0){
             while ($row = mysqli_fetch_assoc($result)){
		  
		  $fname = $row["fname"];
	      $mname =  $row["mname"];
		  
	      $lname = $row["lname"];
	      $gender = $row["gender"];
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
?>

<!--<form   method="POST" action="guestsubmit.php">-->
<table   align="center" cellspacing="0" style="width:100%" >

<th id="labels">Guest-info</th><br>
<tr>
 <td >First Name<td><input type="text" name="Fname"  value="<?php echo $fname; ?>" placeholder="First Name" readonly size="22" /></td></td>
 <td>Middle Name<td><input type="text" name="Mname"  value="<?php echo $mname; ?>"placeholder="Middle Name" readonly size="22" /></td></td>
 <td>Last Name<td><input type="text" name="Lname"  value="<?php echo $lname; ?>"placeholder="Last Name" readonly size="22" > </td></td>
 
 
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
			
 <td>DOB<td> <input type="date" name="Dob" value="<?php echo $dob; ?>" readonly id="cd" /></td></td>
 
 
 </td></td>
 <td>Contact-Number<td><input type="text" name="Cno"  value="<?php echo $cno; ?>" readonly size="22" /> </td></td>
 
 
</tr>

<tr>
 <td>E-mail<td><input type="text" name="Email"  value="<?php echo $email; ?>" readonly size="22"  /></td></td>
 <td>Pincode<td><input type="text" name="Pincode"  value="<?php echo $pincode; ?>" readonly size="22" /> </td></td>
 
 
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
 <tr> <td>State<td>
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
				</td>
 
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

 <td>Aadhar-Number<td><input type="text" name="Aadhar" value="<?php echo $aadhar; ?>" readonly size="22"  /></td></td>
 </tr>
 <tr>
 <td>Profession-Name<td>
<input type="text" id = "select" name="Proname"  value="<?php echo $proname; ?>" readonly />
    
 </td></td>
 
 </tr>
 <th id="labels"> Room-info</th>
 <tr>
 <td>Purpose-of-stay<td><input type="text" name="Pofstay" size="22"  /> </td></td>
 
 <td>Number-of-adults<td>
 <select id="select" name="Noofadults"  />
  <option value="1"> <option>
  <option value="2"> 1 </option>
  <option value="3"> 2 </option>
  <option value="4"> 3 </option>
  <option value="5"> 4 </option>
</select>
 </td></td>
 <td>Number-of-childrens<td>
<select id = "select" name="Noofchildren"  />
  <option value="1"> <option>
  <option value="2"> 0 </option>
  <option value="3"> 1 </option>
  <option value="4"> 2 </option>
  <option value="5"> 3 </option>
  <option value="6"> 4 </option>
</select>
 </td></td>
 </tr>
 <tr>
 <td>Number-of-days<td>
 <select id="select" name="Noofday"  />
  <option value="1"> </option>
  <option value="2"> 1 </option>
  <option value="3"> 2 </option>
  <option value="4"> 3 </option>
  <option value="5"> 4 </option>
</select>
 </td></td>
 
 
 <td>Check-in-Date<td><input type="date" name="Checkindate" id="cd" /></td></td>
 
 <td>Room-Type<td>
<select id="select" name="Roomtype"   />
   <option value=""> </option>
   <option value="single-room with AC">single-room with AC</option>
   <option value="single-room but no AC">Single-room but no Ac</option>
</select>
 </td></td>
 
 
 </tr>

 
 <tr>
 <td>Room-rate<td><input type="text" id="Roomrate" name="Roomrate" size="22" onBlur="calculateGST()" /></td></td>
 <td><label id="CGST" for="Tax1"><label id="SGST" for="Tax2"><label id="LblTax" for="Tax">Tax</label><td><input type="text" name="Tax"  id="Tax" size="22"  /> </td></td>
  <td>Total<td><input type="text" name="total" id="total"  size="22"  /> </td></td>
 <!--<td>Total<td><input type="text" name="total" size="22"> </td></td>-->
 </tr>
 </table><br>
 <table align="center">
  <tr><td>
  
<td>

    <!--<input type="submit"  value="Print"id="btn">-->
	<?php
    if($_SESSION["role"]=="admin")
		echo "<input type=button value=Home id=btn onclick=window.location.href='http://localhost:85/adminDashboard.php'>";
	else
		echo "<input type=button value=Home id=btn onclick=window.location.href='http://localhost:85/receptionistdashboard.php'>";
	?>
	<input type="reset" value="Reset" id="btn">
	
    
    <input type="submit" name="submit1" value="Insert" id="btn">

   
 </td></td>
</tr>
</table>
</form>


<script>
	function show_button()
	{
		document.getElementById('search').style.display = "inline";
		
		
	}
	
	function hide_button()
	{
		document.getElementById('search').style.display = "none";
		
	}
</script>
<script>
    function show() {
    document.getElementById("gid").readOnly = true;
    }
	
	 function hide() {
    document.getElementById("gid").readOnly = false;
    }
	
</script>

<?php
	//echo $_POST['r2'];
if(isset($_POST["submit1"]))
  { 

		//echo $_POST['r2'];
		
        $bid=$_POST['Bid'];
	    $gid=$_POST['Gid'];
	    $fname=$_POST['Fname'];
	    $mname=$_POST['Mname'];
	    $lname=$_POST['Lname'];
	    $gender=$_POST['gender'];
	    $dob=$_POST['Dob'];
	    $cno=$_POST['Cno'];
	    $email=$_POST['Email'];
	    $pincode=$_POST['Pincode'];
	   
	   
	    $country=$_POST['Country'];
		 $state=$_POST['State'];
		  $city=$_POST['City'];
	    $aadhar=$_POST['Aadhar'];
	    $proname=$_POST['Proname'];
        $pofstay=$_POST['Pofstay'];
	    $noofadults=$_POST['Noofadults'];
	    $noofchild=$_POST['Noofchildren'];
	    $noofday=$_POST['Noofday'];
	    $cindate=$_POST['Checkindate'];
	    $roomtype=$_POST['Roomtype'];
	    $roomrate=$_POST['Roomrate'];
	    $tax=$_POST['Tax'];
	    $total=$_POST['total'];
     
		$q=1;
		
		if($_POST['r2'] == "new")
		{
		   $ins = "insert into tblguest(gid,fname,mname,lname,gender,dob,cno,email,pincode,country,state,city,aadhar,proname)values
		   ('$gid','$mname','$fname','$lname','$gender','$dob','$cno','$email',
	       '$pincode','$country','$state','$city','$aadhar','$proname')";
	       $q = mysqli_query($con,$ins) or die(mysqli_error($con));
		}
		// echo $q;
		 
		if($q==1)
		 {
	        $insert = "insert into tblbooking(bid,gid,
	           pos,noofadults,noofchild,noofday,cindate,
	           roomtype,roomrate,tax,total) values('$bid','$gid',
	          '$pofstay','$noofadults',
	         '$noofchild','$noofday','$cindate','$roomtype','$roomrate','$tax','$total')";
			 
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
  
?>
<script>

function calculateGST()
{
	alert("Hello");
	var rate;
	var gst;
	var amount = Number(document.getElementById('Roomrate').value);
	if(amount<=7500)
		rate=6;
	else
		rate=9;
	
	gst = amount*rate/100;
	
	
	document.getElementById("LblTax").innerHTML = "Tax(" + rate + "%)";
	document.getElementById("Tax").value = gst;
	document.getElementById("total").value = amount + gst;
}
</script>
</body>
</html>
