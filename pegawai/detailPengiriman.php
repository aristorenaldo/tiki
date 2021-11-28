<?php
if(! session_id()) session_start();
require_once '../init.php';

if(isset($_GET['resi']) && $_GET['resi'] != ''){
    // var_dump($_GET['resi'] == '');
    $title = 'Detail Resi';
    $resi = htmlentities($_GET['resi']);
    $pengiriman = new ModelPengiriman();
    $detail = $pengiriman->getDetailByResi($resi);
    // var_dump($detail);
    // echo '<br>';
    // echo $pengiriman->getError();
    // echo '<br>';

    $status = new ModelStatus();
    $listStatus = $status->getAll();
    
    $pengirim = new ModelPengirim();
    $pilihanPengirim = $pengirim->getAllIdName();
    $detailPengirim = $pengirim->getById($detail['ID_pengirim']);

    $penerima = new ModelPenerima();
    $pilihanPenerima = $penerima->getAllIdName();
    $detailPenerima = $penerima->getById($detail['ID_penerima']);

    $kurir = new ModelKurir();
    $pilihanKurir  = $kurir->getAllIdName();
    $detailKurir = array('nama'=>'','no_hp'=>'', 'lokasi'=>'');

    if ($detail['ID_kurir'] != '') {
        $detailKurir = $kurir->getById($detail['ID_kurir']);
    }

    $riwayatPengiriman = new ModelRiwayatPengiriman();
    $listRiwayat = $riwayatPengiriman->getDetailByResi($resi);
    // var_dump($listRiwayat);
    // echo '<br>';

    // echo $pengiriman->getError();
    $navItems = array('Home' => '', 'Pegawai' => 'active', 'Admin' => '');
    require_once '../view/viewDetailPengiriman.php';
    exit;
}

header('Location: '.BASEURL.'/pegawai');
exit;
?>