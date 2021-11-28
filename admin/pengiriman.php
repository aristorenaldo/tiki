<?php 
if(! session_id()) session_start();

require_once '../init.php';

$pengiriman = new ModelPengiriman();
$result = $pengiriman->getAll();

$msg = $pengiriman->getError();

if(!is_null($msg)) die($msg);

// var_dump($result);
// die();
//set timezone WITA
$title = "Penerima";
$timestamp = DateTime::createFromFormat('U.u', number_format(microtime(true), 3, '.', ''));
// var_dump(number_format(microtime(true), 3, '.', ''));
// echo '<br>';
// var_dump(microtime(true));
// echo '<br>';
$timestampLocal = substr($timestamp->setTimeZone(new DateTimeZone('Asia/Ujung_pandang'))->format('Y-m-d H:i:s.u'), 0,-3);
// echo $timestampLocal;
// echo '<br>';

$navItems = array('Home' => '', 'Pegawai' => '', 'Admin' => 'active');

require_once '../view/viewPengiriman.php';
exit;
?>