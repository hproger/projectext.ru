<?
	require_once('../config.php');

	$pass = md5($_POST['password_reg']);

	if (isset($_POST['profession'])) {
		$query = "INSERT INTO `users` (`first_name`, `last_name`, `middle_name`, `gender`, `birthday`, `profession`, `phone_number`, `password`, `city`, 
		`passport_data`, `type_user`) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['middle_name']."', '".$_POST['gender']."', '".$_POST['birthday']."', '".$_POST['profession']."', '".$_POST['phone_reg']."', '".$pass."', '".$_POST['region'].",".$_POST['city']."', '".$_POST['passport_data']."', '".$_POST['type_user']."')";
	}
	else {
		$query = "INSERT INTO `users` (`first_name`, `last_name`, `middle_name`, `gender`, `birthday`, `phone_number`, `password`, `city`, 
		`passport_data`, `type_user`) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['middle_name']."', '".$_POST['gender']."', '".$_POST['birthday']."', '".$_POST['phone_reg']."', '".$pass."', '".$_POST['region'].",".$_POST['city']."', '".$_POST['passport_data']."', '".$_POST['type_user']."')";
	}
	
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

	if($result && isset($_POST['hash']))
	{
		$query2 = "UPDATE `temp_links` SET `active` = 1 WHERE `hash` = '".$_POST['hash']."'";
		$result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
		
	    echo json_encode(array('success' => true));
	}
	exit;
