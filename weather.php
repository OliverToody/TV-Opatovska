<?php
$data = file_get_contents("http://api.openweathermap.org/data/2.5/forecast?lat=48.71&lon=21.26&units=metric&APPID=455d700cc450e8b12b1b7b16abc22983");
$whole = array();

$list =  json_decode($data);
//$list = $list['list'];
$days = $list->list;
foreach($days as $day) {
    $day = json_decode(json_encode($day), true);
    $weather = $day['weather'][0]['description'];
    $icon = $day['weather'][0]['icon'];
    $temp = $day['main']['temp'];
    $date = $day['dt_txt'];
    $day_weather = array(
        'temp'=> round($temp,1),
        'weather'=> $weather,
        'icon' => $icon,
        'date' => $date
    );
    array_push($whole, $day_weather);
    
} 
$two_day = array(
    'today' => $whole[0],
    'tomorrow' => $whole[8]
);

header("Content-type: application/json");
echo json_encode($two_day);
?>
