<?php
require_once __DIR__ . '/vendor/autoload.php';

use PlasmaCode\Twitch\Api;

$Twitch = new Api;
$url = $Twitch->channel('lirik', 'url');

echo $url;

?>
