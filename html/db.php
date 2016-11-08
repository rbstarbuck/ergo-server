<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include(dirname(__FILE__)."/../php/Database.php");


$db = new Database();

if (isset($_GET['after'])) {
    $after = $_GET['after'];
    $sceneQuery = "SELECT * FROM Scenes WHERE LastUpdated > '".$after."' ORDER BY LastUpdated;";
    $rawQuery = "SELECT * FROM RawData WHERE LastUpdated > '".$after."' ORDER BY LastUpdated;";
    $processedQuery = "SELECT * FROM ProcessedData WHERE LastUpdated > '".$after."' ORDER BY LastUpdated;";

}
else {
    $sceneQuery = "SELECT * FROM Scenes ORDER BY LastUpdated;";
    $rawQuery = "SELECT * FROM RawData ORDER BY LastUpdated;";
    $processedQuery = "SELECT * FROM ProcessedData ORDER BY LastUpdated;";
}   
$sceneResult = $db->query($sceneQuery);
$rawResult = $db->query($rawQuery);
$processedResult = $db->query($processedQuery);

$sceneRows = array();
while ($row = $sceneResult->fetch_assoc()) {
    $sceneRows[] = $row;
}

$rawRows = array();
while ($row = $rawResult->fetch_assoc()) {
    $rawRows[] = $row;
}

$processedRows = array();
while ($row = $processedResult->fetch_assoc()) {
    $processedRows[] = $row;
}

print "{\"scenes\": ".json_encode($sceneRows).", \"rawData\": ".json_encode($rawRows).", \"processedData\": ".json_encode($processedRows)."}";

?>
