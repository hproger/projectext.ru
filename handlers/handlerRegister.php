<?
	require_once('../config.php');

	$pass = md5($_POST['password_reg']);

	if (isset($_POST['profession'])) {
		$query = "INSERT INTO `users` (`first_name`, `last_name`, `middle_name`, `gender`, `birthday`, `profession`, `phone_number`, `password`, `city`, 
		`passport_data`) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['middle_name']."', '".$_POST['gender']."', '".$_POST['birthday']."', '".$_POST['profession']."', '".$_POST['phone_reg']."', '".$pass."', '".$_POST['city']."', '".$_POST['passport_data']."')";
	}
	else {
		$query = "INSERT INTO `users` (`first_name`, `last_name`, `middle_name`, `gender`, `birthday`, `phone_number`, `password`, `city`, 
		`passport_data`) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['middle_name']."', '".$_POST['gender']."', '".$_POST['birthday']."', '".$_POST['phone_reg']."', '".$pass."', '".$_POST['city']."', '".$_POST['passport_data']."')";
	}
	
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

	if($result)
	{
	    
        echo json_encode(array('success' => true)); 
        // очищаем результат
        mysqli_free_result($result);
	}
