#!/usr/bin/php -q
<?php

/*
Script para regra de descoberta BGP
Até o momento não existe MIB:BGP para isso.
Data: 13/03/2017
Existe possibilidade de existir na versão 7 do mikrotik
Padrão de dados para discover zabbix: {"data":[{"{#PEER}":"AS65550"}}

*/
include __DIR__ . '/routeros_api.class.php';
date_default_timezone_set('America/Sao_Paulo');

$ip = $argv['1'];
$user = $argv['2'];
$password  = $argv['3'];


$api = new RouterosAPI();
$api->debug = false;

if ($api->connect($ip, $user, $password)) {
    $api->write('/routing/bgp/peer/getall');
    $ARRAY = $api->read();

    $dados = array('data'=>array()) ;
    foreach ($ARRAY as $key) {
    if ($key['disabled'] == "false"){
      $peer = $key['name'];
       $dados['data'][] = array('{#NAME}' => $peer) ;

     }

  }
  echo  json_encode($dados);
    $api->disconnect();
}



 ?>
