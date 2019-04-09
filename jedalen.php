
<?php
// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');
 
// get DOM from URL or file
$html = file_get_html("https://eskoly.sk/opatovska7/jedalen");
$today = date("d.m.y");  
$today = str_replace("0","", $today);


$datetime = date('Y-m-d');
$day_of_week = date('w', strtotime($datetime));

$listok = array();
foreach($html->find('table tr') as $k => $e) {  
    if($k == 2)
    $listok['1'] = $e->plaintext;

    if($k == 4)
    $listok['2'] = $e->plaintext;

    if($k == 6)
    $listok['3'] = $e->plaintext;

    if($k == 8)
    $listok['4'] = $e->plaintext;

    if($k == 10)
    $listok['5'] = $e->plaintext;
}
$string = str_replace(".", "", $listok[$day_of_week]);
$string = str_replace("/", "", $string);
$string = str_replace(",", "", $string);

$string = str_replace("Pondelok", "<b>Pondelok</b>", $string);
$string = str_replace("Utorok", "<b>Utorok</b>", $string);
$string = str_replace("Streda\r\n", "<b>Streda</b>", $string);
$string = str_replace("Štvrtok\r\n", "<b>Štvrtok</b>", $string);
$string = str_replace("Piatok\r\n", "<b>Piatok</b>", $string);

$string = preg_replace('/[0-9]+/', '', $string);
$string = str_replace("\r\n", "<br>", $string);

header("Content-type: application/json");
echo json_encode($string);
?>
