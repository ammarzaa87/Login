<?php
	
	include("connection.php");

	if(isset($_POST["name"]) && $_POST["name"] != ""){
		$name = $_POST["name"];
	}else{
		die("Don't try to mess around bro ;)");
	}
	if(isset($_POST["email"]) && $_POST["email"] != ""){
		$email = $_POST['email'];
	}else{
		die("Don't try to mess around bro ;)");
	}
	if(isset($_POST["password"]) && $_POST["password"] != ""){
		$password = hash('sha256', $_POST['password']);
	}else{
		die("Don't try to mess around bro ;)");
	}
	if(isset($_POST["gender"]) && $_POST["gender"] != ""){
		$gender = $_POST['gender'];
	}else{
		die("Don't try to mess around bro ;)");
	}
	
	$x = $connection->prepare("INSERT INTO users (name,email, password,gender) VALUES (?, ?, ?,?)");
	$x->bind_param("ssss",$name, $email, $password,$gender);
	$x->execute();
	
	$x->close();
	$connection->close();
	header("Location:index.html");

?>