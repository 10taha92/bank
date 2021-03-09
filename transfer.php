<?php

session_start();
$con=mysqli_connect('localhost','root','','bank');
if(isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
		$query1="select * from transfers where transferby='$email' or transferto='$email' ";
  
  	$query2=mysqli_query($con,$query1);
  	$q=mysqli_num_rows($query2);
 	if($q>0)
 	{
 		

 			echo "<table><tr><th>transferby</th><th>transferto</th><th>amount</th><th>lastUpadted</th></tr>";
  // output data of each row
  while($row = $query2->fetch_assoc()) {
    echo "<tr><td>".$row["transferto"]."</td><td>".$row["transferby"]."</td><td>".$row["amounttransfer"]."</td><td>".$row["lastUpdated"]."</td></tr>";
  }
  echo "</table>";
}
}