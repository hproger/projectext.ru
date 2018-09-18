<?

	require_once('header_in.php');

	if (($requestStr[0] == 'pages' && isset($requestStr[1]) == 'expvol' && count($requestStr) == 1) || $activeLink == '') {
		require_once('components/pages/expvol/main.php');
	}
	else if ($requestStr[0] == 'pages' && isset($requestStr[2])) {
		require_once('components/pages/expvol/'.$requestStr[2].'.php');
	}
	else {
		require_once('404.php');
	}
	require_once('footer_in.php');

 ?>