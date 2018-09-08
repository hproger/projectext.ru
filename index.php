<?

	require_once('config.php');
	

	function getCities($cityId) {
		$myCurl = curl_init();
		curl_setopt_array($myCurl, array(
		    CURLOPT_URL => 'https://add-groups.com/index.php',
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => http_build_query(array('page' => 'ajax','action' => 'cities','regionId' => $cityId))
		    // action=cities&regionId
		));
		$cities = curl_exec($myCurl);
		curl_close($myCurl);
		echo $cities;
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
		getCities($_POST['getCities']);
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
	require_once('header.php');

	// print_r($_SERVER['REQUEST_URI']);
	
	if (!isset($_SESSION['loggined'])) {
		if ($requestStr[0] == 'admin') {
			require_once('components/'.$requestStr[0].'/index.php');
		}
		else if ($requestStr[0] == 'remote') {
			require_once('components/'.$requestStr[0].'/index.php');
		}
		else {
			require_once('components/auth/index.php');
		}
		
	}
	else {

		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']->type_user == 'stud') {
				require_once('components/pages/student/index.php');
			}
			else if ($_SESSION['user']->type_user == 'exp' || $_SESSION['user']->type_user == 'vol'){
				require_once('components/pages/expvol/index.php');
			}
		}

		// if ($requestStr) {
			

		// 	if (!isset($_SESSION['loggined'])) {
		// 		require_once('components/auth/index.php');
		// 	}
		// 	else {
		// 		if ( (count($requestStr) == 1) && file_exists('components/'.$requestStr[0].'/index.php')) {
					
		// 			require_once('components/'.$requestStr[0].'/index.php');
		// 		}
		// 		else if ((count($requestStr) > 1) && file_exists('components/'.$requestStr[0].'/'.$requestStr[1].'/index.php')) {
		// 			require_once('components/'.$requestStr[0].'/'.$requestStr[1].'/index.php');
		// 		}
		// 		else {
		// 			require_once('404.php');
		// 		}
		// 	}
		// }
		// else {
		// 	if (isset($_SESSION['user'])) {
		// 		if ($_SESSION['user']->type_user == 'stud') {
		// 			require_once('components/pages/student/index.php');
		// 		}
		// 		else if ($_SESSION['user']->type_user == 'exp'){
		// 			require_once('components/pages/expert/index.php');
		// 		}
		// 		else if ($_SESSION['user']->type_user == 'vol') {
		// 			require_once('components/pages/volunteer/index.php');
		// 		}
		// 	}
		// }
	}

	
	
	

	

	require_once('footer.php');