<?php 
if(! session_id()) session_start();

require_once 'init.php';

$riwayatpengiriman = new ModelRiwayatPengiriman();
$result = $riwayatpengiriman->getAll();

$msg = $riwayatpengiriman->getError();

if(!is_null($msg)) die($msg);

// var_dump($result);
// die();
$title = "riwayatpengiriman";

require_once 'view/viewRiwayatPengiriman.php';
exit;
?>