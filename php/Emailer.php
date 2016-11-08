<?php

require_once "Mail.php";

function sendProcessingRequestEmail($video, $info) {
    $from = '<rbstarbuck@gmail.com>';
    $to = '<rbstarbuck@gmail.com>';
    $subject = 'Request processing of "'.$video.'"';
    $body = 'A user requested processing of "'.$video.'" using the info file "'.$info.'" from the Ergo app.';

    $headers = array(
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
    );

    $smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'rbstarbuck@gmail.com',
        'password' => 'Pl34s3D0ntH4ckM3'
    ));

    if (PEAR::isError($smtp)) {
        echo($smtp->getMessage());
        return;
    }

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
        echo($mail->getMessage());
    }
    else {
        echo('Message successfully sent');
    }
}

?>
