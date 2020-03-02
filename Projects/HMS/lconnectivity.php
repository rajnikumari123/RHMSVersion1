<?php
 $con= new mysqli("localhost","rajni","rajni","example");
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
/* echo" Connected successfully";*/
 /* Response.Redirect("http://localhost:81/HMS.html");*/
}

 $name= $_POST["username"];
 $password= $_POST["password"];
 
 $query = "select * from tblloginform where uname='" . $name."' AND pass='" .$password ."'";
 
 echo $query;

 $result = $con->query($query);
 
 $num = mysqli_num_rows($result);

if($num == 1){
	header("Location: homeform.php");
}
else{
 echo" you have entered incorrect password";
}
?>