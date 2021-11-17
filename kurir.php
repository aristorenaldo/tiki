<?php 
if(! session_id()) session_start();

require_once 'init.php';

$kurir = new ModelKurir();
$colName = $kurir->getColumnName();
$result = $kurir->getAll();


$msg = $kurir->getError();

if(!is_null($msg)) die($msg);

// var_dump($result);
// die();
$title = "Kurir";
// var_dump($colName);
require_once 'view/viewKurir.php';
exit;
?>