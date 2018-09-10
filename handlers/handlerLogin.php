<?
	require_once('../config.php');

	$pass = md5($_POST['password']);

	$query = "SELECT * FROM `users` WHERE `phone_number` = '".$_POST['phone']."' AND `password` = '".$pass."' AND `type_user` = '".$_POST['type_user']."'";
	
	
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

	if($result->num_rows)
	{
	    
        // очищаем результат
                
        $res = [];
        while ($row = mysqli_fetch_object($result)) {
        	$res[] = $row;
        }
		
		$_SESSION['loggined'] = 1;
		$_SESSION['user'] = $res[0];
		// $_SESSION['user_type'] = $res[0]->profession;
		echo json_encode(array('success' => true, 'data' => $res));
		
        mysqli_free_result($result);
        
        
	}
	else {
		echo json_encode(array('success' => false));
	}
	exit;