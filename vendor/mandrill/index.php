<?php

require_once 'Mandrill.php';

$mandrill = new Mandrill('f6c96a8e-784e-4061-b154-d4b3b134e3ce');
$message = array(
    'html' => '<h1>Example HTML content</h1>',
//    'text' => 'Example text content',
    'subject' => 'example subject',
    'from_email' => 'jayneel@openxcell.com',
    'from_name' => 'Jayneel',
    'to' => array(
        array(
            'email' => 'sales@openxcell.com',
            'name' => 'Sales Openxcell',
            'type' => 'to'
        )
    ),
    'headers' => array('Reply-To' => 'mayur.openxcell@gmail.com'),
);

$result = $mandrill->messages->send($message);
echo "<pre>";
print_r($result);
exit;
