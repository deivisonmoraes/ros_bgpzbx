#!/usr/bin/php -q
<?php
/*
Checar status do peer bgp via API;
Data: 07/04/2017

*/

include __DIR__ . '/routeros_api.class.php';
date_default_timezone_set('America/Sao_Paulo');

$ip = $argv['1'];
$user = $argv['2'];
$password  = $argv['3'];
$peer = $argv['4'];
$data_status = $argv['5'];
$api = new RouterosAPI();
$api->debug = false;

if ($api->connect($ip, $user, $password)) {
  switch ($data_status) {
    case 'state':
    $ARRAY = $api->comm('/routing/bgp/peer/print', array(
      "?name"  => "$peer",
      ".proplist" => "state"
    ));
    if ($ARRAY['0']['state'] == "established"){
      echo 1;
    } else {
      echo 0;
    }

      break;

    case 'uptime':
      $ARRAY = $api->comm('/routing/bgp/peer/print', array(
        "?name"  => "$peer",
        ".proplist" => "uptime"
        ));
        echo $ARRAY[0]['uptime'];
      break;
  }



  $api->disconnect();
}




 ?>
