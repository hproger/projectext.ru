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

	        	$myCurl = curl_init();
	        	curl_setopt_array($myCurl, array(
	        	    CURLOPT_URL => 'https://add-groups.com/index.php',
	        	    CURLOPT_RETURNTRANSFER => true,
	        	    CURLOPT_POST => true,
	        	    CURLOPT_POSTFIELDS => http_build_query(array('page' => 'ajax','action' => 'regions','countryId' => 'RU'))
	        	    // action=cities&regionId
	        	));
	        	
	        	$regions = json_decode(curl_exec($myCurl));
	        	
	        	curl_close($myCurl);
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


	
	

	