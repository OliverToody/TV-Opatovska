
<?php
$data = file_get_contents("https://www.ubian.sk/navigation/stops/planned_departures?stopID=1000000113");
$departures = array();
$i = 0;
//var_dump($array['departures']);
//$departures = $data['departures'];
//var_dump(json_decode($data)->departures);
foreach(json_decode($data)->departures as $item) {
$i++;
    $array = json_decode(json_encode($item->timeTableTrip), true);
    $array2 = json_decode(json_encode($item), true);

    //var_dump($array['tripID']);
   // var_dump($array['destination']);
   // var_dump($array['lineNumber']);
   // var_dump($array['timeTableLine']['lineNumber']);
   // var_dump($array2['delayMinutes']);
   // var_dump($array2['plannedDepartureTime']);
    $deparute = array(
        'lineNumber' => $array['timeTableLine']['lineNumber'],
        'destination' => $array['destination'],
        'delay' => $array2['delayMinutes'],
        'departureTime' => date('H:i', $array2['plannedDepartureTime'])
    );
    array_push($departures, $deparute);
   if($i == 6) {
        break;
    }
}
header("Content-type: application/json");
echo json_encode($departures);
?>
