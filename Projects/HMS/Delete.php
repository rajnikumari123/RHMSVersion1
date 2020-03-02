<?php
  $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	
}
 
  $deleteid = $_GET['GID'];
   $query=mysqli_query($con,"delete from tblguest where gid='{$deleteid}'") or die(mysqli_error($con));
  
  header("location:guestdetails.php");
?>