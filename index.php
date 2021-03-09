
<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<center>
	<a href="showall.php"><button>show all customers</button></a>
	</center>
	<form action="">
		<center>

			view one customer
			<input type="email" name="email">
			<input type="submit" name="s">
		</center>
	</form>
	<a href="transfer.php"><button>
		transfer
	</button>
	</a>
</body>
</html>


<?php
$con=mysqli_connect('localhost','root','','bank');
if(isset($_REQUEST['s']))
{
 $email=$_REQUEST['email'];
if($email=="" )
 {
 		echo "field cannot be empty";
 	header("location:show_1.php?msg=Please enter details***");
 }
 else
 {
 	$_SESSION['email']=$email;
  	$query1="select * from customer where email='$email' ";
  
  	$query2=mysqli_query($con,$query1);
  	$q=mysqli_num_rows($query2);
 	if($q>0)
 	{
 		header("location:show_1.php?");

 			/*echo " < table ><tr><th>ID</th><th>Name</th><th>current_bal</th></tr>";
  // output data of each row
  while($row = $query2->fetch_assoc()) {
    echo "<tr><td>".$row["email"]."</td><td>".$row["name"]."</td><td>".$row["currentbal"]."</td></tr>";
  }
  echo "</table>";*/
 		
 		/*header("location:show_1.php?msg=welcome");*/
 		//$_SESSION['email']=$email;
 	}
 	else
 	{
 		header("location:index.php?msg= wrong id and password");
 	}
  }





}
?>