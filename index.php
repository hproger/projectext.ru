<?

	require_once('config.php');
	
	$ROOTDIR = $_SERVER['DOCUMENT_ROOT'];

	function getRegions($link) {
		$query = "SELECT * FROM `regions` ";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		if($result->num_rows)
		{
		    
	        // очищаем результат
	                
	        $regions = [];
	        while ($row = mysqli_fetch_object($result)) {
	        	$regions[] = $row;
	        }
	    }
		return $regions;
	}

	function getCities($link,$regionId, $php = false) {
		$query = "SELECT * FROM `cities` WHERE `region_id` = $regionId";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		if($result->num_rows)
		{
		    
	        // очищаем результат
	                
	        $cities = [];
	        while ($row = mysqli_fetch_object($result)) {
	        	$cities[] = $row;
	        }
	    }
	    if ($php) {
	    	return $cities;
	    }
	    else {
	    	echo json_encode($cities);
	    }
		
	}

	function clearSessionUser () {
		unset($_SESSION['loggined']);
		unset($_SESSION['user']);
		
		echo json_encode(array('success' => true));
		exit;
	}
	
	function clearSessionAdmin () {
		unset($_SESSION['admin']);
		unset($_SESSION['user']);
		
		echo json_encode(array('success' => true));
		exit;
	}


	if (isset($_POST['getCities'])) {
		getCities($link, $_POST['getCities']);
		exit;
	}



	if (isset($_POST['logout'])) {
		if ($_POST['logout'] == 'user') {
			clearSessionUser();
		}
		else if ($_POST['logout'] == 'admin') {
			clearSessionAdmin();
		}
	}

	$str = preg_replace("#/$#", "", substr($_SERVER['REQUEST_URI'], 1));
	$requestStr = explode('/', $str);
	require_once($ROOTDIR.'/header.php');

	// print_r($_SERVER['REQUEST_URI']);
	
	if (!isset($_SESSION['loggined'])) {
		if ($requestStr[0] == 'admin') {
			require_once($ROOTDIR.'/components/'.$requestStr[0].'/index.php');
		}
		else if ($requestStr[0] == 'remote') {
			require_once($ROOTDIR.'/components/'.$requestStr[0].'/index.php');
		}
		else {
			if ( $str && $requestStr[1] == 'auth' && $requestStr[2]) {
				require_once($ROOTDIR.'/components/auth/'.$requestStr[2].'.php');
			}
			else {
				require_once($ROOTDIR.'/components/auth/index.php');
			}
			
		}
		
	}
	else {

		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']->type_user == 'stud') {
				require_once($ROOTDIR.'/components/pages/student/index.php');
			}
			else if ($_SESSION['user']->type_user == 'exp' || $_SESSION['user']->type_user == 'vol'){
				require_once($ROOTDIR.'/components/pages/expvol/index.php');
			}
		}

	}

	
	
	

	

	require_once('footer.php');