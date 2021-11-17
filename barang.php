<?php 
if(! session_id()) session_start();

require_once 'init.php';

$barang = new ModelBarang();
$result = $barang->getAll();

$msg = $barang->getError();

if(!is_null($msg)) die($msg);

// var_dump($result);
// die();
$title = "barang";

require_once 'view/viewBarang.php';
exit;
?>