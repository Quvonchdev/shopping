<?php
session_start();
$db = mysqli_connect("localhost", "root", "root", "ecommers");
if(isset($_POST['bottin'])){
	
	$email = ($_POST['email']);
	$parol = ($_POST['parol']);

	$parol = md5($parol);
	$sql = "SELECT * FROM users WHERE email = '$email' AND parol = '$parol'";
	$result = mysqli_query($db, $sql);

	if (mysqli_num_rows($result) == 1) {
		$_SESSION['message'] = "You are now logged in";
		$_SESSION['email'] = $email;
		header("location: view.php");
	} else {
		$_SESSION['message'] = "email/parol combination incorrect";
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Kirish</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h1>O'zingizni tasdiqlang</h1>
	</div>

	<?php 
if(isset($_SESSION['message'])){
	echo "<div id='error_msg'".$_SESSION['message']."</div>";
	unset($_SESSION['message']);
}
?>


<form  action="view.php" method="POST" >

<input type="email" name="email" placeholder="Email" required><br><br>
<input type="password" minlength="8" maxlength="16" name="parol" placeholder="Porol" required><br><br>
<button type="submit" name="bottin">Tasdiqlash</button> 
<a href="register.php"><p>Ro'yxatdan o'tish</p></a>
</form>

<style type="text/css">
	body {
		background-color: lightblue;
	}
	form {
		background-color: white;
		width: 300px;
		padding: 60px;
		margin: 0px auto ;
		margin-top: 100px;
		border-top-left-radius: 100px;
		border-bottom-right-radius: 100px;
		text-align: center;
		font-family: cursive;
		font-size: 20px;
		box-shadow: 3px 5px 12px grey;

	}
	form input {
		border: none;
		border-bottom: 2px solid lightblue;
		padding: 6px;
		width: 70%;
		outline: none;
	}
	form button {
		border: none;
		background: linear-gradient(90deg, yellow, green);
		padding: 8px 60px;
		color: white;
		border-radius: 30px;
		font-size: 16px;
	}


</style>
</body>
</html>