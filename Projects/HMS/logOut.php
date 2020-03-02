<?php
  session_start();
  if(isset($_SESSION["role"]))
  {
	  session_destroy();
	  echo"<script>location.href='index.php'</script>";
		//
		header("location:index.php");
  }
  else
  {
	  echo"<script>location.href='index.php'</script>";
  }
  //echo $_SESSION["role"];
?>