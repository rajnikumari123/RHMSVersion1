<?php
 $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
else{
	
}
?>
<html>
<body>
<br><br>
<table align="center" border="2px" style="width:600px; line-height:20px; border-collapse: collapse;"  >

<tr>
<th colspan="30" style="text-align:center"><h3>Checkout Details</h3></th>
</tr>
<tr>
 <th>TID</th>
 <th>Check_out_date</th>
 <th>Nettotal</th>
 <th>Amount_paid</th>
 <th>Amount_refund</th>
 <th>Payment_mode</th> 
 
 
 </tr>
 <?php
 
  $sql="select * from tblcheckout";
  $result=$con-> query ($sql);
  if($result->num_rows > 0){
	while($row =$result->fetch_assoc())
	  //while($row=mysqli_fetch_array($result))
	  {
		
		  echo "<tr>";
		   echo "<td>"; echo $row["tid"]; echo "</td>";
		  echo "<td>"; echo $row["coutdate"]; echo "</td>";
		 
		  echo "<td>"; echo $row["nettotal"]; echo "</td>";
		  echo "<td>"; echo $row["amountpaid"]; echo "</td>";
		  echo "<td>"; echo $row["amountrefund"]; echo "</td>";
		  echo "<td>"; echo $row["paymentmode"]; echo "</td>";
		  
		  echo "</tr>";
	  }
	  echo "</table>";
  }
?>
</body>
</html>