<?php

require_once('connection.php');

$email = $_POST['email'];
$password = hash('sha256', $_POST['password']);
$x = $connection->prepare("SELECT * FROM users WHERE email=? AND password=?");
$x->bind_param("ss", $email, $password);
$x->execute();
$result = $x->get_result();
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$name = $row["name"];
		$gender = $row["gender"];
		session_start();
		$_SESSION['name'] = $name;
		$_SESSION['gender'] = $gender;
	}
	header("Location: welcome.php");
}
else
{
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form">
	<span class="login100-form-title">
						<?php echo "Invalid Email or Password,\n"; 
						
						echo "Please Try Again After 5 Seconds\n";
						?>
						<h4>Redirecting ...</h4>
							<i class="fa fa-refresh" ></i>
						
						
						<?php
						header( "refresh:5;url=index.html" );
						?>
	</span>
	
		</div>
				</form>
			</div>
		</div>
		
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>				
	<?php
}
?>

