<?

// ГЕНЕРАЦИЯ СТРОКИ ИЗ ДАННЫХ ДЛЯ СОЗДАНИЯ ВРЕМЕННЫХ ССЫЛОК
function generateLinks($count = 1, $dateActive = '') {
	$i = 1;
	$currentDate = date('Y-m-d');
	$currentDate = date('Y-m-d', strtotime($currentDate." +".$dateActive." day"));
	
	while ( $i <= $count) {
		$hash = md5(rand(0, PHP_INT_MAX));
		if ($i == 1) {
			$values .= "('".$hash."', '".$currentDate."', false)";
		}
		else {
			$values .= ", ('".$hash."', '".$currentDate."', false)";
		}
	}
	$query = "INSERT INTO `temp_links` (`link`, `last_date`, `active`) VALUES ".$values;
	return $query;
}

 if (isset($_POST['type_links']) && isset($_POST['inputCountLinksExp'])) {
 	$values = "";
 	if ($_POST['type_links'] == 'expert') {
 		$query = generateLinks($_POST['inputCountLinksExp'], $_POST['inputDateActiveLinkExp']);
 		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 		echo json_encode(array('success' => true, $data => 'exp' ));
 	}
 	else if ($_POST['type_links'] == 'volunteer') {
 		$query = generateLinks($_POST['inputCountLinksExp'], $_POST['inputDateActiveLinkVol']);
 		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 		echo json_encode(array('success' => true, $data => 'vol' ));
 	}
 	
 }
 else {
 	echo json_encode(array('success' => false));
 }

 exit;