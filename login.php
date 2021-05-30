
<?php

include "connect.php";

	if(isset($_POST['bottin'])){
		
		$email = ($_POST['email']);
		$parol = ($_POST['parol']);

		// $parol = md5($parol);

		$sql = "SELECT * FROM users WHERE email = '$email' and parol = '$parol'";
		


	if ($result = mysqli_query($connect, $sql)) {
		
		header('location: register.php');
		exit(0);
	} else {
		$_SESSION['message'] = "email/parol combination incorrect";
	}
	}

?>