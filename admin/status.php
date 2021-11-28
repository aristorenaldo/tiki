<?php 
if(! session_id()) session_start();

require_once '../init.php';

$status = new ModelStatus();
$colName = $status->getColumnName();
$result = $status->getAll();


$msg = $status->getError();

if(!is_null($msg)) die($msg);

// var_dump($result);
// die();
$title = "Status";
// var_dump($colName);
$navItems = array('Home' => '', 'Pegawai' => '', 'Admin' => 'active');
require_once '../view/viewStatus.php';
exit;
?>