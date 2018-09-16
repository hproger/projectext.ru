<?

	if ($requestStr[1]) {
		$query = "SELECT * FROM `temp_links` WHERE `hash` = '".$requestStr[1]."' AND `active` = 0";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		if($result->num_rows)
		{
	        $res = [];
	        while ($row = mysqli_fetch_object($result)) {
	        	$res[] = $row;
	        }

	        $curTime = date('Y-m-d');

	        if (strtotime($curTime) <= strtotime($res[0]->last_date)) {

	        	$regions = getRegions($link);
	        	$type_user = $res[0]->type_link;
	        	$hash = $res[0]->hash;
	        	require_once('/components/'.$requestStr[0].'/reg/index.php');
	        }
	        else {
	        	require_once('/404.php');
	        }
			
	        mysqli_free_result($result);
	        
		}
		else {
			require_once('/404.php');
		}
	}


	
	

	