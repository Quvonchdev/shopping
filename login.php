
<?php

include "connect.php";

	if(isset($_POST['bottin'])){
		
		$email = ($_POST['email']);
		$parol = ($_POST['parol']);

		// $parol = md5($parol);

		$sql = "SELECT * FROM users WHERE email = '$email' and parol = '$parol'";
		
		$result = mysqli_query($connect, $sql);

	if ($result) {
		$sql2 = "SELECT * FROM users WHERE email = '$email' and parol = '$parol'";
		$result2 = mysqli_query($connect, $sql2);
		$a = mysqli_fetch_assoc($result2);
		echo "malumot chiqdi ". $a['ism'];
		
	} else {
		echo "malumot yoq";
	}
	}

?>