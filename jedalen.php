
<?php
// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');
 
// get DOM from URL or file
$html = file_get_html("https://eskoly.sk/opatovska7/jedalen");
$today = date("d.m.y");  
$today = str_replace("0","", $today);
echo $today;                       
// find all link
foreach($html->find('table tr') as $e) {  
    //e$e->find('.dayColumn')->innertext('8. 04. 2019');
    $day = str_replace(" ", "", $e);
    $day = str_replace("20", "", $day); //FIXME
    echo $day;
}

/*
header("Content-type: application/json");
echo json_encode($departures);*/
?>
