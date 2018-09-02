<?
	require_once('config.php');
	
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

	if (isset($_POST['logout'])) {
		if ($_POST['logout'] == 'user') {
			clearSessionUser();
		}
		else if ($_POST['logout'] == 'admin') {
			clearSessionAdmin();
		}
	}

	$str = preg_replace("#/$#", "", substr($_SERVER['REQUEST_URI'], 1));

	require_once('header.php');

	// print_r($_SERVER['REQUEST_URI']);

	$requestStr = explode('/', $str);

	// print_r($requestStr);

	
	if (file_exists('components/'.$requestStr[0].'/index.php')) {
		// print_r($requestStr[0]);
		require_once('components/'.$requestStr[0].'/index.php');
	}
	else {
		if (!isset($_SESSION['loggined'])) {
			require_once('components/auth/index.php');
		}
		else {

			if (isset($_SESSION['user'])) {
				if ($_SESSION['user']->profession) {
					require_once('components/pages/expert/index.php');
				}
				else {
					require_once('components/pages/student/index.php');
				}
			}
		}
	}

	

	require_once('footer.php');