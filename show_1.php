
<?php

session_start();
$con=mysqli_connect('localhost','root','','bank');
if(isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
		$query1="select * from customer where email='$email' ";
  
  	$query2=mysqli_query($con,$query1);
  	$q=mysqli_num_rows($query2);
 	if($q>0)
 	{
 		

 			echo "<table><tr><th>ID</th><th>Name</th><th>current_bal</th></tr>";
  // output data of each row
  while($row = $query2->fetch_assoc()) {
    echo "<tr><td>".$row["email"]."</td><td>".$row["name"]."</td><td>".$row["currentbal"]."</td></tr>";
  }
  echo "</table>";
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="index.php"><button>home</button></a>
	<a href="transfer.php"><button>transfer history</button></a>
		<center> <?php echo @$_GET['msg'];  ?></center>
		<h1>transfer money if you want</h1>
<form>
	email of reciever
	<input type="email" name="email_r">
	amout
	<input id="number" type="number" name="no">

	<input type="submit" name="ss">
</form>
<a href="showall.php"><button>show all</button></a>
</body>
</html>

<?php

if(isset($_SESSION['email']))
{
	$x=$_SESSION['email'];
	/*echo $x."<br>";*/
	if(isset($_REQUEST['ss']))
	{

		$reciever=$_REQUEST['email_r'];
		echo $reciever."<br>";
		$emailcheck="select * from customer where email='$reciever'";
		$E=mysqli_query($con,$emailcheck);
		$ress=mysqli_num_rows($E);
		if($ress>0)
		{
		$amount=$_REQUEST['no'];

		/*echo $amount."<br>";*/
		$price = mysqli_query($con,"SELECT currentbal from customer WHERE email = '$x'");
		$result = mysqli_fetch_array($price);
		/*echo $result['currentbal'];*/
		$amount_of_sender=$result['currentbal'];
		$price2= mysqli_query($con,"SELECT currentbal from customer WHERE email = '$reciever'");
		$result2=mysqli_fetch_array($price2);
		/*echo $result2['currentbal'];*/
		$amount_of_reciever= $result2['currentbal'];
				if($amount>$amount_of_sender)
				{

		
					header("location:show_1.php?msg= you dont have sufficient balance ");
				}
				else
				{
					$transfer="insert into transfers(transferby, transferto, amounttransfer) value('$x','$reciever','$amount')";
					$tt=mysqli_query($con,$transfer);
					echo "kaam chalu che";
					$amount_recieved=$amount_of_reciever+$amount;
					$amount_reduced=$amount_of_sender-$amount;
					$update_query1="update customer set currentbal='$amount_recieved' where  email='$reciever'  ";
					$res=mysqli_query($con,$update_query1);
					$update_query2="update customer set currentbal='$amount_reduced' where  email='$x'";
					$res2=mysqli_query($con,$update_query2);
		
				}
		}
		else
		{
			echo "email not exixt";
		}
	}

}
?>