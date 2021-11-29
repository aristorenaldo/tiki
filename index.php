<?php
if(! session_id()) session_start();
require_once 'init.php'; 
$title = 'TIKI JNE';
$navItems = array('Home' => 'active', 'Pegawai' => '', 'Admin' => '');

$listRiwayat = null;
if(!empty($_GET['resi'])){
    $resi = htmlentities($_GET['resi']);
    $riwayatPengiriman = new ModelRiwayatPengiriman();
    $listRiwayat = $riwayatPengiriman->getDetailByResi($resi);
    $btnDisabled = '';
    if(empty($listRiwayat)){
        Flasher::setFlash('Data Tidak Ditemukan','','danger');
        $btnDisabled = 'disabled';
    }
    // var_dump($listRiwayat);
}

require_once 'view/viewIndex.php';
?>