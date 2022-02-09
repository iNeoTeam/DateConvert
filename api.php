<?php
error_reporting(0);
header("content-type: application/json; charset= UTF-8");
$method = $_GET['method']; # shamsi or miladi or ghamari #
$year = $_GET['year']; # 1371 or 1992 or 1412 #
$month = $_GET['month']; # 1 or 4 or 10 #
$day = $_GET['day']; # 21 or 10 or 07 #
function DateConvert($method, $year, $month, $day){
	$data = [
		'method' => $method,
		'year' => $year, 'month' => $month, 'day' => $day
	];
	$cURL = curl_init();
	curl_setopt($cURL, CURLOPT_URL, "https://api.ineo-team.ir/DateConvert.php?".http_build_query($data));
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	$Result = json_decode(curl_exec($cURL), true);
	curl_close($cURL);
	return $Result;
}
echo json_encode(DateConvert($method, $year, $month, $day));
unlink("error_log");
?>
