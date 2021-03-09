<?php
$con=mysqli_connect('localhost','root','','bank');

if ($con->connect_error) {
	
  die("Connection failed: " . $con->connect_error);
}





$query='select * from customer';
$res=mysqli_query($con,$query);
$q=mysqli_num_rows($res);
?>
<center>
	<?php
if ($q > 0) {
  // output data of each row

echo "<table ><tr><th>ID</th><th>Name</th><th>current_bal</th></tr>";
  // output data of each row
  while($row = $res->fetch_assoc()) {
    echo "<tr><td>".$row["email"]."</td><td>".$row["name"]."</td><td>".$row["currentbal"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}


?>
</center>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="index.php"><button>home</button></a>
</body>
</html>
