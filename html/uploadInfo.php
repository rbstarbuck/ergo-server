<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include(dirname(__FILE__)."/../php/Database.php");
include(dirname(__FILE__)."/../php/Emailer.php");

if (!isset($_GET['video'])) {
    print "URL parameter \"video\" is required.";
    return;
}

$video = $_GET['video'];
$pathinfo = pathinfo($video);
$info = $pathinfo['filename'].".json";
$filepath = dirname(__FILE__)."/data/".$info;

$request_body = file_get_contents('php://input');
file_put_contents($filepath, $request_body);

$db = new Database();
$query = "UPDATE RawData SET InfoFile='".$info."', LastUpdated=CURRENT_TIMESTAMP WHERE RawVideoFile='".$video."';";
$db->query($query);

sendProcessingRequestEmail($video, $info);

?>
