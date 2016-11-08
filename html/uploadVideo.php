<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include(dirname(__FILE__)."/../php/Database.php");

if (!isset($_GET['video'])) {
    print "URL parameter \"video\" is required.";
    return;
}

if (!isset($_GET['scene'])) {
    print "URL parameter \"scene\" is required.";
    return;
}

if (!isset($_GET['created'])) {
    print "URL parameter \"created\" is required.";
    return;
}

$video = $_GET['video'];
$scene = $_GET['scene'];
$created = $_GET['created'];
$filepath = dirname(__FILE__)."/data/".$video;

$request_body = file_get_contents('php://input');
file_put_contents($filepath, $request_body);

print $video." ".$scene." ".$created." ".$filepath;
$db = new Database();
$query = "INSERT INTO RawData (RawVideoFile, SceneName, DateCreated) VALUES ('".$video."', '".$scene."', '".$created."');";
print $query;
$db->query($query);

?>
