<?php 
require_once 'init.php';

$pengiriman = new ModelPengiriman();
$listResi = $pengiriman->getAllResi();

// var_dump($listResi);
$title = 'Pegawai';
$navItems = array('Home' => '', 'Pegawai' => 'active', 'Admin' => '');
require_once 'view/viewHalamanPegawai.php';


?>