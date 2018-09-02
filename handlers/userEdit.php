<?
	require_once('../config.php');

	if (isset($_POST['save'])) {
		$query = "UPDATE `users` SET `last_name` = '".$_POST['last_name']."', `first_name` = '".$_POST['first_name']."', `middle_name` = '".$_POST['middle_name']."', `gender` = '".$_POST['gender']."', `birthday` = '".$_POST['birthday']."', `profession` = '".$_POST['profession']."', `phone_number` = '".$_POST['phone_number']."', `city` = '".$_POST['city']."', `passport_data` = '".$_POST['passport_data']."' WHERE `id` = '".$_POST['user_id']."'";
		
		
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

		if($result)
		{
	        
			echo json_encode(array('success' => true));
	        	        
		}
	}
	else if (isset($_POST['remove'])) {
		$query = "DELETE FROM `users` WHERE `id` = '".$_POST['userId']."'";
				
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

		if($result)
		{
		       
			echo json_encode(array('success' => true));
		       	        
		}
	}
	else {
		$query = "SELECT * FROM `users` WHERE `id` = '".$_POST['userId']."'";
		
		
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

		if($result)
		{
	        $res = [];
	        while ($row = mysqli_fetch_object($result)) {
	        	$res[] = $row;
	        }
			if (count($res)) {
				echo json_encode(array('success' => true, 'data' => $res));
			}
	        mysqli_free_result($result);
	        
	        
		}
	}
	exit;