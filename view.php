<?php 
session_start();
$db = mysqli_connect("localhost", "root", "root", "ecommers");
if(isset($_POST['bottin'])){
	session_start();
	$username = ($_POST['username']);
	$email = ($_POST['email']);
	$password = ($_POST['password']);
	$password2 =($_POST['password2']);

	if($password == $password2){
		$password = md5($password);
		$sql = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $sql);
		$_SESSION['message'] = "You are now loggid in";
		$_SESSION['username'] = $username;
		header("location: home.php");
	} else {
		$_SESSION['message'] = "the two passwords do not match";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ro'yxatdan o'tish oynasi</title>
</head>
<body>
<form  action="login.php" method="POST" >
<input type="text" name="ism" placeholder="Ism" maxlength="15" minlength="4" required>
<br><br>
<input type="text" name="familya" placeholder="Familya" maxlength="18" minlength="4" required>
<br><br>
<input type="email" name="email" placeholder="Email" required><br><br>
<input type="password" minlength="8" maxlength="16" name="parol" placeholder="Porol" required><br><br>
<input type="password" minlength="8" maxlength="16" name="parol" placeholder="Porolni takrrlang" required><br><br>
<button type="submit" name="bottin">Jo'natish</button> 
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
 
