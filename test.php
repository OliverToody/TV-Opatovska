
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

    if($deparute['lineNumber'] == "19") {
        $deparute['color'] = 'teal';
    }
    if($deparute['lineNumber'] == "52") {
        $deparute['color'] = 'darkblue';
    }
    if($deparute['lineNumber'] == "31") {
        $deparute['color'] = 'orange';
    }
    if($deparute['lineNumber'] == "54") {
        $deparute['color'] = 'dimgray';
    }
    $deparute['destination'] = str_replace("Košice, ","", $deparute['destination']);
    array_push($departures, $deparute);
   if($i == 6) {
        break;
    }
}
header("Content-type: application/json");
echo json_encode($departures);
?>
