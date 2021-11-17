<?php 
if(! session_id()) session_start();

require_once 'init.php';

$pengirim = new ModelPengirim();
$colName = $pengirim->getColumnName();
$result = $pengirim->getAll();

$msg = $pengirim->getError();

if(!is_null($msg)) die($msg);

// var_dump($result);
// die();
$title = "Pengirim";

require_once 'view/viewPengirim.php';
exit;
?>