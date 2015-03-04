<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/mysql/connect.php");

$sql = "SELECT * FROM queue_url LIMIT 100; ";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
if(mysqli_num_rows($result) < 1) die();

$urls = array();
for($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
	$urls[] = $row["URL"];
}

$get = new ParallelGet($urls);
$res = $get->getResult();

foreach($res as $i=>$contents) {
	$sql = "DELETE FROM queue_url WHERE URL=?";
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
		mysqli_stmt_bind_param($stmt, 's', $urls[$i]) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_close($stmt);
	$docID = getDocID($urls[$i]);
	
	$parts = parse_url($urls[$i]);
	$baseUrl = $parts["scheme"] . "://" . $parts["host"];
	
	$localfile = fopen($_SERVER["DOCUMENT_ROOT"] . "/documents/" . $docID . ".html", "w") or die("Unable to open file!");
	fwrite($localfile, $contents);
	fclose($localfile);
	$sql = "DELETE FROM queue_document WHERE docID=?";//$docID
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($stmt));
		mysqli_stmt_bind_param($stmt, 'i', $docID) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_close($stmt);
		
	$sql = "INSERT INTO queue_document (docID, siteID, BaseURL) VALUES (?, 1, ?)";
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($stmt));
		mysqli_stmt_bind_param($stmt, 'is', $docID, $baseUrl) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_close($stmt);
}


function getDocID($url) {
	$con = $GLOBALS["con"];
	
	$sql = "SELECT docID FROM documents WHERE URL=?";
	$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
		mysqli_stmt_bind_param($stmt, 's', $url) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
		mysqli_stmt_store_result($stmt);
	if(mysqli_stmt_num_rows($stmt) < 1) {
		mysqli_stmt_close($stmt);
		
		$sql = "INSERT INTO documents (URL) VALUES (?)";
		$stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
			mysqli_stmt_bind_param($stmt, 's', $url) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
			mysqli_stmt_bind_result($stmt, $docID);
			mysqli_stmt_fetch($stmt);
		return getDocID($url);
	}
	else {
		mysqli_stmt_bind_result($stmt, $docID);
		mysqli_stmt_fetch($stmt);
		return $docID;
	}
}

// Class to run parallel GET requests and return the transfer
class ParallelGet
{
	private $res = null;
	
  function __construct($urls)
  {
    // Create get requests for each URL
    $mh = curl_multi_init();
    foreach($urls as $i => $url)
    {
      $ch[$i] = curl_init($url);
      curl_setopt($ch[$i], CURLOPT_RETURNTRANSFER, 1);
      curl_multi_add_handle($mh, $ch[$i]);
    }
    // Start performing the request
    do {
        $execReturnValue = curl_multi_exec($mh, $runningHandles);
    } while ($execReturnValue == CURLM_CALL_MULTI_PERFORM);
    // Loop and continue processing the request
    while ($runningHandles && $execReturnValue == CURLM_OK) {
      // Wait forever for network
      $numberReady = curl_multi_select($mh);
      if ($numberReady != -1) {
        // Pull in any new data, or at least handle timeouts
        do {
          $execReturnValue = curl_multi_exec($mh, $runningHandles);
        } while ($execReturnValue == CURLM_CALL_MULTI_PERFORM);
      }
    }

    // Check for any errors
    if ($execReturnValue != CURLM_OK) {
      //trigger_error("Curl multi read error $execReturnValue\n", E_USER_WARNING);
    }

    // Extract the content
    foreach($urls as $i => $url)
    {
      // Check for errors
      $curlError = curl_error($ch[$i]);
      if($curlError == "") {
        $res[$i] = curl_multi_getcontent($ch[$i]);
      } else {
        //print "Curl error on handle $i: $curlError\n";
      }
      // Remove and close the handle
      curl_multi_remove_handle($mh, $ch[$i]);
      curl_close($ch[$i]);
    }
    // Clean up the curl_multi handle
    curl_multi_close($mh);
    
    // Print the response data
    $this->res = $res;
  }

	function getResult() {
		return $this->res;
	}

}

?>