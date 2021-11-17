<?php 

if(! session_id()) session_start();
require_once 'init.php';

$penerima = new ModelPenerima();

header('Location: '.BASEURL.'/penerima.php');
exit();

?>