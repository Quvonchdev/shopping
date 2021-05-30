<?php
	include "connect.php";
	
	if (isset($_POST['bottin'])){
		if (empty($_POST['ism'])){
			echo "Ism po'lya bo'sh bo'lmasligi kerak";
			die();
		} else {
			$ism = $_POST['ism'];
			if (!preg_match("/^[a-zA-Z]*$/", $ism)){
				echo "Ism polyaga faqatgina a-zA-Z gacha hariflar ishlatiladi";
				die();
			}
		}


		if (empty($_POST['familya'])){
			echo "familya po'lya bo'sh bo'lmasligi kerak";
			die();
		} else {
			$familya = $_POST['familya'];
			if (!preg_match("/^[a-zA-Z]*$/", $familya)){
				echo "familya polyaga faqatgina a-zA-Z gacha hariflar ishlatiladi";
				die();
			}
		}


		if (empty($_POST['email'])){
			echo "email po'lya bo'sh bo'lmasligi kerak";
			die();
		} else {
			$email = $_POST['email'];
			if (!preg_match("/^[a-zA-Z0-9.@]*$/", $email)){
				echo "email polyaga faqatgina a-zA-Z gacha hariflar ishlatiladi";
				die();
			}
		}



		if (empty($_POST['parol'])){
			echo "parol po'lya bo'sh bo'lmasligi kerak";
			die();
		} else {
			$parol = $_POST['parol'];
			
			if (!preg_match("/^[a-zA-Z0-9]*$/", $parol)){
				echo "parol polyaga faqatgina a-zA-Z gacha hariflar ishlatiladi";
				die();
			}
		}

		$sql2 = "SELECT * FROM users WHERE ism = '$ism'";
		$result2 = mysqli_query($connect, $sql2);
		$conn = mysqli_fetch_assoc($result2);

		if ($conn){
			echo "bunday yusername saqlangan boshqa username kiriting";
			die();
		} else {
			$pass = md5($parol);
			$sql = "INSERT INTO users (ism, familya, email, parol) VALUES ('$ism', '$familya', '$email', '$pass')";

			$result = mysqli_query($connect, $sql);
			if ($result) {
			
			header('location: login.php');
		}
		}
		
		 
	}


?>