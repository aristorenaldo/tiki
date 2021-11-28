<?php
require_once 'init.php'; 
$title = 'TIKI JNE';
$navItems = array('Home' => 'active', 'Pegawai' => '', 'Admin' => '');

$listRiwayat = null;
if(isset($_GET['resi'])){
    $resi = htmlentities($_GET['resi']);
    $riwayatPengiriman = new ModelRiwayatPengiriman();
    $listRiwayat = $riwayatPengiriman->getDetailByResi($resi);
    // var_dump($listRiwayat);
}

require_once 'view/viewIndex.php';
?>