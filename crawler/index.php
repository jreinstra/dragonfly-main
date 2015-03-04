<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/lib/simplehtmldom/simple_html_dom.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect.php");



$url = urldecode($_GET["url"]);
$parts = parse_url($url);
$baseUrl = $parts["scheme"] . "://" . $parts["host"];

if(preg_match("/www.tradeacacia.com/", $parts["host"]) == 1) {
	$sql = "SELECT docID FROM documents WHERE URL=?";//$url
	$stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($stmt, 's', $url);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
	if(mysqli_stmt_num_rows($stmt) == 0) {
		mysqli_stmt_close($stmt);
		
		$html = file_get_html($url);
		$dom = $html["DOM"];
		$contents = $html["Contents"];
		
		$sql = "INSERT INTO documents (URL) VALUES (?)";//$url
		$stmt = mysqli_prepare($con, $sql);
			mysqli_stmt_bind_param($stmt, 's', $url);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			
		$sql = "SELECT docID FROM documents WHERE URL=?";//$url
		$stmt = mysqli_prepare($con, $sql);
			mysqli_stmt_bind_param($stmt, 's', $url);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $docID);
			mysqli_stmt_fetch($stmt);
			
		//echo "docID: " . $docID . "<br>";
			
		$localfile = fopen($_SERVER["DOCUMENT_ROOT"] . "/documents/" . $docID . ".html", "w") or die("Unable to open file!");
		fwrite($localfile, $contents);
		fclose($localfile);
		
		$chs = array();
		foreach($dom->find('a') as $element) {
			$ch = curl_init();
			
			$href = $element->href;
			if(substr($href, 0, 1) == "/") {
				$href = $baseUrl . $href;
			}
			
			$currentUrl = "http://" . $_SERVER["HTTP_HOST"] . "/crawler/index.php";
			$currentUrl = $currentUrl . "?url=" . urlencode($href);
			//echo "url: " . $currentUrl . "<br>";
			curl_setopt($ch, CURLOPT_URL, $currentUrl);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$chs[] = $ch;
		}
		$mh = curl_multi_init();
		foreach($chs as $ch) {
			curl_multi_add_handle($mh, $ch);
		}
		
		$active = null;
		//execute the handles
		do {
		    $mrc = curl_multi_exec($mh, $active);
		} while ($mrc == CURLM_CALL_MULTI_PERFORM);
		
		while ($active && $mrc == CURLM_OK) {
		    if (curl_multi_select($mh) != -1) {
		        do {
		            $mrc = curl_multi_exec($mh, $active);
		        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
		    }
		}
		
		foreach($chs as $ch) {
			curl_multi_remove_handle($mh, $ch);
		}
		curl_multi_close($mh);
	}
}


?>