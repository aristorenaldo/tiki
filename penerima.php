<?php 
if(! session_id()) session_start();

require_once 'init.php';

$penerima = new ModelPenerima();
$result = $penerima->getAll();

$msg = $penerima->getError();

if(!is_null($msg)) die($msg);

// var_dump($result);
// die();
$title = "Penerima";

require_once 'view/viewPenerima.php';
exit;
?>