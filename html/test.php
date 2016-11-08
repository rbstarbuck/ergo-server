<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include(dirname(__FILE__)."/../php/Emailer.php");

sendProcessingRequestEmail('test.mp4', 'test.json');

?>
