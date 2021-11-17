<?php 
if(! session_id()) session_start();

require_once 'init.php';

$pengiriman = new ModelPengiriman();
$result = $pengiriman->getAll();

$msg = $pengiriman->getError();

if(!is_null($msg)) die($msg);

// var_dump($result);
// die();
$title = "Penerima";

require_once 'view/viewPengiriman.php';
exit;
?>