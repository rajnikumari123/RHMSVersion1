<?php
  $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	
}
 
  $deleteid = $_GET['BID'];
   $query=mysqli_query($con,"delete from tblbooking where bid='{$deleteid}'") or die(mysqli_error());
  //echo $deleteid;
  header("location:bookingdetails.php");
?>