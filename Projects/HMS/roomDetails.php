<?php
 $con =  new mysqli("localhost","rajni","rajni","RHMS");
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
else{
	
}
?>
<style>
#design td{
height:40px;
width:200px;
text-align:center;
}


</style>

<html>
<head>
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
  rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" 
  crossorigin="anonymous">
  </head>
<body>
<br>
<form method="POST">

  

<br><br>
<form   method="POST" action="">
<table id="design" align="center" border="1px" style="width:400px; line-height:20px;" >
<?php
  $sql="select * from tblroom";
  $result=$con-> query ($sql);
  if($result->num_rows > 0){
	  $i=3;
	while($row =$result->fetch_assoc())
	  //while($row=mysqli_fetch_array($result))
	  {	
		$status = $row['status'];
		//echo $status;
		if($i%3==0){
		  echo "</tr>";
		  echo "<tr>";
		  switch($status)
		  {
			  case 0:
				echo "<td style=background-color:green>" . $row["roomnumber"] .'<i class="fas fa-bed"></i>'; echo "</td>";
				break;
			case 1:
				echo "<td style=background-color:yellow>"; echo $row["roomnumber"] .'<i class="fa fa-bed" aria-hidden="true"></i>'; echo "</td>";
				break;
			case 2:
				echo "<td style=background-color:red>"; echo $row["roomnumber"]; echo "</td>";
				break;
			case 3:
				echo "<td style=background-color:gray>"; echo $row["roomnumber"]; echo "</td>";
				break;
			  default:
				echo "<td>"; echo $row["roomnumber"]; echo "</td>";
		  }
		}
		else
		{
			switch($status)
			{
			case 0:
				echo "<td style=background-color:green>"; echo $row["roomnumber"]. 'hello'; echo "</td>";
				break;
			case 1:
				echo "<td style=background-color:yellow>"; echo $row["roomnumber"].'<i class="fa fa-user"></i>'; echo "</td>";
				break;
			case 2:
				echo "<td style=background-color:red>"; echo $row["roomnumber"]. 'hello'; echo "</td>";
				break;
			case 3:
				echo "<td style=background-color:gray>"; echo $row["roomnumber"]. 'hello'; echo "</td>";
				break;
			  default:
				echo "<td>"; echo $row["roomnumber"] . 'hello'; echo "</td>";
			}
		}
		  $i++;
		  
	  }
	  echo "</table>";
  }
 
?>
	
  
 
  
  </body>
  </html>