<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect.php");

$sql = "SELECT * FROM queue_url LIMIT 100";
$result = mysqli_query($con, $sql);

$chs = array();
while($row = mysqli_fetch_assoc($result)) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $row["URL"]);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$chs[] = $ch;	
}

if(count($chs) > 0) {
	$mh = curl_multi_init();
	foreach($chs as $ch) {
		curl_multi_add_handle($mh, $ch);
	}
	
	$active = null;
	//execute the handles
	/*do {
	    $mrc = curl_multi_exec($mh, $active);
	} while ($mrc == CURLM_CALL_MULTI_PERFORM);*/
	
	while ($active && $mrc == CURLM_OK) {
	    if (curl_multi_select($mh) != -1) {
	        do {
	            $mrc = curl_multi_exec($mh, $active);
	        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
	    }
	}
	
	$ress = array();
	foreach($chs as $ch) {
		echo "error: \"" . curl_error($ch) . "\"<br>";
		if(curl_error($ch) == "") {
			$ress[] = curl_multi_getcontent($ch);
		}
		curl_multi_remove_handle($mh, $ch);
		curl_close($ch);
	}
	curl_multi_close($mh);
}

echo "<pre>"; print_r($ress); echo "</pre>";
