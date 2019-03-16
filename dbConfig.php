<?php
$con=mysqli_connect("localhost","root","qwerty","project1");
// Check connection
if ($con)
  {
  	echo"connection done";
  }
  else{
  die("Connection error: " . mysqli_connect_error());
  }
?>