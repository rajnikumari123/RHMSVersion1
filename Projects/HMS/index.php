<?php session_start();?>
<html>
<head>
  <title></title>
  <style type = "text/css">
body{
   background-image:url(images/hotelpicc.jpg);
   background-size: cover;
   background-attachment:fixed;
}
.Loginform{
   width: 250px;
   height: 230px;
   background-color:rgba(0,0,0,0.5);
   margin: 0 auto;
   margin-top: 100px;
   padding-top: 10px;
   padding-left: 50px;
   border-radius: 15px;
   -webkit-border-radius:15px;
   color:white;
   font-weight: bolder;
 }
.Loginform input[type="text"]{
    width:200px;
    height:35px;
    border:0;
    border-radius:5px;
    -webkit-border-radius:5px;
 }
.Loginform input[type="password"]{
    width:200px;
    height:35px;
    border:0;
    border-radius:5px;
    -webkit-border-radius:5px;
 }
.Loginform[type="submit"]{
    width:100px;
    height:35px;
    border:0;
    border-radius:5px;
    -webkit-border-radius:5px;
    background-color:skyblue;
                       

</style>
</head>

<body>
  <div class = "Loginform">
  <h2>Login</h2>
<!--<form method="POST" action="lconnectivity.php" >-->
<form method="POST">

   <input type="text" name="username" placeholder="username..."><br><br>
   <input type="password" name="password" placeholder="password"><br><br>
   
  <input type="submit" name="submit" value="Login">
  </form>
  </body>
</html>
<?php
$con=new mysqli("localhost","rajni","rajni","rhms");

if(!$con)
{
	echo"unable to connect".mysqli_error();
}
//echo "till here it is ok...";

if(isset($_POST["submit"]))
{
	//echo "till here it is ok...";
    $uname=$_POST['username'];
	$pass=$_POST['password'];
	$type="admin";
	$typeA="receptionist";
	$query="select * from tbllogin where uname='$uname' and pass='$pass' and role='admin'";
	$queryA="select * from tbllogin where uname='$uname' and pass='$pass' and role='$typeA'";
	
	
	$result=mysqli_query($con,$query);
	$num = mysqli_num_rows($result);
	
	$resultA=mysqli_query($con,$queryA);
	$numA = mysqli_num_rows($resultA);
	
	
	//echo "till here it is ok...";
	 //while($row=mysqli_fetch_assoc($result)>0)
	 //{
		// echo "till here it is ok...";
		 //header("Location:homeform.php");
		 //echo $row["role"];
		if($num==1){
			$_SESSION["role"] = "admin";
             header("Location:adminDashboard.php");
		}
       elseif($numA==1){
		   $_SESSION["role"] = "receptionist";
         header("Location:receptionistdashboard.php");
	  }
	 //}
}
else
{
	echo mysqli_error($con);
}
?>