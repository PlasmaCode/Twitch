<?php
require_once __DIR__ . '/vendor/autoload.php';

use PlasmaCode\Twitch\Api;

$Twitch = new Api;
$followers = $Twitch->channel('lirik', 'url');

echo $followers;



?>