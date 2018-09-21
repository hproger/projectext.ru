<?

	require_once($ROOTDIR.'/header_in.php');

	if (($requestStr[0] == 'pages' && isset($requestStr[1]) == 'expvol' && count($requestStr) == 1) || $activeLink == '') {
		require_once($ROOTDIR.'/components/pages/expvol/main.php');
	}
	else if ($requestStr[0] == 'pages' && isset($requestStr[2])) {
		require_once($ROOTDIR.'/components/pages/expvol/'.$requestStr[2].'.php');
	}
	else {
		require_once($ROOTDIR.'/404.php');
	}
	require_once($ROOTDIR.'/footer_in.php');

 ?>