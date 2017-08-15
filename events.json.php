<?php
try{
	include 'BDconection.php';
	
// 	$out = array();
	
// 	$start = 2011-01-07;
// 	$end = 2030-01-07;
	
// 	$strSQL  = "SELECT * FROM events WHERE `datetime` BETWEEN '".date('Y-m-d', $start)."' and '".date('Y-m-d', $end)."'";
 	// $query = mysql_query($strSQL);
	
	// $res = $db->query("SELECT * FROM events ");

	$stmt = $db->prepare("SELECT * FROM events ");
	$stmt->execute();
	$result = $stmt->fetchAll();

	
	// print_r($result);
	
	foreach($result as $row){
		$start = new DateTime($row['datetime'], new DateTimeZone(date_default_timezone_get()));
		$end = new DateTime($row['datetime_end'], new DateTimeZone(date_default_timezone_get()));
		$out[] = array(
				'id' => $row['id'],
				'title' => $row['title'],
				'url' => $row['url'],
				'class' => $row['class'],
// 				'body' => $row['body'],
// 				'class' => $row['class'],
				'start' => $start->format('U')*1000,
				'end' => $end->format('U')*1000
		);
	}
	
	echo json_encode(array('success' => 1, 'result' => $out));
}catch(Exception $e) {
	print_r($e);
}
exit;
?>
<!-- echo json_encode(array('success' => 1, 'result' => $out)); -->
<!-- exit; -->

// {
// 	"success": 1,
// 	"result": [
// 		{
// 			"id": "293",
// 			"title": "This is warning class event with very long title to check how it fits to evet in day view",
// 			"class": "event-warning",
// 			"start": "1499049960429",
// 			"end":   "1499049960429"
// 		},
// 		{
// 			"id": "256",
// 			"title": "Event that ends on timeline",
// 			"url": "http://www.example.com/",
// 			"class": "event-warning",
// 			"start": "1363155300000",
// 			"end":   "1363227600000"
// 		},
// 		{
// 			"id": "276",
// 			"title": "Short day event",
// 			"url": "http://www.example.com/",
// 			"class": "event-success",
// 			"start": "1363245600000",
// 			"end":   "1363252200000"
// 		},
// 		{
// 			"id": "294",
// 			"title": "This is information class ",
// 			"url": "http://www.example.com/",
// 			"class": "event-info",
// 			"start": "1363111200000",
// 			"end":   "1363284086400"
// 		},
// 		{
// 			"id": "297",
// 			"title": "This is success event",
// 			"url": "http://www.example.com/",
// 			"class": "event-success",
// 			"start": "1363234500000",
// 			"end":   "1363284062400"
// 		},
// 		{
// 			"id": "54",
// 			"title": "This is simple event",
// 			"url": "http://www.example.com/",
// 			"class": "",
// 			"start": "1363712400000",
// 			"end":   "1363716086400"
// 		},
// 		{
// 			"id": "532",
// 			"title": "This is inverse event",
// 			"url": "http://www.example.com/",
// 			"class": "event-inverse",
// 			"start": "1364407200000",
// 			"end":   "1364493686400"
// 		},
// 		{
// 			"id": "548",
// 			"title": "This is special event",
// 			"url": "http://www.example.com/",
// 			"class": "event-special",
// 			"start": "1363197600000",
// 			"end":   "1363629686400"
// 		},
// 		{
// 			"id": "295",
// 			"title": "Event 3",
// 			"url": "http://www.example.com/",
// 			"class": "event-important",
// 			"start": "1364320800000",
// 			"end":   "1364407286400"
// 		}
// 	]
// }
