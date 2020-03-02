<?php
  $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	
}
 
  $deleteid = $_GET['TID'];
   $query=mysqli_query($con,"delete from tblcheckin where tid='{$deleteid}'") or die(mysqli_error());
  //echo $deleteid;
  header("location:checkinDetails.php");
?>