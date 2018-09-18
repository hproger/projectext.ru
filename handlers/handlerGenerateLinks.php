<?

require_once('../config.php');

// ПОЛУЧЕНИЕ СПИСКА НЕ АКТИВИРОВАННЫХ ВРЕНЕННЫХ ССЫЛОК 
function selectLimitLinks($typeLink, $link) {
	$query2 = "SELECT * FROM `temp_links` WHERE `type_link` = '".$typeLink."'  and `active` = 0 ORDER BY `id` DESC LIMIT 10";
	$result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 

	if ($result2->num_rows) {
		$res = [];
		while ($row = mysqli_fetch_object($result2)) {
			$res[] = $row;
		}
		
	}
	return $res;
}

// ГЕНЕРАЦИЯ СТРОКИ ИЗ ДАННЫХ ДЛЯ СОЗДАНИЯ ВРЕМЕННЫХ ССЫЛОК

function generateLinks($count = 1, $typeLink, $link, $dateActive = '') {
	$i = 1;
	$values = "";
	$currentDate = date('Y-m-d');
	$currentDate = date('Y-m-d', strtotime($currentDate." +".$dateActive." day"));
	
	while ( $i <= $count) {
		$hash = md5(rand(0, PHP_INT_MAX));
		if ($i == 1) {
			$values .= "('".$_SERVER['HTTP_HOST']."/remote/".$hash."', '".$hash."', '".$currentDate."', '".$typeLink."', false)";
		}
		else {
			$values .= ", ('".$_SERVER['HTTP_HOST']."/remote/".$hash."', '".$hash."', '".$currentDate."', '".$typeLink."', false)";
		}
		$i++;
	}

	$query = "INSERT INTO `temp_links` (`link`, `hash`, `last_date`, `type_link`, `active`) VALUES ".$values;
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	
	if ($result) {

		return selectLimitLinks($typeLink, $link);
	}
	else {
		return false;
	}
	
}

if (isset($_POST['linkId']) && isset($_POST['remove'])) {
	$query = "DELETE FROM `temp_links` WHERE `id` = '".$_POST['linkId']."'";
			
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

	if($result)
	{
	       
		echo json_encode(array('success' => true));
	       	        
	}
	exit;
}


 if (isset($_POST['type_links']) && (isset($_POST['inputCountLinksExp']) || isset($_POST['inputCountLinksVol']))) {
 	
 	if ($_POST['type_links'] == 'exp') {
 		$result = generateLinks($_POST['inputCountLinksExp'], $_POST['type_links'], $link, $_POST['inputDateActiveLinkExp']);
 		
 		echo json_encode(array('success' => true, 'data' => $result));
 	}
 	else if ($_POST['type_links'] == 'vol') {
 		$result = generateLinks($_POST['inputCountLinksVol'], $_POST['type_links'], $link, $_POST['inputDateActiveLinkVol']);

 		echo json_encode(array('success' => true, 'data' => $result));
 	}
 	
 }
 else {
 	echo json_encode(array('success' => false));
 }

 exit;