<?
	require_once('components/admin/header_admin.php'); 

	// $url = explode('/', substr($_SERVER['REQUEST_URI'], 1));

	if ($requestStr[0] == 'admin' && count($requestStr) == 1) {
		require_once('components/admin/pages/main.php');
	}
	else if ($requestStr[0] == 'admin') {
		require_once('components/admin/pages/'.$requestStr[1].'.php');
	}

 	require_once('components/admin/footer_admin.php');

 	?>