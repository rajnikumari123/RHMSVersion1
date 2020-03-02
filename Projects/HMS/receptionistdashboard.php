<?php
  session_start();
  if(isset($_SESSION["role"])==false)
  {
		header("location:invalidsession.php");
  }
  //echo $_SESSION["role"];
?>
<html>
<head>
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
  rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" 
  crossorigin="anonymous">
  </head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 10;
  overflow: hidden;
  background-color: rgba(0,0,0,0.2)
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: skyblue;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: rgba(0,0,0,0.1);
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {


  display: block;
}
</style>

<body>

<ul>
  <li><a href="#home"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
  
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn"><i class="fa fa-address-card"></i>Booking</a>
    <div class="dropdown-content">
      <a  onclick= "window.location.href ='http://localhost:85/gbookingform.php';" href="#"> New booking</a>
      <a onclick= "window.location.href ='http://localhost:85/guestdetails.php';" href="#">Edit booking</a>
    </div>
	</li>
	<li class="dropdown">
	<a href="javascript:void(0)" class="dropbtn"><i class="fa fa-user" ></i>Staff info</a>
    <div class="dropdown-content">
      <a  onclick= "window.location.href ='http://localhost:85/staffform.php';" href="#"> New Staff</a>
      <a onclick= "window.location.href ='http://localhost:85/staffDetails.php';" href="#">Edit Staff</a>
    </div>
	</li>
   
	
	<li class="dropdown">
	<a href="javascript:void(0)" class="dropbtn"><i class= "fa fa-check" ></i>check in</a>
    <div class="dropdown-content">
      <a  onclick= "window.location.href ='http://localhost:85/checkinform.php';" href="#"> New check in</a>
      <a onclick= "window.location.href ='http://localhost:85/checkinDetails.php';" href="#">Edit check in</a>
    </div>
	</li>
	
	<li class="dropdown">
	<a href="javascript:void(0)" class="dropbtn"><i class= "fa fa-check" ></i>check out</a>
    <div class="dropdown-content">
      <a  onclick= "window.location.href ='http://localhost:85/checkoutform.php';" href="#"> New check out</a>
      <a onclick= "window.location.href ='http://localhost:85/checkoutDetails.php';" href="#">Edit check out</a>
    </div>
	</li>
	
	
	
     <li class="dropdown">
	<a href="javascript:void(0)" class="dropbtn"><i class="fa fa-user" ></i>guest info</a>
    <div class="dropdown-content">
      <a  onclick= "window.location.href ='http://localhost:85/guestform.php';" href="#"> New guest</a>
      <a onclick= "window.location.href ='http://localhost:85/guestdetails.php';" href="#">Edit guest</a>
    </div>
	</li>
	
	<li onclick= "window.location.href ='http://localhost:85/logOut.php';" ><a href="#home"> 
	<i class="fa fa-bars" aria-hidden="true"></i>Logout</a></li>
	
  </li>
</ul>

</body>
</html>
