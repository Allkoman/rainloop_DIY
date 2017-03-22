<?php
if (!isset($_SERVER["HTTP_AUTH_USER"] ) || !isset($_SERVER["HTTP_AUTH_PASS"] )){
  fail();
}

$username=$_SERVER["HTTP_AUTH_USER"] ;
$userpass=$_SERVER["HTTP_AUTH_PASS"] ;
$protocol=$_SERVER["HTTP_AUTH_PROTOCOL"] ;

// default backend port
$backend_port=110;

if ($protocol=="imap") {
  $backend_port=143;
}

if ($protocol=="smtp") {
  $backend_port=25;
}

if($username == "mail01@192.168.1.104"){
    $server_ip = "192.168.1.104";
}

pass($server_ip, $backend_port);

function fail(){
  header("Auth-Status: Invalid login or password");
  exit;
}

function pass($server,$port){
  header("Auth-Status: OK");
  header("Auth-Server: $server");
  header("Auth-Port: $port");
  exit;
}
?>
